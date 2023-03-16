<script src="{{  asset('/') }}assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
<script src="{{  asset('/') }}assets/js/jquery.counterup.min.js"></script>
<script src="{{  asset('/') }}assets/js/popper.min.js"></script>
<script src="{{  asset('/') }}assets/js/bootstrap.min.js"></script>
<script src="{{  asset('/') }}assets/js/select2.min.js"></script>
<script src="{{  asset('/') }}assets/js/slick.js"></script>
<script src="{{  asset('/') }}assets/js/counterup.min.js"></script>
<script src="{{  asset('/') }}assets/js/custom.js"></script>
<script src="{{  asset('/') }}assets/js/owl.carousel.min.js"></script>
<script src="{{@asset('assets/toastr/toastr.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>



<script>

    const filterr = document.querySelectorAll('.list-ul li'),
    items = document.querySelectorAll('.all-slide');


    filterr.forEach((li) => {
        li.addEventListener("click", () => {
            resetLinks();
            li.classList.add("add","add_color")

        })
    })

    function resetLinks() {
        filterr.forEach((li)=> {

            li.classList.remove("add","add_color")
        })
    }



</script>


<script>
    window.addEventListener('alert', event => {
        toastr[event.detail.type](event.detail.message,
        event.detail.title ?? ''), toastr.options = {
            "closeButton": true,
            "progressBar": true,
        }
    });
</script>

@livewireScripts

@stack('js')

<script type="text/javascript">
    @if (\Session::has('message'))
        $(function(){
            toastr["{{ \Session::get('message')['type'] }}"]('{!! \Session::get("message")["text"] !!}');
        });
        <?php echo \Session::forget('message'); ?>
    @endif

    @if ($errors->any())
        $(function(){
            toastr["error"]('{{$errors->first()}}');
        });
    @endif
</script>



<script>


$(document).ready(function(){
$('.ght').isotope(function(){
    itemSelector:'.cardd'
    });



$('.courses ul li').click(function(){
    // $('.portfolio-menu ul li').removeClass('active');
    // $(this).addClass('active');


    var selector = $(this).attr('data-filter');
    console.log(selector);

    $('.ght').isotope({
        filter: selector
    })
    return false;
});
});
</script>


<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('[id=filterr]').click(function() {
            let id = +this.name;


            // console.log(id);
            $.ajax({
                type: "POST",
                url: "{{ route('index.filter') }}",
                data: JSON.stringify({
                    category_id: id
                }),
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function(data) {
                    if (data.length <= 0) {

                        $('#courses').html(
                            `<h1 style=color:red; >NO Courses for This Category</h1>`)
                    } else {
                        display_filterd_courses(data);
                    }
                    console.log(data);

                },
                error: function(errMsg) {
                    alert(errMsg);
                }
            });


        })

        $("#alll").click(()=> {

            $.ajax({
                type: "POST",
                url: "{{route('flter.all')}}",
                dataType: "json",
                success: function (response) {
                    display_filterd_courses(response);
                }
            });

        });



        $('[id=filter_shop]').click(function() {
                let id = +this.name;
                // console.log(id);
                $.ajax({
                    type: "POST",
                    url: "{{ route('index.filter_shop') }}",
                    data: JSON.stringify({
                        category_id: id
                    }),
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    success: function(data) {


                        if (data.length <= 0) {
                            display_filterd_shop(data);


                            $('#shop').html(
                                `<h1 style=color:red; >NO Product for This Category</h1>`)
                        } else {
                            display_filterd_shop(data);
                        }
                        // console.log(data);

                    },
                    error: function(errMsg) {
                        alert(errMsg);
                    }
                });


            })


        });


      $("#all_shop").click(()=> {
                    $.ajax({
                    type: "POST",
                    url: "{{route('flter.all_shop')}}",
                    dataType: "json",
                    success: function (response) {
                        display_filterd_shop(response);
                    }
               });
       });


       function display_filterd_shop(data) {
        let body = document.querySelector('#shop');
        body.innerHTML = '';
        data.forEach(product => {
            console.log(product);
            body.innerHTML += `
            <div   class="swiper-slide">

                   <h1> ${product.name}</h1>

            <div/>
            `;

        });
    }


     function display_filterd_courses(data) {
        let body = document.querySelector('#courses');
        body.innerHTML = '';
        data.forEach(course => {
            // console.log(course);

            body.innerHTML += `
        <div   class="swiper-slide">
            <div  class=" item  shadow mb-5 " >
                <div class="items-curd" >
                    <a href="http://127.0.0.1:8000/course-details/${course.slug}">
                        {{-- <img src="https://thedatacademy.com/public/img/${course.image}"  alt=""> --}}
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
                           ${course.title}



                        </h4>
                    </div>
                    <div style=" display: flex;
                 width: 30px;
                 height: 30px;
                    padding-left: 40px; " class="col-md-2">
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
                    <span class="pl-2">(945)</span>
                </span>
                <div class="row">
                    <div class="   align-items-center  d-flex col-md-7">
                        <img style="width: 40px;      height: 40px; " class="rounded-circle  " src="{{ asset('assets/learn website/Ellipse 170.png') }}" alt="">
                        <div class="pl-2 text- ">
                            <h4 class="p-0 m-0 text-size-sm">Ahmed tarek </h4>
                            <span class="p-0  text-size-sm m-0">2019 Enrolled </span>
                        </div>
                    </div>

                    <div class="col-md-2  d-flex align-items-center  justify-content-center">
                        <span style="color: #7F56D9; font-size:20px;"  >
                            ${ course.price }
                        </span>
                    </div>
                </div>



                <h5>






                </h5>



                </div>

                <div style="background-color: #7F56D9" class=" rounded pt-2 mb-3 d-flex align-items-center  w-75 m-auto justify-content-around " >
                <div class="  d-flex">
                    <i style="font-size: 20px; color: #F0EAF8;" class="bi pb-1 pr-1 bi-cart-dash-fill"></i>
                    <div style="font-size: 14px; color:#F0EAF8; ">Add to Cart</div>
                </div>
                </div>
                </div>
            </div>
            `;

        });
    }
</script>







<script>
   $('.owl-carousel').owlCarousel({
    loop:false,
    margin:25,
    nav:false,
    autoplay:false,
    autoplayTimeout:2000,
    responsiveClass:true,

    responsive:{
        0:{
            items:1,

        },
        600:{
            items:3

        },
        1000:{
            items:4,

        }
    }
})
</script>
<!-- <script>

jQuery(document).ready(function($) {
  $('#video-gallery').royalSlider({
    arrowsNav: false,
    fadeinLoadedSlide: true,
    controlNavigationSpacing: 0,
    controlNavigation: 'thumbnails',

    thumbs: {
      autoCenter: false,
      fitInViewport: true,
      orientation: 'vertical',
      spacing: 0,
      paddingBottom: 0
    },
    keyboardNavEnabled: true,
    imageScaleMode: 'fill',
    imageAlignCenter:true,
    slidesSpacing: 0,
    loop: false,
    loopRewind: true,
    numImagesToPreload: 3,
    video: {
      autoHideArrows:true,
      autoHideControlNav:false,
      autoHideBlocks: true
    },
    autoScaleSlider: true,
    autoScaleSliderWidth: 960,
    autoScaleSliderHeight: 450,

    /* size of all images http://help.dimsemenov.com/kb/royalslider-jquery-plugin-faq/adding-width-and-height-properties-to-images */
    imgWidth: 640,
    imgHeight: 360

  });
});


</script> -->



