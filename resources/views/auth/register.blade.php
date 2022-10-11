@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4 mb-4">
                <div class="card-header text-center"><h5><b>{{ __('Register') }}</b></h5></div>

                <div class="card-body">
                    <!-- {{dump($errors)}} -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-4 mb-3">
                                <label for="name" class="col-md-4 col-form-label">{{ __('Name') }}</label>


                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="col-md-4 mb-3">
                                <label for="name" class="col-md-4 col-form-label">{{ __('L.Name') }}</label>


                                <input id="lname" type="text"
                                    class="form-control @error('lname') is-invalid @enderror" name="lname"
                                    value="{{ old('lname') }}" required autocomplete=" lname" autofocus>

                                @error('lname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="col-md-4 mb-3">

                                <label for="email" class="col-md-4 col-form-label">{{ __('Email') }}</label>


                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">

                                <label for="password" class="col-md-4 col-form-label">{{ __('Password') }}</label>


                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="col-md-4 mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label">{{ __('Password') }}</label>


                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>



                            <div class="col-md-4 mb-3">
                                <label for="phone" class="col-md-4 col-form-label">{{ __('Phone') }}</label>


                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>



                            <div class="col-md-4 mb-3">
                                <label for="address" class="col-md-4 col-form-label">{{ __('Address') }}</label>


                                <input id="address" type="text"
                                    class="form-control @error('address') is-invalid @enderror" name="address"
                                    value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                           


                            <div class="col-md-4 mb-3">
                                <label for="city" class="col-md-4 col-form-label ">{{ __('City') }}</label>


                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror"
                                    name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>

                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="col-md-4 mb-3">
                                <label for="state" class="col-md-4 col-form-label">{{ __('State') }}</label>


                                <input id="state" type="text" class="form-control @error('state') is-invalid @enderror"
                                    name="state" value="{{ old('state') }}" required autocomplete="state" autofocus>

                                @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">

                                <label for="country" class="col-md-4 col-form-label">{{ __('Country') }}</label>


                                <input id="country" type="text"
                                    class="form-control @error('country') is-invalid @enderror" name="country"
                                    value="{{ old('country') }}" required autocomplete="country" autofocus>

                                @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="col-md-4 mb-3">
                                <label for="pincode" class="col-md-4 col-form-label">{{ __('Pincode') }}</label>


                                <input id="pincode" type="text"
                                    class="form-control @error('pincode') is-invalid @enderror" name="pincode"
                                    value="{{ old('pincode') }}" required autocomplete="pincode" autofocus>

                                @error('pincode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


                            <div class="col-md-1 mb-3 mt-4">

                                <label class="form-check-label" for="flexCheckDefault">
                                    {{ __('Role_as') }}
                                </label>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="role_as">

                                </div>

                                @error('role_as')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>



                            <div class="col-md-6 offset-md-4 mt-3 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection