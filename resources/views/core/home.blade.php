@extends('templates.template')

@section('content')
<div id="header">
    <div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 centered">
				<h1>Welcome to Mineathon!</h1>
				<p>Mineathon is a 24-hour streaming event that aims to raise money for a charity that the community votes upon at the beginning of every year. </p>
				<p>Over two years we have raised a total of $21,580 for charity!</p>
				<p>Our team of programmers, designers and advertisers work hard in preparation for the 24-hour charity live-stream near the end of the year that will feature a large, completely vanilla mini-game server. The server will be free to join and play with the map creators for the full 24 hours and 100% of the proceeds made will be donated to a cause that is currently being voted for by the public.</p>
			</div>
		</div>
    </div>
</div>
{{-- Guests --}}
@include('templates.guests')		

{{-- Sponsor  Section --}}
@include('templates.sponsors')
@endsection