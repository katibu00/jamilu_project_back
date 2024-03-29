@extends('layouts.app')
@section('pageTitle','Login')
@section('content')

<style>
    @media (max-width: 767.98px) {
  /* Styles for screens smaller than or equal to 767.98px (mobile phones) */
  .bg-white-on-mobile {
    background-color: white;
  }
}
</style>

<section id="content">
    <div class="content-wrap py-0">

        <div class="section m-0 py-6">
            <div class="qcurve-bg"></div>
            <div class="container d-flex justify-content-center align-items-center">
                
                <div class="cs-signin-form bg-white-on-mobile">
                    <div class="cs-signin-form-inner">
                        <div class="text-center">
                            @if (session('error'))
                                <div class="container">
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                </div>
                            @endif
                            <h3 class="h1 fw-bolder mb-3">Sign In</h3>
                            <p class="text-smaller text-muted mb-4" style="line-height: 1.5;">Sign in to Access your courses and continue your learning</p>
                        </div>
                        <div class="d-flex justify-content-center mb-2">
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

                        <div class="divider divider-center my-2"><span>OR</span></div>

                        <form id="login-form" class="mb-0 row" action="{{ route('login') }}" method="post">
                            @csrf
                            <input type="hidden" name="return_url" id="return_url" value="{{ $returnUrl }}">

                            <div class="col-12 form-group">
                                <label class="text-transform-none ls-0 fw-normal mb-1" for="login-form-username">Email/Phone:</label>
                                <input type="text" id="login-form-username" name="email_or_phone" class="form-control fw-semibold" placeholder="">
                            </div>
                            <div class="clear"></div>
                            <div class="col-12 form-group">
                                <label class="text-transform-none ls-0 fw-normal mb-1" for="login-form-password">Password:</label>
                                <div class="input-group">
                                    <input id="login-form-password" type="password" name="password" class="form-control fw-semibold border-end-0" placeholder="">
                                    <button class="btn border" onclick="myFunction()" type="button"><i class="bi-eye text-smaller"></i></button>
                                </div>
                            </div>

                            <div class="col-12 d-flex justify-content-between">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="rememberMe">
                                    <label class="form-check-label text-transform-none ls-0 mb-0 fw-semibold" for="inlineCheckbox2">Remember me</label>
                                </div>
                                <a href="#" class="text-smaller fw-medium"><u>Forgot Password?</u></a>
                            </div>

                            <div class="col-12 mt-4">
                                <button type="submit" class="button button-large w-100 bg-alt py-2 rounded-1 fw-medium text-transform-none ls-0 m-0" id="login-form-submit">Login</button>
                            </div>
                        </form>
                        <p class="mb-0 mt-4 text-center fw-semibold">Don't have an account? <a href="{{ route('register') }}"><u>Sign up</u></a></p>
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
     $('#login-form').submit(function(event) {
         event.preventDefault();
         var submitButton = $(this).find('button[type="submit"]');
         submitButton.prop('disabled', true).html(
             '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Please Wait...'
         );

         var redirect_url = $("#return_url").val();
        // console.log(redirect_url); return;
         var formData = new FormData(this);
         $.ajax({
             url: '/login',
             type: 'POST',
             data: formData,
             processData: false,
             contentType: false,
             success: function(response) {
                 submitButton.prop('disabled', false).text('Sign in');

                 if (response.success) {
                     Swal.fire({
                         icon: 'success',
                         title: 'Login Successful',
                         text: 'Redirecting ...',
                         timer: 2000,
                         timerProgressBar: true,
                         showConfirmButton: false,
                         didOpen: () => {
                             setTimeout(() => {
                                window.location.href = response.redirect_url;
                             }, 500);
                         }
                     });
                 } else {
                     Swal.fire({
                         icon: 'error',
                         title: 'Invalid Credentials',
                         text: 'Please check your email/phone and password.',
                     });
                 }
             },
             error: function(xhr, status, error) {
                 submitButton.prop('disabled', false).text('Sign in');

                 var response = xhr.responseJSON;
                 if (response && response.errors && response.errors.login_error) {
                     Swal.fire({
                         icon: 'warning',
                         title: 'Login Error',
                         text: response.errors.login_error[0]
                     });
                 } else if (response && response.message) {
                     Swal.fire({
                         icon: 'error',
                         title: 'Error',
                         text: response.message
                     });
                 } else {
                     Swal.fire({
                         icon: 'error',
                         title: 'An Error Occurred',
                         text: 'Please try again later.'
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