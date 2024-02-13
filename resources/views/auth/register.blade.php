@extends('layouts.app')
@section('pageTitle','Register')
@section('content')

<section id="content">
    <div class="content-wrap py-0">

        <div class="section m-0 py-6">
            <div class="curve-bg"></div>
            <div class="container d-flex justify-content-center align-items-center">

                <div class="cs-signin-form">
                    <div class="cs-signin-form-inner">
                        <div class="text-center">
                            <h3 class="h4 fw-bolder mb-3">Sign Up</h3>
                            <p class="text-smaller text-muted mb-4" style="line-height: 1.5;">Sign Up to Start Learning Today!</p>
                        </div>
                        {{-- <div class="d-flex justify-content-center mb-2">
                            <a href="#" class="social-icon si-small text-white bg-facebook" title="Facebook">
                                <i class="fa-brands fa-facebook-f"></i>
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>

                            <a href="#" class="social-icon si-small text-white bg-google" title="google">
                                <i class="fa-brands fa-google"></i>
                                <i class="fa-brands fa-google"></i>
                            </a>
                        </div>

                        <div class="clear"></div>

                        <div class="divider divider-center my-2"><span>OR</span></div> --}}

                        <form id="register-form" class="mb-0 row" action="{{ route('register') }}" method="post">
                            @csrf
                            {{-- <input type="hidden" name="return_url" value="{{ $returnUrl }}"> --}}

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" name="phone" placeholder="" />
                            </div>
                           
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" name="password" placeholder="" />
                            </div>

                            <div class="col-12 mt-4">
                                <button type="submit" class="button button-large w-100 bg-alt py-2 rounded-1 fw-medium text-transform-none ls-0 m-0" id="login-form-submit">Register</button>
                            </div>
                        </form>
                        <p class="mb-0 mt-4 text-center fw-semibold">Already have an account? <a href="{{ route('login') }}"><u>Sign in</u></a></p>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section><!-- #content end -->



@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('#register-form').submit(function(event) {
            event.preventDefault();
            var submitButton = $(this).find('button[type="submit"]');
            submitButton.prop('disabled', true).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Please Wait...'
            );

            var formData = new FormData(this);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/register',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    submitButton.prop('disabled', false).text('Login');

                    if (response.message) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message
                        }).then(() => {
                            window.location.href = '/login';
                        });
                    }
                },
                error: function(xhr, status, error) {
                    submitButton.prop('disabled', false).text('Login');

                    var response = xhr.responseJSON;
                    if (response && response.errors) {
                        var errorMessage = '';
                        $.each(response.errors, function(field, messages) {
                            errorMessage += messages[0] + '\n';
                        });
                        Swal.fire({
                            icon: 'warning',
                            title: 'Validation Error',
                            text: errorMessage
                        });
                    } else if (response && response.error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.error
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred. Please try again.'
                        });
                    }
                }
            });
        });
    });
</script>

<script>
    function myFunction() {
      var x = document.getElementById("login-form-password");
      if (x.type === "password") {
        x.type = "text";
        jQuery("#login-form-password + button").addClass('passowd-shown');
      } else {
        x.type = "password";
        jQuery("#login-form-password + button").removeClass('passowd-shown');
      }
    }
</script>

@endsection