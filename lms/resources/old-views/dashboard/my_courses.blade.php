@extends('layouts.app2')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">My Applied Courses</li>
        </ol>
        <div class="box_general">
            <div class="header_box">
                <h2 class="d-inline-block">My Courses</h2>
            </div>
            <div class="list_general">
                @if( $user_courses->isEmpty())
                    <ul>
                        <li> <h4 class="text-center"> you haven't applied in any courses Yet </h4></li>
                    </ul>
                @endif

                    <ul>
                        @foreach($user_courses  as $user_course)
                            <li>
                                <figure><img src="{{ Storage::disk('public')->url($user_course->Course->image)}}" alt=""></figure>

                                <h4> {{$user_course->Course->title}}
                                  @if($user_course->approve == 0)
                                        <i class="pending">Pending</i>
                                  @else
                                        <i class="approved">Active</i>
                                  @endif
                                </h4>

                                <ul class="course_list">

                                    <?php


$category =\TCG\Voyager\Models\Category::where('id',$user_course->Course->category_id)->get();?>

                                    <li><strong>Category</strong> {{ $category[0]['name'] }}</li>
                                    <?php $tariner =\App\Trainer::where('id',$user_course->Course->trainer_id)->get();?>

                                    <li><strong>Teacher</strong> {{ $tariner[0]['name'] }}</li>
                                </ul>
                                <h6>Course description</h6>
                                <p> {!! $user_course->Course->description !!}</p>
                                <ul class="buttons">
<?php
 $lesson=\App\Lesson::where('course_id',$user_course->Course->id)->get();
 ?>
                                    @if($user_course->approve == 1)

                                    {{-- @dd($lesson) --}}

                                        {{-- <li><a href="{{route('lesson',[$lesson[0]['slug'],$user_course->Course->slug])}}" class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Join Now</a></li> --}}
                                        <li><a href="{{ route('join' , $user_course->Course->slug) }}" class="btn_1 gray approve"><i class="fa fa-fw fa-check-circle-o"></i> Join Now</a></li>

                                    @endif
                                </ul>
                            </li>
                        @endforeach

                    </ul>

            </div>
        </div>
        <!-- /box_general-->

        <!-- /pagination-->
    </div>
    <!-- /container-fluid-->
</div>

@endsection
