<?php

namespace App\Http\Controllers;

use App\Models\ReservedAccount;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    public function registerIndex()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        DB::beginTransaction();

        try {
            // Validate the request data
            $validatedData = $request->validate([
                'name' => 'required|string',
                'phone' => 'required|string|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ]);

            $fullName = $validatedData['name'];
            $firstName = explode(' ', $fullName)[0];
            $randomString = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 4);
            $username = $firstName . $randomString;

            // Create a user instance
            $user = new User([
                'name' => $validatedData['name'],
                'phone' => $validatedData['phone'],
                'email' => $validatedData['email'],
                'username' => $username . $randomString,
                'password' => Hash::make($validatedData['password']),
            ]);

            // Get the Monnify access token
            // $accessToken = $this->getAccessToken();

            // Create Monnify reserved account
            // $monnifyReservedAccount = $this->createMonnifyReservedAccount($user, $accessToken);

            // Save user and Monnify account details
            $user->save();
            // ReservedAccount::create([
            //     'user_id' => $user->id,
            //     'customer_email' => $monnifyReservedAccount->customerEmail,
            //     'customer_name' => $monnifyReservedAccount->customerName,
            //     'accounts' => json_encode($monnifyReservedAccount->accounts),
            // ]);

            // Create a wallet with welcome bonus
            // $welcome_bonus = Charges::select('welcome_bonus')->first();
            Wallet::create([
                'user_id' => $user->id,
                'balance' => 0,
            ]);

            DB::commit(); // Commit the transaction
            return response()->json(['message' => 'User account created successfully']);
        } catch (\Exception $e) {
            DB::rollback(); // Rollback the transaction on exception
            Log::error('Registration Error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function getAccessToken()
    {
        $monnifyKeys = DB::table('monnify_a_p_i_keys')->first();
        $apiKey = $monnifyKeys->public_key;
        $secretKey = $monnifyKeys->secret_key;

        $encodedKey = base64_encode($apiKey . ':' . $secretKey);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sandbox.monnify.com/api/v1/auth/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                "Authorization: Basic $encodedKey",
            ),
        ));

        $response = curl_exec($curl);
        $httpStatus = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            throw new \Exception("cURL Error: " . $err);
        }

        if ($httpStatus !== 200) {
            throw new \Exception("Monnify API request failed. Error Response: " . $response);
        }

        $monnifyResponse = json_decode($response);

        if (!$monnifyResponse->requestSuccessful) {
            throw new \Exception($monnifyResponse->responseMessage);
        }

        return $monnifyResponse->responseBody->accessToken; 
    }

    private function createMonnifyReservedAccount(User $user, $accessToken)
    {
        $accountReference = uniqid('abc', true);
        $accountName = $user->name;

        $monnifyKeys = DB::table('monnify_a_p_i_keys')->first();
        $contractCode = $monnifyKeys->contract_code;

        $currencyCode = 'NGN';
        $contractCode = $contractCode;
        $customerEmail = $user->email;
        $customerName = $user->name;
        $getAllAvailableBanks = true;

        $data = [
            'accountReference' => $accountReference,
            'accountName' => $accountName,
            'currencyCode' => $currencyCode,
            'contractCode' => $contractCode,
            'customerEmail' => $customerEmail,
            'customerName' => $customerName,
            'getAllAvailableBanks' => $getAllAvailableBanks,
        ];

        $jsonData = json_encode($data);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://sandbox.monnify.com/api/v2/bank-transfer/reserved-accounts',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $jsonData,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer ' . $accessToken,
            ),
        ));

        $response = curl_exec($curl);
        $httpStatus = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            throw new \Exception("cURL Error: " . $err);
        }

        if ($httpStatus !== 200) {
            throw new \Exception("Monnify API request failed. Error Response: " . $response);
        }

        $monnifyResponse = json_decode($response);

        if (!$monnifyResponse->requestSuccessful) {
            throw new \Exception($monnifyResponse->responseMessage);
        }

        return $monnifyResponse->responseBody;
    }

    public function loginIndex(Request $request)
    {
        $returnUrl = $request->query('return_to', '/');
        // dd($returnUrl);
        // dd($returnUrl);
        return view('auth.login', compact('returnUrl'));
    }


    protected function getRedirectUrl(Request $request)
    {
        return $request->query('return_url', $this->getRedirectRoute($request));
    }

public function login(Request $request)
{
    $request->validate([
        'email_or_phone' => 'required',
        'password' => 'required',
    ]);

    $credentials = $this->getCredentials($request);
    $rememberMe = $request->filled('rememberMe');

    try {
        if (Auth::attempt($credentials, $rememberMe)) {
            if ($request->ajax()) {
                return response()->json(['success' => true, 'redirect_url' => $this->getRedirectUrl($request)]);
            } else {
                return redirect()->to($this->getRedirectUrl($request));
            }
        } else {
            throw ValidationException::withMessages([
                'login_error' => 'Invalid credentials.',
            ]);
        }
    } catch (ValidationException $e) {
        if ($request->ajax()) {
            return response()->json(['success' => false, 'errors' => $e->errors()], 422);
        } else {
            return redirect()->back()->withErrors($e->errors())->withInput()->with('error_message', 'Invalid credentials.');
        }
    }
}



    protected function getCredentials(Request $request)
    {
        $field = filter_var($request->email_or_phone, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        return [
            $field => $request->email_or_phone,
            'password' => $request->password,
        ];
    }

    protected function getRedirectRoute(Request $request = null)
    {

    
        $role = auth()->user()->role;
    
        if ($role === 'admin') {
            return 'home.admin';
        } elseif ($role === 'instructor') {
            return 'home.instructor';
        } else {
            return 'student.courses';
        }
    }
    



    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
