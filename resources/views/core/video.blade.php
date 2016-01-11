@extends('templates.template')

@section('content')
<div class="container sponsorFix">
    <div class="row welcomeFix margin">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading centered"><h3 class="fixVid">{{ $video->charity->name }}</h3>
                </div>
                <div class="panel-body">
    				<div class="embed-responsive embed-responsive-16by9">
    				  	<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $video->youtube }}" allowfullscreen></iframe>
    				</div>	
                </div>
                <div class="panel-footer centered">
                    <h3>Submission Staus:
                    @if($video->published === 0)
                        <span class="label label-warning">Submitted & Awaiting Review</span>
                    @elseif($video->published === 1)
                        <span class="label label-danger">Submission Rejected</span>
                    @else
                        <span class="label label-success">Approved & Published</span>                        
                    @endif
                    </h3><br>
                    {{ $video->charity->description }}
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection
