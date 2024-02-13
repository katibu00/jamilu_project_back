<?php

namespace App\Http\Controllers;

use App\Models\MonnifyAPIKeys;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function monnifyKeys()
    {
        $monnifyKeys = MonnifyAPIKeys::first();
        return view('admin.settings.monnify',compact('monnifyKeys'));
    }

    public function saveMonnify(Request $request)
    {
        $validatedData = $request->validate([
            'public_key' => 'required|string',
            'secret_key' => 'required|string',
            'contract_code' => 'required|string',
        ]);

        $monnifyKeys = MonnifyAPIKeys::first();

        if ($monnifyKeys) {
            $monnifyKeys->update($validatedData);
        } else {
            $monnifyKeys = MonnifyAPIKeys::create($validatedData);
        }

        return redirect()->back()->with('success', 'Monnify API keys saved successfully');
    }
}
