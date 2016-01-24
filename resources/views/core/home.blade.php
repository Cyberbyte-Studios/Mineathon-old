@extends('templates.template')

@section('content')
    <div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 centered">
				<h1>{{ trans('home.header') }}</h1>
				{!! trans('home.subHeader') !!}
			</div>
		</div>
	{{-- Guests --}}
	@include('templates.guests')		
	
	{{-- Sponsor  Section --}}
	@include('templates.sponsors')
    </div>
@endsection