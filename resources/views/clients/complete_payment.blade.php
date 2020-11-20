@extends('layouts.client')
@section('title', 'Payment')

@section('content')
<section class="panel">
	<h3 class="tittle-w3l">
		Payment
		<span class="heading-style">
			<i></i>
			<i></i>
			<i></i>
		</span>
	</h3>
	<div class="panel-body">
		@if (session("success"))
			<div class="position-center alert alert-success text-center">
				<h3>{{session("success")}}</h3>
			</div>
		@endif
		@if (session("error"))
			<div class="position-center alert alert-danger text-center">
				<h3>{{session("error")}}</h3>
			</div>
		@endif
		
	</div>
</section>
@endsection