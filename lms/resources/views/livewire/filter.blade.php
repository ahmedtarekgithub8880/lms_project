
{{-- <img src="https://thedatacademy.com/public/img/${course.image}"  alt=""> --}}




    {{-- @forelse ($month_courses as $course )
    <div   class="swiper-slide">
        <div  class=" item   mb-5 " >
            <div class="items-curd" >
                <a href="http://127.0.0.1:8000/course-details/{{$course->slug}}">
            <img src="{{ asset('assets/learn website/Rectangle 1449.png') }}" alt="">
            </a>
            </div>
            <div class="items-dec">
            <span  style="color: #7F56D9;"  >
                Design
            </span>
            <div class="row">
                <div class="col-md-7">
                    <h4 class="  items_dec_h4 d-inline-block text-truncate" style="max-width: 220px;">
                       {!! $course->description !!}
                    </h4>
                </div>
                <div style=" display: flex; width: 30px; height: 30px; justify-content: end; " class="col-md-2">
                    <img src="{{ asset('assets/learn website/Frame-1.png') }}" alt="">
                </div>
            </div>



            <span >
                <span style="color: #7F56D9" >9.4</span>
                <i style="color:#FF9B26;" class=" pl-2 bi bi-star-fill"></i>
                <i style="color:#FF9B26;" class=" pl-2 bi bi-star-fill"></i>
                <i style="color:#FF9B26;" class="bi pl-1 bi-star-fill"></i>
                <i style="color:#FF9B26;" class="bi pl-1 bi-star-fill"></i>
                <i class="bi pl-1 bi-star"></i>
                <span class="pl-2">({{ $course->lessons->count() }})</span>
            </span>
            <div class="row">
                @if ($course->trainer)


                <div class="   align-items-center  d-flex col-md-7">
                    @if ($course->trainer->image)
                        <img style="width: 40px;      height: 40px; "  class="rounded-circle  "  src="https://thedatacademy.com/public/img/{{ $course->trainer->image }}" alt="">
                    @else

                    <img style="width: 40px;      height: 40px; " class="rounded-circle  " src="{{ asset('assets/learn website/Ellipse 170.png') }}" alt="">
                    @endif
                    <div class="pl-2 text- ">
                        <h4 class="p-0 m-0 text-size-sm">{{ $course->trainer->name }} </h4>
                        @if ($course->trainer->experience > 0 )
                        <span class="p-0  text-size-sm m-0">{{ $course->trainer->experience ."" }}  Years </span>

                        @else

                        <span class="p-0  text-size-sm m-0">{{0 }}  Years </span>

                        @endif
                    </div>
                </div>

                <div class="col-md-2  d-flex align-items-center  justify-content-center">
                    <span style="color: #7F56D9; font-size:20px;"  >
                        {{ $course->price }}
                    </span>
                </div>
                @endif
            </div>
            @if ( $course->category)
            <h5>{{ $course->category->name }} </h5>

            @endif
            </div>

            <div style="background-color: #7F56D9" class=" rounded pt-2 mb-3 d-flex align-items-center  w-75 m-auto justify-content-around " >
            <div class="  d-flex">
                <i style="font-size: 20px; color: #F0EAF8;" class="bi pb-1 pr-1 bi-cart-dash-fill"></i>
                <div style="font-size: 14px; color:#F0EAF8; ">Add to Cart</div>
            </div>
            </div>
            </div>
    </div>
    @empty

    @endforelse --}}

