@extends('layouts.app')

@section('content')

<div class="ed_error_wrapper">
<div class="ed_img_overlay"></div>
	<div class="container">
		<div class="ed_error_content ed_toppadder100 ed_bottompadder100">
			<h1 class="ed_bottompadder40">404</h1>
			<h3 class="ed_bottompadder40">You found yourself on the lonely place. Return back to the previous page</h3>
			<span><a href="{{ URL::previous() }}" class="btn ed_btn ed_orange pull-left">Return Back</a></span>
		</div>
	</div>
</div>

@endsection
