@if (Helper::settings('guests'))
<div class="container padding">
	<h1 class="text-center">{{ trans('general.guests') }}</h1>
	<div class="row mt centered">
		@foreach (Helper::guests() as $guest)
        <div class="col-sm-3">
			<h3>{{ $guest->name }}</h3>
			<img class="img-responsive center-block" src="{{ $guest->image }}" alt="{{ $guest->name }}" />
		</div>
		@endforeach
	</div>
</div>
@endif