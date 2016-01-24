@extends('templates.template')

@section('content')
    <div class="container sponsorFix">
        <div class="row welcomeFix margin">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading centered"><h3 class="fixVid">{{ $charity->name }}</h3>
                    </div>
                    <div class="panel-body centered">
                        <a class="btn btn-lg btn-primary" href="{{ $charity->url }}">Website</a>
                    </div>
                    <div class="panel-footer centered">
                        <h3>{{ trans('general.status.status') }}:
                            @if($charity->published === 0)
                                <span class="label label-warning">{{ trans('general.status.review') }}</span>
                            @elseif($charity->published === 1)
                                <span class="label label-danger">{{ trans('general.status.rejected') }}</span>
                            @elseif($charity->published === 2)
                                <span class="label label-success">{{ trans('general.status.approved') }}</span>
                            @else
                                <span class="label label-danger">{{ trans('general.status.error') }}</span>
                            @endif
                        </h3><br>
                        {{ $charity->description }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
