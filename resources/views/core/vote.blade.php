@extends('templates.template')

@section('content')
    <div class="container">
        <div id="header">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 centered">
                    <h1>{{ trans('general.vote.header') }}</h1>
                    <p>{{ trans('general.vote.subHeader') }}</p>
                </div>
            </div>
            <div class="col-md-8">
                <h2 class="text-center">{{ trans('general.vote.support') }}</h2>
            </div>
            <div class="col-md-2">
                <a href="{{ url('video/new') }}" class="btn btn-primary btn-lg">{{ trans('general.vote.suggest.charity') }}</a>
            </div>
            <div class="col-md-2">
                <a href="{{ url('charity/new') }}" class="btn btn-primary btn-lg">{{ trans('general.vote.suggest.video') }}!</a>
            </div>
        </div>

        <div class="row centered">
            @foreach($charities as $charity)
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $charity->name }}</h3>
                    </div>
                    <div class="panel-body">
                        @foreach($charity->videos as $video)
                            <div class="col-lg-4" style="padding-top: 15px; padding-bottom: 15px;">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item"
                                            src="https://www.youtube.com/embed/{{ $video->youtube }}"
                                            allowfullscreen></iframe>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="panel-footer">
                        <button type="button" class="btn btn-primary btn-lg btn-semi-block vote"
                                data-charity="{{ $charity->id }}" data-votes="{{ $charity->votes }}">Vote For This
                            Charity
                        </button>
                        <h3 class="col-counter" style="float:right;"> {{ $charity->votes }} </h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Sponsor  Section --}}
    @include('templates.sponsors')
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('.vote').click(function () {
            var self = $(this);
            var charity = self.data('charity');
            var score = self.data('votes');
            var parent = self.parent();

            parent.find('.col-counter').html(++score).css({'color': 'green'});
            self.addClass('btn-success disabled');
            self.removeClass('btn-primary');

            $.post("/vote", {'charity': charity, '_token': '{{ csrf_token() }}'}, function (data) {
            });
        });
    });
</script>
@endpush