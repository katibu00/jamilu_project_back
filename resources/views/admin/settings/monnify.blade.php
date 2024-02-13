@extends('layouts.app')
@section('content')
    <!-- ============================ Dashboard: Dashboard Start ================================== -->
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
                                            <li class="breadcrumb-item active" aria-current="page">System Settings</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->
                    
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="dashboard_wrap">
                                
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 mb-4">
                                        <h6 class="m-0">Monnify API Settings</h6>
                                    </div>

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
                                </div>
                                
                                <div class="row justify-content-center">
                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <form action="{{ route('monnify_api_key') }}" method="POST">
                                            @csrf
                                            <div class="form-group smalls">
                                                <label>Public Key</label>
                                                <input type="text" class="form-control" name="public_key" value="{{ $monnifyKeys->public_key ?? '' }}" />
                                            </div>
                                            <div class="form-group smalls">
                                                <label>Secret Key</label>
                                                <input type="text" class="form-control" name="secret_key" value="{{ $monnifyKeys->secret_key ?? '' }}" />
                                            </div>
                                            <div class="form-group smalls">
                                                <label>Contract Code</label>
                                                <input type="text" class="form-control" name="contract_code" value="{{ $monnifyKeys->contract_code ?? '' }}" />
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
                    
                    
                </div>

            </div>

        </div>
    </section>
    <!-- ============================ Dashboard: Dashboard End ================================== -->
@endsection
