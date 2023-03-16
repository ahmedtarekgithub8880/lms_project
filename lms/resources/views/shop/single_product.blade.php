@extends('layouts.app')
@section('page_title' , $product->getTranslatedAttribute('name'))
@section('page_info' , __('product'))

<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        /* display: none; <- Crashes Chrome on hover */
        -webkit-appearance: none;
        margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
    }

    input[type=number] {
        -moz-appearance:textfield; /* Firefox */
    }
</style>
@section('content')

    @include('includes.breadcrumb')
<div class="clearfix"></div>
<!-- ============================================================== -->
<!-- Top header  -->
<!-- ============================================================== -->

<!-- ============================ Product Detail Start================================== -->


<section class="pr_detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="woocommerce single_product quick_view_wrap">

                    <div class="woo-single-images">
                        <div class="feature-style-single">

                            <div id="myCarousel" class="carousel slide" data-ride="carousel">

                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                    <img src="{{ Storage::disk('public')->url($product->image) }}" class="d-block w-100" alt="product-book-06" >
                                    </div>
                                    @if(isset($product->images))
                                        @forelse( json_decode($product->images) as $img)
                                        <div class="carousel-item ">
                                            <img src="{{ Storage::disk('public')->url($img) }}" class="d-block w-100" alt="...">
                                        </div>
                                            @empty
                                        @endforelse
                                    @endif    

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="summary entry-summary">
                        <div class="woo_inner">
{{--                            <div class="shop_status sell">New</div>--}}

                            @livewire('add-to-cart' , ['product' => $product])
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
<!-- ============================ Product Detail End ================================== -->


<!-- ============================ Product Description ================================== -->
<section class="bg-light">
    <div class="container">

        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12">

                <h3>{{ __('Description') }}</h3>
                <p>{{ $product->getTranslatedAttribute('description') }}</p>
            </div>

        </div>
    </div>
</section>
<!-- ============================ Product Description End ================================== -->

<!-- ============================ Related Product ================================== -->
<section>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="sec-heading center">
                    <p>{{ __('Related Product') }}</p>
                    <h2><span class="theme-cl">{{ __('hot & New') }}</span> {{ __('Related Product') }}</h2>
                </div>
            </div>
        </div>

        <div class="row">
            @include('shop.product_card')
        </div>
    </div>
</section>
<!-- ============================ Related Product End ================================== -->

<script>
    var myCarousel = document.querySelector('#myCarousel')
    var carousel = new bootstrap.Carousel(myCarousel, {
        interval: 200,
        wrap: false
    })

</script>
@endsection
