@if (Helper::settings('guests'))
	<h1 class="text-center">{{ trans('general.guests') }}</h1>
	<div class="row mt centered">
		@foreach (Helper::guests() as $guest)
        <div class="col-sm-3">
			<h3>{{ $guest->name }}</h3>
			<a href="{{ $guest->url }}"><img class="img-responsive center-block" src="{{ secure_asset('uploads/images/200/' . $guest->image) }}" alt="{{ $guest->name }}" /></a>
		</div>
		@endforeach
	</div>
@endif