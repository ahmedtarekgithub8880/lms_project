<div class="row" >

@foreach($all_cources as $course )

    <div class="col-xl-4 col-lg-6 col-md-6 coursat" >
        <div class="box_grid wow">
            <figure class="block-reveal">
                <div class="block-horizzontal"></div>
                <!-- {{--                            <a href="#0" class="wish_bt"></a>--}} -->
                <a href="{{route('course_details',$course->slug)}}">
                    <img style="height: 300px;width: 350px;" src="{{ Storage::disk('public')->url($course->image) }}" class="img-fluid" alt="">
                </a>
                <div class="price">{{ $course->price > 0 ? "$". $course->price :'Free' }}</div>
                <div class="preview"><span>Preview course</span></div>
            </figure>
            <div class="wrapper">

                <?php $category =\TCG\Voyager\Models\Category::where('id',$course->category_id)->get();?>

                <small>Category : {{$category[0]->name }}</small>
                <h3>{{ $course->title }}</h3>
                <p>{!! Str::limit($course->description , 150, '...') !!}</p>
                {{--                            <div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></div>--}}
            </div>
            <ul>

                <?php
                $course_duration = \App\Lesson:: where('course_id' ,$course->id )->sum('lesson_duration');
                ?>
                <li><i class="icon_clock_alt"></i> {{ $course_duration }} h</li>
                {{--                            <li><i class="icon_like"></i> 890</li>--}}


                <li><a href="{{route('course_details',$course->slug)}}">Enroll now</a></li>
            </ul>
        </div>
    </div>
@endforeach
    </div>
    <ul class="pagination">
        {!!  $all_cources->render() !!}
    </ul>

