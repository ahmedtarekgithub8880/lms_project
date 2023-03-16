
<!-- botão flutuante whatsapp -->
<a  href="https://api.whatsapp.com/send?phone={{setting('site.whatsapp')}}&text=olá" class="whatsapp-button w-100" target="_blank" style="position: fixed;  right: 0; bottom: 15px;">
    <img src="https://i.ibb.co/VgSspjY/whatsapp-button.png" alt="botão whatsapp">
  </a>

  <div class="up_foter" style="">
      <div class="text-center ">
          <div class="" >
              <h6>{{ __('Subscribe to our newsletter') }}</h6>
              {{-- <p>{{ __('Subscribe our newsletter & get latest news and update!') }}</p> --}}
              <form class=" up_foter_form" action="{{ route('subscribe') }}" method="post">
                  @csrf
                  <input type="email" name="email" id="  " class=" btn1" placeholder="{{ __('Your Email Address') }}" required="required">
                  <input type="submit" id="" class="btn2 " value="{{ __('Get Started') }}">
              </form>
          </div>
      </div>
  </div>
              <!-- ================================= End Newsletter =============================== -->

              <!-- ============================ Footer Start ================================== -->
              <footer class="dark-footer skin-dark-footer">
                  <div>
                      <div class="container">
                          <div class="row">

                              <div class="col-lg-3 col-md-3">
                                  <div class="footer-widget">
                                      <img src="{{ Storage::disk('public')->url(setting('site.logo')) }}" class="img-footer" alt="" />
                                      <div class="footer-add">
                                          <p> {{ app()->getLocale() == 'en' ? setting('site.addres_en') : setting('site.address_ar')  }}</p>
                                          <p>{{ setting('site.phone') }}</p>
                                          <p>{{ setting('site.email') }}</p>
                                      </div>

                                  </div>
                              </div>
                              <div class="col-lg-2 col-md-3">
                                  <div class="footer-widget">
                                      <h4 class="widget-title">{{ __('Navigations') }}</h4>
                                      <ul class="footer-menu">
                                          <li><a href="{{ route('about') }}">{{ __('About us') }}</a></li>
                                          <li><a href="{{ route('faqs') }}">{{ __('F&Qs') }}</a></li>
                                          <li><a href="{{ route('shop') }}">{{ __('Shop') }}</a></li>
                                          <li><a href="{{ route('get-contact') }}">{{ __('Contact us') }}</a></li>
                                          <li><a href="{{ route('news') }}">{{ __('News') }}</a></li>
                                      </ul>
                                  </div>
                              </div>

                              <div class="col-lg-2 col-md-3">
                                  <div class="footer-widget">
                                      <h4 class="widget-title">{{ __('Shop Categories') }}</h4>
                                      <ul class="footer-menu">
                                          @forelse(\App\PCategory::take(5)->inRandomOrder()->get() as $category)

                                          <li><a href="{{ route('shop' , $category->slug) }}">{{ $category->getTranslatedAttribute('name') }}</a></li>

                                          @empty
                                          @endforelse
                                      </ul>
                                  </div>
                              </div>

                              <div class="col-lg-2 col-md-3">
                                  <div class="footer-widget">
                                      <h4 class="widget-title">{{ __('Courses') }}</h4>
                                      <ul class="footer-menu">
                                          @forelse(\App\Course::orderBy('created_at','desc')->take(5)->get() as $category)

                                              <li><a href="{{ route('course_details' , $category->slug) }}">{{ $category->getTranslatedAttribute('title') }}</a></li>


                                          @empty
                                          @endforelse
                                      </ul>
                                  </div>
                              </div>

                              <div class="col-lg-3 col-md-12">
                                  <div class="footer-widget">
                                      <h4 class="widget-title">{{ __('Reach Us') }}</h4>
                                      <a href="tel:{{ setting('site.phone') }}" class="other-store-link">
                                          <div class="other-store-app">
                                              <div class="os-app-icon">
                                                  <i class="lni-phone theme-cl"></i>
                                              </div>
                                              <div class="os-app-caps">
                                                  {{ __('Give us a call') }}

                                              </div>
                                          </div>
                                      </a>
                                      <a href="https://api.whatsapp.com/send?phone={{ setting('site.whatsapp') }}&text=" class="other-store-link">
                                          <div class="other-store-app">
                                              <div class="os-app-icon">
                                                  <i style="color: green" class="lni-whatsapp theme-cl"></i>
                                              </div>
                                              <div class="os-app-caps">
                                                  {{ __('WhatsApp') }}

                                              </div>
                                          </div>
                                      </a>
                                  </div>
                              </div>

                          </div>
                      </div>
                  </div>

                  <div class="footer-bottom">
                      <div class="container">
                          <div class="row align-items-center">

                              <div class="col-lg-6 col-md-6">
                                  <p class="mb-0">© {{ date('Y') }} {{ __('Copyrights. Designed & developed By') }} <a href="#">LMS</a>.</p>
                              </div>

                              <div class="col-lg-6 col-md-6 text-right">
                                  <ul class="footer-bottom-social">

                                      @forelse($social as $row)
                                          <li><a href="{{ $row->link }}"><i class="{{ $row->icon }}"></i></a></li>
                                          @empty
                                      @endforelse
                                      <img src="{{Storage::disk("public")->url(setting('site.payment'))}}" width="100px" />

                                  </ul>
                              </div>

                          </div>
                      </div>
                  </div>
              </footer>
