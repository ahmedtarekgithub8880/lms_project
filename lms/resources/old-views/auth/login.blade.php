<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Udema a modern educational site template">
    <meta name="author" content="Ansonika">
    <title>UDEMA | Modern Educational site template</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img\favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img\apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img\apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img\apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img\apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="css\bootstrap.min.css" rel="stylesheet">
    <link href="css\style.css" rel="stylesheet">
	<link href="css\vendors.css" rel="stylesheet">
	<link href="css\icon_fonts\css\all_icons.min.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css\custom.css" rel="stylesheet">

</head>

<body id="login_bg">

	<nav id="menu" class="fake_menu"></nav>

	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->

	<div id="login">
		<aside>
			<figure>
				<a href="index.html"><img src="img\logo.png" width="149" height="42" data-retina="true" alt=""></a>
			</figure>
			  <form method="POST" action="{{ route('login') }}">
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
				<div class="access_social">
					<a href="{{ url('login/facebook') }}" class="social_bt facebook">Login with Facebook</a>
					<a href="{{ url('login/google') }}" class="social_bt google">Login with Google</a>
				</div>
				<div class="divider"><span>Or</span></div>
				<div class="form-group">
					<span class="input">
						<input class="input_field  @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required>
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
					<input class="input_field  @error('password') is-invalid @enderror" type="password"  name="password" required >
                    @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                    <label class="input_label control-label">
                        <span class="input__label-content control-label">{{ __('Password') }}</span>

					    </label>

                    </span>
                    @if (Route::has('password.request'))
                        <small><a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a></small>
                    @endif

				</div>
				<button type="submit" class="btn_1 rounded full-width add_top_60">{{ __('Login') }}</button>
				<div class="text-center add_top_10">New to Udema? <strong><a href="{{ url('register') }}">Sign up!</a></strong></div>
			</form>
			<div class="copy">© 2020 Udema</div>
		</aside>
	</div>
	<!-- /login -->

	<!-- COMMON SCRIPTS -->
    <script src="js\jquery-2.2.4.min.js"></script>
    <script src="js\common_scripts.js"></script>
    <script src="js\main.js"></script>
	<script src="assets\validate.js"></script>

</body>
</html>
