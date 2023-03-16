<div>
    <div wire:loading>
        <div style="display: flex; justify-content: center; align-items: center;
            position: fixed;top: 0px; left: 0px; z-index: 9999; width: 100%; height: 100%;
            opacity: .75 ;">
            <div class="la-ball-clip-rotate-multiple la-dark la-3x">
                <div></div>
                <div></div>
            </div>
        </div>
    </div>

    <h2 class="woo_product_title">
        <a href="#">{{ $product->getTranslatedAttribute('name') }}</a>
    </h2>
    <ul class="woo_info">
        <li><strong>{{ __('Category') }}:</strong>{{ $product->category->getTranslatedAttribute('name') }}</li>
        <li><strong>{{ __('SKU') }}:</strong>#{{ $product->id }}</li>
    </ul>
    <div class="woo_price_rate">
        {{--                                <div class="woo_rating">--}}
        {{--                                    <i class="fas fa-star filled"></i>--}}
        {{--                                    <i class="fas fa-star filled"></i>--}}
        {{--                                    <i class="fas fa-star filled"></i>--}}
        {{--                                    <i class="fas fa-star filled"></i>--}}
        {{--                                    <i class="fas fa-star"></i>--}}
        {{--                                </div>--}}
        <div class="woo_price_fix">
            <h3 class="mb-0 theme-cl" >


                {{ $price }} {{ __('OMR') }}
            </h3>

            <br>
            <h5 >(@if($product->qty > 0) {{ __('In Stock') }} @else  {{ __('Out of stock') }}  @endif)</h5>
        </div>
    </div>
    <div class="woo_short_desc">
        <p>
            {{ $product->getTranslatedAttribute('brief') }}
        </p>
    </div>
    <div class="quantity-button-wrapper">
        <label>{{ __('Quantity') }}</label>
        &nbsp; &nbsp;
        <div class="row">

            <button wire:click="minus" class="btn btn-theme btn-md" type="button">-</button>
            <input class="form-control qty" type="number"
                   inputmode="numeric"
                   min="1" oninput="validity.valid||(value='');" wire:model="qty" maxlength="12" value="1"
                   style="display: block;"
>

            <button wire:click="plus" class="btn btn-theme btn-md" type="button">+</button>
                <br>

        </div>

    </div>

    <div class="woo_buttons">
        <button wire:click="addTocart({{$product->id}})" type="submit" class="btn btn-theme2">{{ __('Add To Cart') }}</button>

        <a href="javascript:void(0)"
           onclick="event.preventDefault(); document.getElementById('wishlist-form').submit();"
           class="btn woo_btn_light" data-toggle="tooltip" data-placement="top" title="Add To Wishlist"><i
                class="ti-heart"></i></a>

        <form id="wishlist-form" action="{{ route('addToWishlist' , ['product_id' => $product->id]) }}" method="POST"
              style="display: none;">
            @csrf
        </form>
    </div>
</div>
