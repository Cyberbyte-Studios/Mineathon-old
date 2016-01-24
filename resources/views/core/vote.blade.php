@extends('templates.template')

@section('content')
    <div class="container centered">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h1>{{ trans('content.vote.header') }}</h1>
                <p>{{ trans('content.vote.subHeader') }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <h2 id="suggest">{{ trans('content.vote.support') }}</h2>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ url('charity/new') }}" class="btn btn-primary btn-lg">{{ trans('content.vote.suggest.charity') }}</a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ url('video/new') }}" class="btn btn-primary btn-lg">{{ trans('content.vote.suggest.video') }}!</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
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
                        <div class="row">
                            <div class="col-xs-8">
                            	@if($voted)
                            	<button type="button" class="btn btn-primary btn-lg vote disabled" data-charity="{{ $charity->id }}" data-votes="{{ $charity->votes }}">{{ trans('content.vote.wait') }}</button>
                            	@else
                            	<button type="button" class="btn btn-primary btn-lg vote" data-charity="{{ $charity->id }}" data-votes="{{ $charity->votes }}">{{ trans('content.vote.vote') }}</button>
                            	@endif
                            </div>
                            <div class="col-xs-4">
                                <h3 class="col-counter centered"> {{ $charity->votes }} </h3>
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

@push('scripts')
<script>
    $(document).ready(function () {
        $('.vote').click(function () {
            var self = $(this);
            var charity = self.data('charity');
            var score = self.data('votes');
            var parent = self.parent();

            if(!self.hasClass('disabled')) {
    		    parent.find('.col-counter').html(++score).css({'color':'green'});
                self.addClass('btn-success');
                $('.vote').addClass('disabled');
                self.removeClass('btn-primary');
    
                $.post("/vote", {'charity': charity, '_token': '{{ csrf_token() }}'}, function (data) {});            
            }
        });
    });
</script>
@endpush