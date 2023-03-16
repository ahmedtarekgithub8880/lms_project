@extends('layouts.app')

@section('content')

<!--instructor single start-->
<div class="ed_dashboard_wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="ed_sidebar_wrapper">
					<div class="ed_profile_img">
					<img src="{{ Storage::disk('public')->url($trainer->image) }}" alt="Profile Image" class="img-responsive" />
					</div>
					<h3>{{ $trainer->name }}</h3>
					<p><span> </span> {{ $trainer->gender }} , {{ $trainer->age }} years Old</p>
					 <div class="ed_tabs_left">
						<ul class="nav nav-tabs">
						  <li class="active"><a href="#a" data-toggle="tab">profile</a></li>
						  <li><a href="#b" data-toggle="tab">courses <span> {{ $courses->count() }}</span></a></li>

{{--                            {{ dd($applicant->id) }}--}}
{{--						  <li><a href="#c" data-toggle="tab">activity</a></li>--}}
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			<div class="ed_dashboard_tab">
				<div class="tab-content">
					<div class="tab-pane active" id="a">
						<div class="ed_dashboard_inner_tab">
							<div role="tabpanel">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active"><a href="#view" aria-controls="view" role="tab" data-toggle="tab">instructor Detail</a></li>
								</ul>

								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="view">
									<div class="ed_inner_dashboard_info">
										<h2> {{ $trainer->name }} (instructor)</h2>
{{--										<table id="profile_view_settings">--}}
{{--											<thead>--}}
{{--												<tr>--}}
{{--													<th>Name</th>--}}
{{--													<th>Brief</th>--}}
{{--													<th>Email</th>--}}
{{--													<th>Phone</th>--}}
{{--												</tr>--}}
{{--											</thead>--}}
{{--											<tbody>--}}
{{--												<tr>--}}
{{--													<td>{{ $trainer->name }}</td>--}}
{{--													<td>{!!  $trainer->description !!}  </td>--}}
{{--													<td>{{ $trainer->email }}</td>--}}
{{--													<td>{{ $trainer->mobile }}</td>--}}
{{--												</tr>--}}
{{--											</tbody>--}}
{{--										</table>--}}

                                        <p> {{ $trainer->gender }} , {{ $trainer->age }} Years Old </p>
                                        <hr>
                                        <b>Brief</b> : {!!  $trainer->description !!}
                                        <hr>
                                        <p> <b>Email </b> : {{ $trainer->email }}  | <b>Mobile</b> : {{ $trainer->mobile }} </p>


									</div>
									</div>
								</div>

							</div><!--tab End-->
						</div>
					</div>
					<div class="tab-pane" id="b">
						<div class="ed_dashboard_inner_tab">
							<div role="tabpanel">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active"><a href="#my" aria-controls="my" role="tab" data-toggle="tab">courses</a></li>
{{--									<li role="presentation"><a href="#instructing" aria-controls="instructing" role="tab" data-toggle="tab">upcoming courses</a></li>--}}
								</ul>

								<!-- Tab panes -->
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="my">
										<div class="ed_inner_dashboard_info">
											<h2>all courses by {{ $trainer->name }}</h2>
											<div class="row">
												<div class="ed_mostrecomeded_course_slider">
                                                    @foreach($courses as $trainer_course)
													<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ed_bottompadder20">
														<div class="ed_item_img">
															<img src="{{ Storage::disk('public')->url($trainer_course->image) }}" alt="item1" class="img-responsive">
														</div>
														<div class="ed_item_description ed_most_recomended_data">
																<h4><a href="{{ route('course_details' , $trainer_course->id) }}">{{ $trainer_course->title }} </a><span>${{ $trainer_course->price }}</span></h4>
																<div class="row">
																	<div class="ed_rating">
{{--																		<div class="col-lg-6 col-md-7 col-sm-6 col-xs-6">--}}
{{--																			<div class="row">--}}
{{--																				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">--}}
{{--																					<div class="ed_stardiv">--}}
{{--																						<div class="star-rating"><span style="width:80%;"></span></div>--}}
{{--																					</div>--}}
{{--																				</div>--}}
{{--																				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">--}}
{{--																					<div class="row">--}}
{{--																						<p>(5 review)</p>--}}
{{--																					</div>--}}
{{--																				</div>--}}
{{--																			</div>--}}
{{--																		</div>--}}
																		<div class="col-lg-6 col-md-5 col-sm-6 col-xs-6">

                                                                            <div class="row">
                                                                                <div style="width: 210px;" class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                                    <?php $category =\TCG\Voyager\Models\Category::where('id',$trainer_course->category_id)->get();?>

                                                                                     <a class="category" href="{{ route('cat_cources', $category[0]['slug']) }}"> {{Str::limit($category[0]['name'], 30, '...')}} </a>

                                                                                </div>
                                                                            </div>
{{--																			<div class="ed_views">--}}
{{--																			<i class="fa fa-users"></i>--}}
{{--																			<span>{{ $students_count->count() }} students</span>--}}
{{--																			</div>--}}
																		</div>
																	</div>
																</div>
																<p>{!! Str::limit($trainer_course->description, 110 ,'...') !!}
                                                                </p>
																<a href="{{ route('course_details' , $trainer_course->id) }}" class="ed_getinvolved">get involved <i class="fa fa-long-arrow-right"></i></a>
														</div>
													</div>
                                                    @endforeach
												</div>
											</div>
										</div>
									</div>
{{--									<div role="tabpanel" class="tab-pane" id="instructing">--}}
{{--										<div class="ed_inner_dashboard_info">--}}
{{--											<h2>upcoming courses by Joanna Simpson</h2>--}}
{{--										</div>--}}
{{--									</div>--}}
								</div>

							</div><!--tab End-->
						</div>
					</div>
					<div class="tab-pane" id="c">
						<div class="ed_dashboard_inner_tab">
							<div role="tabpanel">
								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active"><a href="#personal" aria-controls="personal" role="tab" data-toggle="tab">personal</a></li>
									<li role="presentation"><a href="#mentions" aria-controls="mentions" role="tab" data-toggle="tab">mentions</a></li>
									<li role="presentation"><a href="#favourites" aria-controls="favourites" role="tab" data-toggle="tab">favourites</a></li>
								</ul>

								<!-- Tab panes -->

							</div><!--tab End-->
						</div>
					</div>
				</div>
			</div>
			</div>


		</div>
	</div>
</div>
<!--instructor single end-->
@endsection
