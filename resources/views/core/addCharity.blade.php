@extends('templates.template')

@section('content')
<div class="container sponsorFix">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading centered">{{ trans('charity.new.title') }}</div>
                <div class="panel-body">
                    <h3 class="centered">{{ trans('charity.new.rulesTitle') }}:</h3>
                    {!! trans('charity.new.rules') !!}
                    <p class="centered"><b>{!! trans('charity.new.rulesDisclaimer') !!}</b></p>
                    <br>
                    <form class="form-horizontal" role="form" method="POST" action="{{ secure_url('/charity/save') }}">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ trans('charity.new.charity') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="charity" value="{{ old('charity') }}">
                                @if ($errors->has('charity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('charity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ trans('charity.new.desc') }}</label>

                            <div class="col-md-6">
                                <input class="form-control" type="textarea" value="{{ old('description') }}" name="description"/>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">{{ trans('charity.new.www') }}</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="url" value="{{ old('url') }}">
                                @if ($errors->has('url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">{{ trans('charity.new.contactEMAD') }}</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                    
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @else
                                    <span class="help-block centered">
                                        <strong>{{ trans('charity.new.contactInfo') }}</strong>
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
