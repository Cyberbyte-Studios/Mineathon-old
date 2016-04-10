@extends('templates.template')

@section('content')
    <div class="container centered">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h1>{{ trans('vote.header') }}</h1>
                <p>{{ trans('vote.subHeader') }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h2 id="suggest">{{ trans('vote.support') }}</h2>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ secure_url('charity/new') }}"
                           class="btn btn-primary btn-lg small-padd">{{ trans('vote.suggest.charity') }}</a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ secure_url('video/new') }}"
                           class="btn btn-primary btn-lg small-padd">{{ trans('vote.suggest.video') }}!</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            @foreach($charities as $charity)
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ $charity->name }}</h3>
                    </div>
                    <div class="panel-body">
                        @if (count($charity->videos))
                            @foreach($charity->videos as $video)
                                <div class="col-lg-4" style="padding-top: 15px; padding-bottom: 15px;">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item"
                                                src="https://www.youtube.com/embed/{{ $video->youtube }}"
                                                allowfullscreen></iframe>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h1>{{ trans('vote.noVideos') }}</h1>
                        @endif
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-xs-8">
                                @if (Helper::settings('votes'))
                                    @if($voted)
                                        <button type="button" class="btn btn-primary btn-lg vote disabled"
                                                data-charity="{{ $charity->id }}"
                                                data-votes="{{ $charity->votes }}">{{ trans('vote.wait') }}</button>
                                    @else
                                        <button type="button" class="btn btn-primary btn-lg vote"
                                                data-charity="{{ $charity->id }}"
                                                data-votes="{{ $charity->votes }}">{{ trans('vote.vote') }}</button>
                                    @endif
                                @else
                                    <h3 class="votingDisabled">{{ trans('vote.votingDiabled') }}</h3>
                                @endif
                            </div>
                            <div class="col-xs-4">
                                <h3 class="col-counter centered"> {{ $charity->votes }} </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{-- Sponsor  Section --}}
        @include('templates.sponsors')
    </div>
@endsection

@if (Helper::settings('votes'))
    @push('scripts')
    <script>
        $(document).ready(function () {
            if (parseInt(localStorage.getItem('alreadyVoted')) + 43200 > (new Date).getTime()) {
                $('.vote').addClass('disabled');
                $('.vote').text('{{ trans('vote.wait') }}');
            }
            
            $('.vote').click(function () {
                var self = $(this);
                var charity = self.data('charity');
                var score = self.data('votes');
                var parent = self.parent().parent();
                var cont = parent.find(".col-xs-4");
    
                if (!self.hasClass('disabled')) {
                    $.post("/vote", {'charity': charity, '_token': '{{ csrf_token() }}'}, function (data) {
                        localStorage.setItem('alreadyVoted', (new Date).getTime());
                        cont.find('.col-counter').html(++score).css({'color': 'green'});
                        self.removeClass('btn-primary');
                        self.addClass('btn-success');
                        $('.vote').addClass('disabled');
                        if (data.success == true) {
                            console.log('Voted');
                        } else {
                            console.warn('Vote Failed');
                        }
                    });
                }
            });
        });
    </script>
    @endpush
@endif