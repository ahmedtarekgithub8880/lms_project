@extends('layouts.app')
@section('page_title' , __('Feel free & Give Us A Message'))
@section('page_info' , __('Contact us'))
@section('content')
       <!-- ============================ Page Title Start================================== -->

       @include('includes.breadcrumb')
			<!-- ============================ Page Title End ================================== -->

			<!-- ============================ Agency List Start ================================== -->
			<section class="bg-light">

				<div class="container">

					<!-- row Start -->
					<div class="row">

						<div class="col-lg-8 col-md-7">
							<div class="prc_wrap">

								<div class="prc_wrap_header">
									<h4 class="property_block_title">{{ __('Fill up The Form') }}</h4>
								</div>

                                <form action="{{route('store-contact')}}" method="post" >
                                    @csrf
								<div class="prc_wrap-body">

									<div class="row">
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label>{{ __('Name') }}</label>
												<input type="text" name="name" class="form-control simple">
											</div>
										</div>
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label>{{ __('Email') }}</label>
												<input type="email" name="email" class="form-control simple">
											</div>
										</div>
									</div>

									<div class="form-group">
										<label>{{ __('Subject') }}</label>
										<input type="text" name="subject" class="form-control simple">
									</div>

									<div class="form-group">
										<label>{{ __('Message') }}</label>
										<textarea class="form-control simple" name="message"></textarea>
									</div>

									<div class="form-group">
										<button class="btn btn-theme" type="submit">{{__('Send')}}</button>
									</div>
								</div>
                                </form>

							</div>

						</div>

						<div class="col-lg-4 col-md-5">

							<div class="prc_wrap">

								<div class="prc_wrap_header">
									<h4 class="property_block_title">{{ __('Reach Us') }}</h4>
								</div>

								<div class="prc_wrap-body">
									<div class="contact-info">

										<h2>{{ __('Get In Touch') }}</h2>


										<div class="">
											<div class="cn-info-icon">
												<i class="ti-home"></i>
											</div>
											<div class="cn-info-content">
												<h4 class="cn-info-title">{{ __('Address') }}</h4>
                                                <p>
                                                    {{ app()->getLocale()=='en' ? setting('site.addres_en')  :  setting('site.address_ar') }}
                                                </p>
											</div>
										</div>
										<br/>

										<div class="">
											<div class="cn-info-icon">
												<i class="ti-email"></i>
											</div>
											<div class="cn-info-content">
												<h4 class="cn-info-title">{{ __('Send E-mail') }}</h4>
												{{ setting('site.email') }}
											</div>
										</div>
										<br>
										<br>

										<div class="">
											<div class="cn-info-icon">
												<i class="ti-mobile"></i>
											</div>
											<div class="cn-info-content">
												<h4 class="cn-info-title">{{ __('Call Us') }}</h4>
											{{ setting('site.phone') }}
											</div>
										</div>

									</div>
								</div>
							</div>

						</div>

					</div>
					<!-- /row -->

				</div>

			</section>
			<!-- ============================ Agency List End ================================== -->




@endsection
