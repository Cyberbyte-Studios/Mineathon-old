@if (Helper::settings('sponsors'))
<div class="container padding">
	{{ trans('general.sponsors') }}
	<div class="row mt centered">
		@foreach (Helper::sponsors() as $sponsor)
        <div class="col-sm-3">
			<h3>{{ $sponsor['name'] }}</h3>
			<img class="img-responsive center-block" src="{{ $sponsor['image'] }}" alt="{{ $sponsor['name'] }}" />
		</div>
		@endforeach
	</div>
</div>
@endif