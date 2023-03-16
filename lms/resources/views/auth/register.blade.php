<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="LMS">
    <meta name="author" content="LMS">
    <title>{{ setting('site.title') }}</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img\favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img\apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img\apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img\apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img\apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ asset('/') }}css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}css/style.css" rel="stylesheet">
    <link href="{{ asset('/') }}css/vendors.css" rel="stylesheet">
    <link href="{{ asset('/') }}css/icon_fonts/css/all_icons.min.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('/') }}css/custom.css" rel="stylesheet">
	<style>

#register_bg {
    background: url(../img/register.png) center center no-repeat fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover
}

	</style>

</head>

<body id="register_bg">

	<nav id="menu" class="fake_menu"></nav>

	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->

	<div id="login">
		<aside>
			<figure  >
				<a href="{{ url('/') }}"><img src="{{ Storage::disk('public')->url(setting('site.logo')) }}" width="149" height="42" data-retina="true" alt=""></a>
			</figure>
			<form autocomplete="off" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
				@csrf

				<div class="form-group">

					<span class="input">
					<input class="input_field @error('name') is-invalid @enderror " type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
					@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror

						<label class="input_label">
						<span class="input__label-content">{{ __('Name') }}</span>
					</label>

					</span>


                    <span class="input">
					<input class="input_field @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
					@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror

						<label class="input_label">
						<span class="input__label-content">{{ __('E-Mail Address') }}</span>
					</label>
					</span>

                    <span class="input">
					<input class="input_field @error('telephone') is-invalid @enderror" type="text" name="telephone" value="{{ old('telephone') }}"  autocomplete="telephone">
					@error('telephone')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror

						<label class="input_label">
						<span class="input__label-content">{{ __('Phone') }}</span>
					</label>
					</span>


                    <span class="input">
					<input class="input_field @error('name') is-invalid @enderror " type="file" name="avatar" value="{{ old('avatar') }}">
					@error('avatar')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
                    @enderror

						<label class="input_label">
						<span class="input__label-content"></span>
					</label>

					</span>



					<span class="input">
					<input class="input_field @error('password') is-invalid @enderror" type="password" id="password1" name="password" required autocomplete="new-password">
					@error('password')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror

					<label class="input_label">
						<span class="input__label-content">{{ __('Password') }}</span>
					</label>
					</span>

					<span class="input">
					<input class="input_field" type="password" id="password2" name="password_confirmation" required autocomplete="new-password">
						<label for="password-confirm" class="input_label">
						<span class="input__label-content">{{ __('Confirm Password') }}</span>
					</label>
					</span>

					<div id="pass-info" class="clearfix"></div>
				</div>
				<button class="btn_1 rounded full-width add_top_30" style="background-color:#f5981e ;">{{ __('Register') }}</button>
				<div class="text-center add_top_10">{{ __('Already have an account?') }} <strong><a href="{{ route('login') }}">{{ __('Sign In') }}</a></strong></div>
			</form>
			<div class="copy">© {{ date('Y') }} {{ setting('site.title') }}</div>
		</aside>
	</div>
	<!-- /login -->

	<!-- COMMON SCRIPTS -->

    <script src="{{ asset('/') }}js\jquery-2.2.4.min.js"></script>
    <script src="{{ asset('/') }}js\common_scripts.js"></script>
    <script src="{{ asset('/') }}js\main.js"></script>

	<!-- SPECIFIC SCRIPTS -->
	<script src="{{ asset('/') }}js/pw_strenght.js"></script>



</body>
</html>
