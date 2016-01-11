@extends('templates.template')

@section('content')
<div id="header">
    <div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 centered">
				<h1>About Mineathon!</h1>
				<h3>The Mineathon Event </h3>
				<p>The Mineathon group consists of a range of young people working together to raise money for charity through play and collaboration. In the year before the event, we busy ourselves creating minigames
				on an online multiplayer server using the popular video game <a href="http://www.minecraft.net/" target="_blank">Minecraft</a> as a medium. </p>
				<p>Our third-party agreement from last year's event with Childsplay can be found <a href="https://drive.google.com/file/d/0B3f__ySeVcfddXhJaGZLSVhTVjA/view?usp=sharing">here</a>. 
				<br>Our endorsement from the Canadian chamber of commerce can be found <a href="https://drive.google.com/file/d/0B3f__ySeVcfdNFc1WG1wUzVYTkE/view?usp=sharing">here.</a></p>
			</div><!-- /col-lg-8 -->
		</div><!-- /row -->
    </div> <!-- /container -->
</div><!-- /ww -->

{{-- What IS Section --}}
<div class="container padding">
	<div class="row centered">	
        <div class="col-lg-8 col-lg-offset-2 centered">
            <h2>What Is Mineathon?</h2>
			<div class="embed-responsive embed-responsive-16by9">
			  	<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/A8xN6RGpTxs" allowfullscreen></iframe>
			</div>	            
        </div>
        <br>
	</div><!-- /row -->
</div><!-- /container -->

<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2 centered">
			<h3>Endorsements, Acknowledgements and Media Links</h3>
			<br><a href="https://drive.google.com/file/d/0B3f__ySeVcfdRmQ4dVNWN3lXbDQ/view?usp=sharing"></a>
			<br><a href="https://drive.google.com/file/d/0B3f__ySeVcfddXhJaGZLSVhTVjA/view?usp=sharing">Child's Play Acknowledgement.</a></p>
			<br><a href="https://drive.google.com/file/d/0B3f__ySeVcfdNFc1WG1wUzVYTkE/view?usp=sharing">Cayuga and District Chamber of Commerce Endorsement.</a></p>
		</div><!-- /col-lg-8 -->
	</div><!-- /row -->
</div> <!-- /container -->

{{-- Sponsor  Section --}}
@include('templates.sponsors')
@endsection