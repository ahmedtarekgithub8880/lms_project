@php
    use TCG\Voyager\Models\Category ;
    use App\Course ;
@endphp

{{--<div class="widget">--}}


{{--<form>--}}
{{--    <div class="form-group">--}}
{{--        <input type="text" name="search" id="search" class="form-control" placeholder="Search...">--}}
{{--    </div>--}}
{{--    <button type="submit" id="submit" class="btn_1 rounded"> Search</button>--}}
{{--</form>--}}
{{--</div>--}}

<div class="widget">
    <div class="widget-title">
        <h4>Last Courses</h4>
    </div>
    <ul class="comments-list">


        @foreach(Course::take(4)->orderByDesc('id')->get() as $single_cource)

        <li>
            <div class="alignleft">
                <a href="{{route('course_details',$single_cource->slug)}}"><img src="{{ Storage::disk('public')->url($single_cource->image)}}" alt="{{$single_cource->title}}"></a>
            </div>
            <h3><a href="{{route('course_details',$single_cource->slug)}}" title="">{{\Illuminate\Support\Str::limit(strip_tags($single_cource->title), 20, '...')}}</a></h3>
            <p>{{\Illuminate\Support\Str::limit(strip_tags($single_cource->description), 40, '...')}}</p>
        </li>


        @endforeach
    </ul>
</div>


<div class="widget">
    <div class="widget-title">
        <h4>Blog Categories</h4>
    </div>
    <ul class="cats">

        @foreach(Category::all() as $cat)

        <li><a href="{{route('cat_cources',$cat->slug)}}">{{$cat->name}} <span>( {{ Course::where('category_id',$cat->id)->count() }} )</span></a></li>

        @endforeach

    </ul>
</div>




