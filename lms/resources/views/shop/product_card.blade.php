@forelse($products as $product)


    <!-- Single Product -->
    <div class="col-lg-4 col-md-4 col-sm-6">

        <div class="shop_grid">
            <div class="shop_status hot">{{ $product->category->getTranslatedAttribute('name') }}</div>
            <div class="shop_grid_thumb">
                <a href="{{ route('singleProduct' ,$product->slug) }}"><img src="{{ Storage::disk('public')->url($product->image) }}"
                                 class="img-fluid" alt=""/></a>
            </div>
            <div class="shop_grid_caption">
                <h4 class="sg_rate_title"><a href="{{ route('singleProduct' ,$product->slug) }}">{{ $product->getTranslatedAttribute('name') }}</a></h4>
                {{--                                    <div class="shop_grid_rate">--}}
                {{--                                        <i class="fas fa-star filled"></i>--}}
                {{--                                        <i class="fas fa-star filled"></i>--}}
                {{--                                        <i class="fas fa-star filled"></i>--}}
                {{--                                        <i class="fas fa-star filled"></i>--}}
                {{--                                        <i class="fas fa-star"></i>--}}
                {{--                                    </div>--}}
                <span class="sg_rate theme-cl" style="@if(app()->getLocale() =='ar') direction:rtl; @else direction:ltr; @endif">{{ $product->price }} {{ __('OMR') }}</span>
            </div>
            <div class="shop_grid_action">
                <a href="{{ route('singleProduct' ,$product->slug) }}" class="btn btn-shop" data-toggle="tooltip" data-placement="top"
                   title="{{ __('View') }}"><i class="ti-link"></i></a>



                <a href="{{ route('addOneItemtoCart' , $product->id) }}" class="btn btn-shop" data-toggle="tooltip" data-placement="top"
                   title="{{ __('Add To Cart') }}"><i class="ti-shopping-cart"></i></a>
                <a href="javascript:void(0)"  onclick='event.preventDefault(); document.getElementById("wish{{ $product->id }}").submit();' class="btn btn-shop" data-toggle="tooltip" data-placement="top"
                   title="{{ __('Add to wishlist') }}"><i class="ti-heart"></i></a>

                <form id="wish{{ $product->id }}" action="{{ route('addToWishlist' , ['product_id' => $product->id]) }}" method="post"
                      style="display: none;">
                    @csrf

                </form>


                {{--                                    <a href="#" class="btn btn-shop" data-toggle="tooltip" data-placement="top" title="Compare"><i class="ti-reload"></i></a>--}}
            </div>
        </div>

    </div>

@empty
    <div class="col-lg-4 col-md-4 col-sm-6">
        <h3>{{ __('No products found') }}</h3>
    </div>
@endforelse
