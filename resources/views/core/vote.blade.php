@extends('templates.template')

@section('content')
<div id="header">
    <div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 centered">
				<h1>Vote For A Cause Now!</h1>
                <p>The Mineathon project is currently deciding which charity to support this year and you can help us choose! Like one of the YouTube videos below to help that charity on its way to getting 100% of the money raised by the event this August!</p>
			</div>
		</div>
    </div>
</div>

<div class="container padding">
	<h2 class="text-center">Don't see a cause you want to support? <a href="{{ url('video/new') }}" class="btn btn-primary btn-lg btn-small-block" style="float:right;">Suggest your own!</a></h2>
	<div class="row margin centered">
		@foreach($charities as $charity)
		<div class="panel panel-primary">
		    <div class="panel-heading">
		        <h3 class="panel-title">{{ $charity->name }}</h3>
		    </div>
		    <div class="panel-body">
		    	@foreach($charity->videos as $video)
		    	<div class="col-lg-4" style="padding-top: 15px; padding-bottom: 15px;">
    				<div class="embed-responsive embed-responsive-4by3">
    				  	<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $video->youtube }}" allowfullscreen></iframe>
    				</div>		    	    
		    	</div>
				@endforeach
			</div>
			<div class="panel-footer">
				<button type="button" class="btn btn-primary btn-lg btn-semi-block">Vote For This Charity</button>
				<h3 class="col-counter" style="float:right;"> {{ $charity->votes }} </h3>
			</div>
		</div>
		@endforeach
	</div>
</div>
@if (Auth::check())
@endif

{{-- Sponsor  Section --}}
@include('templates.sponsors')
@endsection



@push('scripts')
<script>
    $(document).ready(function(){
    	$('.vote').click(function(){
    		var self = $(this);
    		var parent = self.parent().parent();
    		var vidid = parent.data('vidid');
    		var score = parent.data('votes');

		    self.find('#votes').html(++score).css({'color':'green'});
		    self.css({'color':'green'});
		    $.post("/vote",  {'postid' : postid}, function (data) {});
            parent.addClass('.disabled');
		});
	});
</script>
@endpush