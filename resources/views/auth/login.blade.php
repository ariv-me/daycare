<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>ERES - Bootstrap Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset ('resources/sources/images/favicon.png') }}">
	<link href="{{ asset ('resources/sources/vendor/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset ('resources/sources/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('resources/sources/css/style.css') }}" rel="stylesheet">
	<link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form method="POST" action="{{ route ('login') }}">
                                        
                                        @csrf
                                        
                                        <div class="form-group">
                                            <label class="mb-1"><strong>NIP</strong></label>
                                            <input id="username" name="username" type="text" class="form-control">
                                        
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input id="password" type="password" class="form-control" name="password" >

                                        </div>
                
                                        <div class="text-center">
                                            <button class="btn btn-primary btn-block">Login</button> 
                                            {{-- <button type="submit" class="btn btn-primary btn-block">
                                                {{ __('Login') }} 
                                            </button> --}}
                                        </div>

                                    </form>

                                    {{-- <form method="POST" action="{{ route('login') }}">
                        
                                        @csrf
                
                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="row mb-3">
                                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                
                                        <div class="row mb-3">
                                            <div class="col-md-6 offset-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                
                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Remember Me') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                
                                        <div class="row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Login') }}
                                                </button>
                
                                                @if (Route::has('password.request'))
                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </form> --}}
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset ('resources/sources/vendor/global/global.min.js') }}"></script>
	<script src="{{ asset ('resources/sources/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
	<script src="{{ asset ('resources/sources/vendor/chart.js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset ('resources/sources/js/custom.min.js') }}"></script>
	<script src="{{ asset ('resources/sources/js/deznav-init.js') }}"></script>
	<script src="{{ asset ('resources/sources/vendor/owl-carousel/owl.carousel.js') }}"></script>
	
	<!-- Apex Chart -->
	<script src="{{ asset ('resources/sources/vendor/apexchart/apexchart.js') }}"></script>

</body>

</html>