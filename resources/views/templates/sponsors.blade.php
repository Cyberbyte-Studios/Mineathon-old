@if (Helper::settings('sponsors'))
	<h1 class="text-center">{{ trans('general.sponsors') }}</h1>
	<div class="row mt centered">
		@foreach (Helper::sponsors() as $sponsor)
        <div class="col-sm-4">
			<h3>{{ $sponsor->name }}</h3>
			<a href="{{ $sponsor->url }}"><img class="img-responsive center-block" src="{{ secure_asset('uploads/images/' . $sponsor->image) }}" alt="{{ $sponsor->name }}" /></a>
		</div>
		@endforeach
	</div>
@endif