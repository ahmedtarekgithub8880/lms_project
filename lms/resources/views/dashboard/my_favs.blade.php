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
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Favourites') }}</li>
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
                                        <h4>{{ __('View') }} {{ __('Favourites') }}</h4>
                                    </div>
                                </div>
                                <div class="dashboard_container_body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <!-- <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Order</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead> -->
                                            <tbody>

                                            @forelse($userWishlist as $list)
                                                <tr>
                                                    <th scope="row"><a href="#"
                                                                       onclick="event.preventDefault(); document.getElementById('remove-fav{{ $list->id }}').submit();"
                                                                       class="remove_cart"><i class="ti-close"></i></a>
                                                    </th>
                                                    <form style="display: none" id="remove-fav{{ $list->id }}"
                                                          action="{{ route('removeFromFav' , ['id'=> $list->id]) }}"
                                                          method="post">
                                                        @csrf
                                                    </form>
                                                    <td>
                                                        <div class="tb_course_thumb"><img
                                                                src="{{ Storage::disk('public')->url($list->course->image) }}"
                                                                class="img-fluid" alt=""/></div>
                                                    </td>
                                                    <th>
                                                        <a href="{{ route('course_details' , $list->course->slug) }}">{{ $list->course->title }}</a>
                                                        <span class="tb_date"> <i class="fa fa-shopping-bag"></i> &nbsp {{ __('Category') }}:  "{{ $list->course->category->getTranslatedAttribute('name') }}"</span>
                                                    </th>
                                                    <td><span
                                                            class="wish_price theme-cl">{{ $list->course->price }}  {{ __('OMR') }}</span>
                                                    </td>

                                                    <td><a href="{{ route('course_details' , $list->course->slug) }}"
                                                           class="btn btn-add_cart">{{ __('View course') }}</a></td>
                                                </tr>
                                            @empty
                                                <tr style="text-align: center">
                                                    <td>{{ __('No courses in your favourite list') }}</td>
                                                    <td><a href="{{ route('cources') }}"
                                                           class="btn btn-add_cart">{{ __('Explore courses') }}</a></td>
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
