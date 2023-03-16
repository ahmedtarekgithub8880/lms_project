@extends('layouts.app')
@section('page_title' , __('Check products you liked?'))
@section('page_info' , __('Wishlist'))
@section('content')
    <!-- ============================ Page Title Start================================== -->
@include('includes.breadcrumb')
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Add To cart ================================== -->
    <section class="pt-0">
        <div class="container">

            <div class="row">
                <div class="col-md-12 col-lg-12">

                    <div class="table-responsive">
                        <table class="table table-striped wishlist">
                            <tbody>

                            @forelse($userWishlist as $list)
                                <tr>
                                    <th scope="row"><a href="#" onclick="event.preventDefault(); document.getElementById('remove-wishlist').submit();" class="remove_cart"><i class="ti-close"></i></a></th>
                                    <form style="display: none" id="remove-wishlist" action="{{ route('removeFromCart' , ['id'=> $list->id]) }}" method="post">
                                        @csrf
                                    </form>
                                    <td>
                                        <div class="tb_course_thumb"><img src="{{ $list->product->image ?  Storage::disk('public')->url($list->product->image) : '' }}"
                                                                          class="img-fluid" alt=""/></div>
                                    </td>
                                    <th><a href="{{ route('singleProduct' , $list->product->slug) }}">{{ $list->product->name }}</a> <span class="tb_date"> <i class="fa fa-shopping-bag"></i> &nbsp {{ __('Category') }}:  "{{ $list->product->category->name }}"</span>
                                    </th>
                                    <td><span class="wish_price theme-cl">{{ $list->product->price }} {{ __('OMR') }}</span></td>
                                    <td>@if($list->product->qty > 0) {{ __('In Stock') }} @else {{ __('Out of Stock') }} @endif</td>
                                    <td><a href="{{ route('addOneItemtoCart' , $list->product->id) }}" class="btn btn-add_cart">{{ __('Add To Cart') }}</a></td>
                                </tr>
                            @empty
                                <tr style="text-align: center">
                                    <td>{{ __('No products in your wishlist') }}</td>
                                    <td ><a href="{{ route('shop') }}" class="btn btn-add_cart">{{ __('Shop now') }}</a></td>
                                </tr>
                            @endforelse


                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- ============================ Add To cart End ================================== -->


@endsection
