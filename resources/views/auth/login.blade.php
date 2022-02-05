@extends('layouts.app')

@section('content')
<div class="bg-light align-items-center d-flex justify-content-center" style="min-height: 100vh !important">
    <div class="col-md-8 col-sm-10 col-10 col-lg-4">
        <form method="POST" action="{{ route('login') }}"> @csrf
            <div class="p-md-5 p-4 card">
                <div class="text-center">
                    <h3>Sign in</h3>
                    <p>Use your Vacation Feast Account</p>
                    @if ($message = Session::get('error'))
                        <small class="text-danger">{{ $message }}</small>
                    @endif
                </div>
                <div class="my-3">
                    <small>Email</small>
                    <input id="email" type="email"   class="form-control border-0 border-bottom rounded-0 @error('email') is-invalid @enderror"" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </md-input-container>
                <div class="my-3">
                    <small>Password</small>
                    <input id="password"   type="password" class="form-control border-0 border-bottom rounded-0 @error('password') is-invalid @enderror"" name="password" value="{{ old('email') }}" required autocomplete="email" autofocus>
                </md-input-container>
                <div class="btxn text-end mt-3 p-0">
                    <button type="submit" class="md-raised btn btn-primary">Sign in</button>
                </div>
            </md-card>
        </form> 
    </div>  
</div>
@endsection
