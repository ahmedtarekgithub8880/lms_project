@extends('layouts.app')

@section('content')

    <section class="gray pt-5">
        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-3 col-md-3">

                    @include('includes.studentnav')

                </div>

                <div class="col-lg-9 col-md-9 col-sm-12">

                    <!-- Row -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 pb-4">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">{{ __('My Dashboard') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('My orders') }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- /Row -->

                    <!-- Row -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="dashboard_container">
                                <div class="dashboard_container_header">
                                    <div class="dashboard_fl_1">
                                        <h4>{{ __('View Orders') }}</h4>
                                    </div>
                                </div>
                                <div class="dashboard_container_body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">{{ __('Order ID') }}</th>
                                                <th scope="col">{{__('Date')}}</th>
                                                <th scope="col">{{__('Status')}}</th>
                                                <th scope="col">{{__('Total')}}</th>
                                                <th scope="col">{{ __('Action') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>


                                            @forelse($orders as $order)
                                                <tr>
                                                    <th scope="row">#{{ $order->id }}</th>
                                                    <td>{{ $order->created_at->format('Y-m-d') }} ({{ $order->created_at->format('H:i A') }})</td>
                                                    <td>
                                                        @if($order->status == 0)
                                                            <span class="payment_status pending"> {{ __('Pending') }} .. </span>
                                                        @elseif($order->status == 1)
                                                            <span class="payment_status hold">{{ __('Shipping') }}</span>
                                                        @elseif($order->status == 2)
                                                            <span class="payment_status complete"> <i class="fa fa-check"></i> {{ __('Completed') }}</span>

                                                        @elseif($order->status == 3)

                                                            <span class="payment_status cancel">{{ __('Canceled') }}</span>
                                                        @else
                                                            <span class="payment_status pending">{{ __('Pending') }} </span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $order->total_price }} {{ __('OMR') }}</td>
                                                    <td>
                                                        <div class="dash_action_link">

                                                            <a href="#" class="view"  data-toggle="modal" data-target="#order{{ $order->id }}"> <i class="fa fa-eye"></i> {{ __('View') }}</a>
{{--                                                            <a href="#" class="cancel">Cancel</a>--}}
                                                        </div>
                                                    </td>
                                                </tr>



                                                <!-- Log In Modal -->
                                                <div class="modal fade" id="order{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
                                                        <div class="modal-content" id="registermodal">
                                                            <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
                                                            <div class="modal-body">
                                                                <h4 class="modal-header-title">{{ __('Invoice') }}</h4>
                                                                <div class="col-lg-12 col-md-12">
                                                                    <!-- Total Cart -->
                                                                    <div class="cart_totals checkout">
                                                                        <h4>{{ __('Order details') }}</h4>
                                                                        <div class="cart-wrap">
                                                                            <ul class="cart_list">
                                                                                <li><b>{{__('Number of products')}}</b><strong>({{ $order->order_items->count() }})</strong></li>
                                                                                <hr>
                                                                                
                                                                                @forelse($order->order_items as  $row)
                                                                                
                                                                                    <li>{{ $row->product->getTranslatedAttribute('name') }}  ( X {{ $row->product_qty }})<strong>${{ $row->product_total }}</strong></li>
                                                                                @empty
                                                                                No Orders
                                                                                @endforelse
                                                                                
                                                                            </ul>
                                                                            <div class="flex_cart">
                                                                                <div class="flex_cart_1">
                                                                                    {{ __('Total Cost') }}
                                                                                </div>
                                                                                <div class="flex_cart_2">
                                                                                    {{ $order->total_price }}  {{ __('OMR') }}
                                                                                </div>
                                                                            </div>
                                                                            <a href="{{ route('shop') }}" class="btn checkout_btn"> {{ __('Go to Shop') }}</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Modal -->



                                            @empty
                                                <tr>
                                                    <td>
                                                        <h3> {{ __('You have no orders yet') }} </h3>
                                                    </td>
                                                </tr>
                                            @endforelse

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /Row -->


                </div>

            </div>
            <!-- Row -->

        </div>
    </section>
@endsection
