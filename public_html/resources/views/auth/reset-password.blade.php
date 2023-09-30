@extends('layouts.guest') <!-- Outer Row -->

@section('content')

 <div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-password-image card-bg-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-2">{{ __('Reset Password') }}</h1>
                            </div>
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                            <form class="user" method="post" action="{{ route('password.store') }}">

                                @csrf

                                <!-- Password Reset Token -->
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" value="{{ old('email', $request->email) }}" autofocus
                                        id="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." readonly />
                                        
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password" name="password" autocomplete="new-password" placeholder="Password"/>
                                        
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" id="password_confirmation" name="password_confirmation" autocomplete="new-password" placeholder="Confirm Password"/>
                                        
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                            
                                </div>
                             
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Reset Password') }}
                                </button>
                            </form>
                            <hr />
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection