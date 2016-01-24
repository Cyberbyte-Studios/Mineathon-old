@extends('templates.template')

@section('content')
<div class="container centered">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 ">
			<h1>{{ trans('content.about.header') }}</h1>
			<h3></h3>
			<p>The Mineathon group consists of a range of young people working together to raise money for charity through play and collaboration. In the year before the event, we busy ourselves creating minigames
			on an online multiplayer server using the popular video game <a href="http://www.minecraft.net/" target="_blank">Minecraft</a> as a medium. </p>
		</div>
	</div>

	<div class="row">	
        <div class="col-lg-8 col-lg-offset-2 centered">
            <h2>What Is Mineathon?</h2>
			<div class="embed-responsive embed-responsive-16by9">
			  	<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ trans('content.about.video') }}" allowfullscreen></iframe>
			</div>	            
        </div>
        <br>
	</div>

	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">
			<h3>{{ trans('content.about.links') }}</h3>
			<br><h4><a href="https://drive.google.com/file/d/0B3f__ySeVcfdRmQ4dVNWN3lXbDQ/view?usp=sharing">Mineathon Car</a></h4>
			<br><h4><a href="https://drive.google.com/file/d/0B3f__ySeVcfddXhJaGZLSVhTVjA/view?usp=sharing">Child's Play Acknowledgement.</a></h4>
			<br><h4><a href="https://drive.google.com/file/d/0B3f__ySeVcfdNFc1WG1wUzVYTkE/view?usp=sharing">Cayuga and District Chamber of Commerce Endorsement.</a></h4>
		</div>
	</div>
</div>

{{-- Sponsor  Section --}}
@include('templates.sponsors')
@endsection