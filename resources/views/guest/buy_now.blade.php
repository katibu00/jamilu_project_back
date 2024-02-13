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
                    <div class="card mt-3">
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

                            <a href="{{ route('course.buy.process', ['slug' => $course->slug]) }}" class="btn btn-primary text-white">
                                Continue to Pay
                                {{ number_format($course->has_discount ? $course->discount_price : $course->price) }} NGN
                            </a>
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
