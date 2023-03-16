@extends('layouts.app')
@section('page_title' , __('Check Items in your cart'))
@section('page_info' , __('Cart'))

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

@section('content')

    <!-- ============================ Page Title Start================================== -->
@include('includes.breadcrumb')
    <!-- ============================ Page Title End ================================== -->


    <!-- ============================ Add To cart ================================== -->
    <section class="pt-0">
        <div class="container">

            <div class="row">
                <div class="col-lg-9 col-md-12">

                    @if($cart_items->count() > 0 )
                        <div class="table-responsive">
                            <table class="table add_to_cart">
                                <thead>
                                <tr>
                                    <th scope="col"> {{ __('Image') }}</th>
                                    <th  scope="col"> {{ __('Title') }}</th>
                                    <th scope="col"> {{ __('Price') }}</th>
                                    <th scope="col"> {{ __('Quantity') }}</th>
                                    <th scope="col"> {{ __('Total') }}</th>
                                    <th style="text-align: center" scope="col"> {{ __('Action') }}</th>
                                </tr>
                                </thead>
                                <tbody>

                                @forelse($cart_items as $item)
                                    <tr>
                                        <td>
                                            <div class="tb_course_thumb"><img
                                                    src="{{ Storage::disk('public')->url($item->product->image) }}"
                                                    class="img-fluid" alt=""/></div>
                                        </td>
                                        <th >{{ $item->product->getTranslatedAttribute('name') }}</th>
                                        <td><span class="wish_price theme-cl">${{ $item->product->price }}</span></td>
                                        <td>
                                            <form id="update_form{{ $item->id }}" method="post" action="{{ route('updateCartQty' , ['item_id' => $item->id  , 'product_id' => $item->product->id]) }}">
                                                @csrf
                                                @method('put')
                                            <input  type="number" class="form-control qty" step="1"
                                                   value="{{ $item->qty }}" title="Qty" name="qty"
                                                   size="4" placeholder="" inputmode="numeric"
                                                    min="1" oninput="validity.valid||(value='');">
                                            </form>
                                        </td>

                                        <td><span class="wish_price theme-cl">{{ $item->final_price }}   {{ __('OMR') }}</span></td>
                                        <td width="40%" style="text-align: center">
                                                <button type="submit"
                                                        onclick='event.preventDefault(); document.getElementById("update_form{{ $item->id }}").submit();'
                                                        class="btn btn-remove">{{ __('Update') }} </button>

                                            <a href="#"
                                               onclick='event.preventDefault(); document.getElementById("item{{ $item->id }}").submit();'
                                               class="btn btn-remove"> {{ __('Remove') }}</a></td>
                                        <form id="item{{ $item->id }}" method="post"
                                              action="{{ route('removeItemFromCart' , ['item_id' => $item->id]) }}"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </tr>

                                @empty

                                @endforelse

                                </tbody>
                            </table>
                        </div>

                    @endif

                <!-- Coupon Apply -->
                    @if($cart_items->count() > 0 )
                        <div class="checkout_coupon checkout">
                            <div class="checkout_coupon_flex">
                                <form class="form-inline">
                                    {{--                                <input class="form-control" type="search" placeholder="Coupon Code">--}}
                                    <a href="{{ route('shop') }}" type="button" class="btn btn-theme2 ml-2">{{ __('Shop now') }}</a>
                                </form>
                            </div>

                            <div class="ckt_last">
                                <form class="form-inline" action="{{ route('emptyCart') }}" method="post">
                                    @csrf
                                    <button type="button" onclick="archiveFunction()" class="btn empty_btn"> {{ __('Empty cart') }}
                                    </button>

                                </form>

                            </div>

                        </div>

                    @else
                        <div class="checkout_coupon checkout">
                            <div class="checkout_coupon_flex">
                                <form class="form-inline">
                                    <h3>{{ __('You have no products in your cart') }}</h3>
                                    <a href="{{ route('shop') }}" type="button" class="btn btn-theme2 ml-2">{{ __('Shop now') }}</a>
                                </form>
                            </div>

                            @endif
                        </div>
                        @if($cart_items->count() > 0 )
                            <div class="col-lg-3 col-md-12">
                                <!-- Total Cart -->
                                <div class="cart_totals checkout">
                                    <h4>{{ __('Cart Summary') }}</h4>
                                    <div class="cart-wrap">
                                        <ul class="cart_list">
                                            <li><b>{{ __('Products in cart') }}</b><strong>({{ $cart_items->count() }})</strong></li>
                                            <hr>
                                            @forelse($cart_items as  $row)
                                            <li>{{ $row->product->getTranslatedAttribute('name') }}  (X {{ $row->qty }})<strong>{{ $row->final_price }}  {{ __('OMR') }}</strong></li>
                                    @empty
                                            @endforelse
                                        </ul>
                                        <div class="flex_cart">
                                            <div class="flex_cart_1">
                                                {{ __('Total Cost') }}
                                            </div>
                                            <div class="flex_cart_2">
                                                {{ $cart_items->sum('final_price') }}  {{ __('OMR') }}
                                            </div>
                                        </div>
                                        <a href="{{ route('checkout') }}" class="btn checkout_btn">{{ __('Proceed To Checkout') }}</a>
                                    </div>
                                </div>
                            </div>

                        @endif

                </div>
            </div>
    </section>
    <!-- ============================ Add To cart End ================================== -->

    <script>
        function archiveFunction() {
            event.preventDefault(); // prevent form submit
            var form = event.target.form; // storing the form
            swal({
                    title: "Are you sure?",
                    text: "do you want to empty your cart.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, Delete all",
                    cancelButtonText: "No, Cancel !",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm) {
                    if (isConfirm) {
                        form.submit();          // submitting the form when user press yes
                    } else {
                        swal("Cancelled", "Your products remain in the cart :)", "error");
                    }
                });
        }
    </script>
@endsection
