 <!-- Log In Modal -->
 <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
         <div class="modal-content" id="registermodal">
             <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
             <div class="modal-body">
                 <h4 class="modal-header-title">{{ __('Login') }}</h4>
                 <div class="login-form">
                     <form method="POST" action="{{ route('login') }}">
                         @csrf
                         @if ($errors->any())
                             <div class="alert alert-danger">
                                 <ul>
                                     @foreach ($errors->all() as $error)
                                         <li>{{ $error }}</li>
                                     @endforeach
                                 </ul>
                             </div>
                         @endif
                         <div class="form-group">
                             <label>{{ __('Email') }}</label>
                             <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                 value="{{ old('email') }}" placeholder="{{ __('Email') }}">
                         </div>

                         <div class="form-group">
                             <label>{{ __('Password') }}</label>
                             <input type="password" name="password"
                                 class="form-control @error('password') is-invalid @enderror" placeholder="*******">
                         </div>

                         <div class="form-group">
                             <button type="submit" class="btn btn-md full-width pop-login">{{ __('Login') }}</button>
                         </div>

                     </form>
                 </div>

                 <div class="social-login mb-3">
                     <ul>
                         {{-- <li>
                             <input id="reg" class="checkbox-custom" name="reg" type="checkbox">
                             <label for="reg" class="checkbox-custom-label">Save Password</label>
                         </li> --}}
                         @if (Route::has('password.request'))
                             <li class="right"><a href="{{ route('password.request') }}"
                                     class="theme-cl">{{ __('Forgot Your Password?') }}</a></li>
                         @endif
                     </ul>
                 </div>

                 <div class="modal-divider"><span>{{ __('Or login via') }}</span></div>
                 <div class="social-login ntr mb-3">
                     <ul>
                         <li><a href="{{ url('login/facebook') }}" class="btn connect-fb"><i
                                     class="ti-facebook"></i>{{ __('Facebook') }}</a></li>
                         <li><a href="{{ url('login/google') }}" class="btn connect-google"><i
                                     class="ti-google"></i>{{ __('Google') }}</a></li>
                     </ul>
                 </div>

                 <div class="text-center">
                     <p class="mt-2"> {{ __('You have no Account?') }}
                         <a href="#" data-toggle="modal" data-target="#signup">{{ __('Click here') }}</a>
                     </p>

                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- End Modal -->

 <!-- Sign Up Modal -->
 <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="sign-up" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
         <div class="modal-content" id="sign-up">
             <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
             <div class="modal-body">
                 <h4 class="modal-header-title">{{ __('Sign Up') }}</h4>
                 <div class="login-form">
                     <form autocomplete="off" method="POST" action="{{ route('register') }}"
                         enctype="multipart/form-data">

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
                             <input class="form-control @error('name') is-invalid @enderror " type="text" name="name"
                                 value="{{ old('name') }}" required autocomplete="name" placeholder="{{ __('Full Name') }}"
                                 autofocus>

                         </div>

                         <div class="form-group">
                             <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                                 value="{{ old('email') }}" placeholder="{{ __('Email') }}" required autocomplete="email">

                         </div>

                         <div class="form-group">
                             <input class="form-control @error('telephone') is-invalid @enderror" type="text"
                                 name="telephone" value="{{ old('telephone') }}" placeholder="{{ __('Phone number') }}" 
                                 autocomplete="telephone">

                         </div>

                         <div class="form-group">
                             <label> {{ __('Photo') }}</label>
                             <input class="form-control @error('name') is-invalid @enderror " type="file" name="avatar"
                                 value="{{ old('avatar') }}">


                         </div>

                         <div class="form-group">

                             <input class="form-control @error('password') is-invalid @enderror"
                                 placeholder="{{ __('Password') }} *******" type="password" id="password1" name="password" required
                                 autocomplete="new-password">

                         </div>

                         <div class="form-group">
                             <input class="form-control" type="password" id="password2" name="password_confirmation" required autocomplete="new-password"
                              placeholder="{{ __('Re-type your password') }} *******">

                         </div>


                         <div class="form-group">
                             <button type="submit" class="btn btn-md full-width pop-login">{{ __('Sign Up') }}</button>
                         </div>

                     </form>
                 </div>

                 <div class="modal-divider"><span>{{ __('Or Signup via') }}</span></div>
                 <div class="social-login ntr mb-3">
                     <ul>
                         <li><a href="{{ url('login/facebook') }}" class="btn connect-fb"><i
                                     class="ti-facebook"></i>{{ __('Facebook') }}</a></li>
                         <li><a href="{{ url('login/google') }}" class="btn connect-google"><i
                                     class="ti-google"></i>{{ __('Google') }}</a></li>
                     </ul>
                 </div>

                 {{-- <div class="text-center">
                     <p class="mt-3"><i class="ti-user mr-1"></i>Already Have An Account? <a href="#"
                             class="link">Go For LogIn</a></p>
                 </div> --}}
             </div>
         </div>
     </div>
 </div>
