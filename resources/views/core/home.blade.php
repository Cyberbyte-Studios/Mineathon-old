@extends('templates.template')

@section('content')
    <div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 centered">
				<h1>{{ trans('home.header') }}</h1>
				@if (trans('home.video') != "OFF")
					<div class="embed-responsive embed-responsive-16by9">
					  	<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ trans('home.video') }}" allowfullscreen></iframe>
					</div>
					<br>				
				@endif
				{!! trans('home.subHeader') !!}
			</div>
		</div>
	{{-- Guests --}}
	@include('templates.guests')		
	
	{{-- Sponsor  Section --}}
	@include('templates.sponsors')
    </div>
@endsection