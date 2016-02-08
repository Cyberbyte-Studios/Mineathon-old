@extends('templates.template')

@section('content')
<div class="container sponsorFix">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading centered">{{ trans('video.title') }}</div>
                <div class="panel-body">
                    <h3 class="centered">{{ trans('video.rulesTitle') }}:</h3>
                    {!! trans('video.rules') !!}
                    <p class="centered"><b>{!! trans('video.rulesDisclamer') !!}</b></p>
                    <br>
                    <form class="form-horizontal" role="form" method="POST" action="{{ secure_url('/video/save') }}">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ trans('video.videoId') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="youtube" value="{{ old('youtube') }}">
                                @if ($errors->has('youtube'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('youtube') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ trans('video.charity') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" id="charity" name="charity">
                            		@foreach($charities as $charity)
                            		    <option value="{{ $charity->id }}">{{ $charity->name }}</option>
                            		@endforeach
                                </select>
                                @if ($errors->has('charity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('charity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Email Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                    
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @else
                                    <span class="help-block centered">
                                        <strong>{{ trans('video.contactInfo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>   
                        
                        <div class="form-group centered">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Recaptcha::render() !!}
                                <br>
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ trans('errors.recaptcha') }}</strong>
                                    </span>
                                @endif                                 
                            </div>
                        </div>

                        <div class="form-group centered">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-check"></i> {{ trans('general.submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
