@extends('layouts.app')
@section('pageTitle','Course Details')
@section('content')

<section class="gray pt-4">
    <div class="container-fluid">
                            
        <div class="row">
        
            @include('layouts.sidebar')
            
            <div class="col-lg-9 col-md-9 col-sm-12">
                
                <!-- Row -->
                <div class="row justify-content-between">
                    <div class="col-lg-12 col-md-12 col-sm-12 pb-4">
                        <div class="dashboard_wrap d-flex align-items-center justify-content-between">
                            <div class="arion">
                                <nav class="transparent">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Row -->
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="dashboard_wrap">
                            
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                                    <h6 class="m-0">Basic Detail</h6>
                                </div>
                            </div>
                            
                            <div class="row justify-content-center">
                                @if(session('success'))
                                <div class="container">
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                    </div>
                                @endif

                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <form action="{{ route('instructor.profile.update') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <!-- Profile picture section -->
                                        <div class="form-group smalls">
                                            <label for="profilePicture">Profile Picture</label>
                                            <input type="file" class="form-control-file" id="profilePicture" name="profilePicture" accept="image/*" />
                                            <img id="preview" src="{{ $user->profile_image ? asset($user->profile_image) : asset('uploads/default.png') }}" alt="Profile Image" style="max-width: 100px; margin-top: 10px;" />
                                        </div>
                                    
                                        <!-- User details fields -->
                                        <div class="form-group smalls">
                                            <label for="name">Full Name*</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" />
                                        </div>
                                    
                                        <div class="form-group smalls">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" />
                                        </div>
                                    
                                        <div class="form-group smalls">
                                            <label for="phone_number">Phone Number</label>
                                            <input type="text" class="form-control" id="phone_number" name="phone" value="{{ $user->phone }}" />
                                        </div>
                                    
                                        <div class="form-group smalls">
                                            <label for="profession">Profession</label>
                                            <input type="text" class="form-control" id="profession" name="profession" value="{{ $profile->profession }}" />
                                        </div>
                                    
                                        <div class="form-group smalls">
                                            <label for="biography">Biography</label>
                                            <textarea class="form-control summernote" name="biography" id="biography">{{ $profile->biography }}</textarea>
                                        </div>
                                    
                                        <div class="form-group smalls">
                                            <label for="facebookLink">Facebook Link</label>
                                            <input type="text" class="form-control" id="facebookLink" name="facebookLink" value="{{ $profile->facebookLink }}" />
                                        </div>
                                    
                                        <div class="form-group smalls">
                                            <label for="twitterLink">Twitter Link</label>
                                            <input type="text" class="form-control" id="twitterLink" name="twitterLink" value="{{ $profile->twitterLink }}" />
                                        </div>
                                    
                                        <div class="form-group smalls">
                                            <label for="linkedInLink">LinkedIn Link</label>
                                            <input type="text" class="form-control" id="linkedInLink" name="linkedInLink" value="{{ $profile->linkedInLink }}" />
                                        </div>
                                    
                                        <div class="form-group smalls">
                                            <button class="btn theme-bg text-white" type="submit">Save Change</button>
                                        </div>
                                    </form>
     
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
                <script>
                    // Preview the uploaded image
                    document.getElementById('profilePicture').addEventListener('change', function(event) {
                        var preview = document.getElementById('preview');
                        var file = event.target.files[0];
                        var reader = new FileReader();
                
                        reader.onload = function(e) {
                            preview.src = e.target.result;
                        };
                
                        reader.readAsDataURL(file);
                    });
                </script>
                
                
                
            </div>
        
        </div>
        
    </div>
</section>

@endsection