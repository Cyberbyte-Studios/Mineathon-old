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
                    <h3>Submission Staus:
                    @if($charity->published === 0)
                        <span class="label label-warning">Submitted & Awaiting Review</span>
                    @elseif($charity->published === 1)
                        <span class="label label-danger">Submission Rejected</span>
                    @else
                        <span class="label label-success">Approved & Published</span>                        
                    @endif
                    </h3><br>
                    {{ $charity->description }}
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection
