@extends('layouts.app')
@section('pageTitle', 'Monnify API Settings')
@section('content')


    <section id="content" style="margin-top: -40px;">
        <div class="content-wrap">
            <div class="container">
                @if (session('success'))
                    <div class="container">
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('monnify_api_key') }}" method="POST">
                            @csrf
                            <div class="form-group smalls">
                                <label>Public Key</label>
                                <input type="text" class="form-control" name="public_key"
                                    value="{{ $monnifyKeys->public_key ?? '' }}" />
                            </div>
                            <div class="form-group smalls">
                                <label>Secret Key</label>
                                <input type="text" class="form-control" name="secret_key"
                                    value="{{ $monnifyKeys->secret_key ?? '' }}" />
                            </div>
                            <div class="form-group smalls">
                                <label>Contract Code</label>
                                <input type="text" class="form-control" name="contract_code"
                                    value="{{ $monnifyKeys->contract_code ?? '' }}" />
                            </div>
                            <div class="form-group smalls">
                                <button class="btn btn-primary text-white" type="submit">Save Change</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection


