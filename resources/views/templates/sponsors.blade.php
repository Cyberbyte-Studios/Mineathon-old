@if (Helper::settings('sponsors'))
	<h1 class="text-center">{{ trans('general.sponsors') }}</h1>
	<div class="row mt centered">
		@foreach (Helper::sponsors() as $sponsor)
        <div class="col-sm-3">
			<h3>{{ $sponsor->name }}</h3>
			<img class="img-responsive center-block" src="{{ $sponsor->image }}" alt="{{ $sponsor->name }}" />
		</div>
		@endforeach
	</div>
@endif