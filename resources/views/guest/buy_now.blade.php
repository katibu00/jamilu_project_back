@extends('layouts.app')
@section('pageTitle', $course->title)
@section('content')

<section id="content" style="margin-top: -40px;">
    <div class="content-wrap">
        <div class="container">
            @if (session('error'))
                <div class="alert alert-danger mt-3">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-12 col-md-9">
                     <!-- Collapsible Pay with Paystack Card -->
                     <div class="card mt-3">
                        <div class="card-header" id="paystackHeader">
                            <h5 class="mb-0">
                                <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#paystackCollapse" aria-expanded="true" aria-controls="paystackCollapse">
                                    Pay with Paystack
                                </button>
                            </h5>
                        </div>

                        <div id="paystackCollapse" class="collapse show" aria-labelledby="paystackHeader" data-parent="#content">
                            <div class="card-body">
                                @if ($course->is_free)
                                    <input type="hidden" name="course_price" value="0">
                                @elseif ($course->has_discount)
                                    <input type="hidden" name="course_price" value="{{ $course->discount_price }}">
                                @else
                                    <input type="hidden" name="course_price" value="{{ $course->price }}">
                                @endif
                                <input type="hidden" name="course_id" value="{{ $course->id }}">

                                <button type="button" class="btn btn-primary text-white" onclick="payWithPaystack()">
                                    Pay with Paystack
                                    @if ($course->is_free)
                                        0 NGN
                                    @else
                                        {{ number_format($course->has_discount ? $course->discount_price : $course->price) }} NGN
                                    @endif
                                </button>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Collapsible Pay with Wallet Card -->
                    <div class="card mt-3">
                        <div class="card-header" id="walletHeader">
                            <h5 class="mb-0">
                                <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#walletCollapse" aria-expanded="false" aria-controls="walletCollapse">
                                    Pay with Wallet
                                </button>
                            </h5>
                        </div>

                        <div id="walletCollapse" class="collapse" aria-labelledby="walletHeader" data-parent="#content">
                            <div class="card-body">
                                @if (auth()->check())
                                    <!-- Display Reserved Account Numbers -->
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>

                                    @if ($userReservedAccounts)
                                        @foreach (json_decode($userReservedAccounts->accounts, true) as $account)
                                            <p>
                                                <strong>Bank:</strong> {{ $account['bankName'] }}
                                                <br>
                                                <strong>Account Number:</strong>
                                                <span id="accountNumber{{ $loop->index }}">{{ $account['accountNumber'] }}</span>
                                                <button class="copy-button" data-clipboard-target="#accountNumber{{ $loop->index }}">
                                                    <i class="fas fa-copy"></i> </button>
                                            </p>
                                            <hr>
                                        @endforeach
                                    @else
                                        <p><strong>No reserved accounts available.</strong></p>
                                    @endif

                                    <!-- Initialize Clipboard.js -->
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            var clipboard = new ClipboardJS('.copy-button');

                                            clipboard.on('success', function(e) {
                                                alert('Account number copied successfully!');
                                                e.clearSelection();
                                            });

                                            clipboard.on('error', function(e) {
                                                console.error('Error copying account number:', e.action);
                                            });
                                        });
                                    </script>

                                    <!-- Display Wallet Balance -->
                                    <p><strong>Wallet Balance:</strong> &#8358;{{ number_format($userWalletBalance, 2) }}</p>
                                @else
                                    <p><strong>Please log in to view reserved accounts and wallet balance.</strong></p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-3">
                    <div class="card mt-3">
                        <div class="card-body">
                            <a href="{{ url()->previous() }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Cancel</a>
                            <h3 class="widget_title mb-4">Summary</h3>
                
                            <div class="summary-item">
                                <div class="d-flex justify-content-between">
                                    <span>Total:</span>
                                    <span>&#8358;{{ number_format($course->price) }}</span>
                                </div>
                            </div>
                
                            @if ($course->has_discount)
                                <div class="summary-item">
                                    <div class="d-flex justify-content-between">
                                        <span>Discount:</span>
                                        <span>&#8358;{{ number_format($course->price - $course->discount_price) }}</span>
                                    </div>
                                </div>
                            @else
                                <div class="summary-item">
                                    <div class="d-flex justify-content-between">
                                        <span>Discount:</span>
                                        <span>-</span>
                                    </div>
                                </div>
                            @endif
                
                            <div class="summary-item">
                                <div class="d-flex justify-content-between">
                                    <span>Final Total:</span>
                                    <span>&#8358;{{ number_format($course->has_discount ? $course->discount_price : $course->price) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>

@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script>
        function payWithPaystack() {
            // Retrieve course price and ID from hidden fields
            var coursePrice = document.querySelector('[name="course_price"]').value.trim();
            var courseId = document.querySelector('[name="course_id"]').value.trim();
           
            // Check if the course price is empty or not a valid number
            if (coursePrice === "" || isNaN(coursePrice)) {
                // Display validation error using SweetAlert
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Course Price!',
                    text: 'Please select a valid course price before proceeding.',
                });
                return;
            }

            var user_id = '{{ auth()->user()->id }}';

            var handler = PaystackPop.setup({
                key: '{{ $publicKey }}',
                email: '{{ auth()->user()->email }}',
                amount: coursePrice * 100,
                currency: 'NGN',
                metadata: {
                    user_id: user_id, 
                    course_id: courseId 
                },
                callback: function(response) {
                    // Make an AJAX call to your server with the reference to verify the transaction
                    var reference = response.reference;
                    $.post('/verify-payment', {reference: reference, _token: '{{ csrf_token() }}'}, function(data) {
                        if(data.success) {
                            // Display success message using SweetAlert
                            Swal.fire({
                                icon: 'success',
                                title: 'Payment Successful!',
                                text: data.message, // Display message received from the server
                            }).then((result) => {
                                // Reload the page after displaying the message
                                window.location.href = "{{ route('home.student') }}?message=Payment+successful";
                            });
                        } else {
                            // Display failure message using SweetAlert
                            Swal.fire({
                                icon: 'error',
                                title: 'Payment Failed!',
                                text: data.message, // Display message received from the server
                            });
                        }
                    });
                },

                onClose: function() {
                    // Display message for closed transaction using SweetAlert
                    Swal.fire({
                        icon: 'warning',
                        title: 'Transaction Not Completed!',
                        text: 'Transaction was not completed, window closed.',
                    });
                },
            });
            handler.openIframe();
        }
    </script>
@endsection


