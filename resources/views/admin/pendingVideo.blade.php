@extends('templates.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default adminTable" id="pendingVideo">
            <div class="panel-heading">
                <h4><i class="fa fa-users fa-fw"></i> Pending Videos </h4>
                <a href="{{ url('dashboard') }}" class="btn btn-primary"><i class="fa fa-reply-all fa-fw"></i> Dashboard</a>
            </div>
            <div class="panel-body">
                <div class="noWrap">
                    @if (count($videos) < 1)
                        <h3 class="centered">No Pending Videos</h3>
                    @else                     
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr class="centered">
                                    <th>ID</th>
                                    <th>Submitted By</th>
                                    <th>Charity Name</th> 
                                    <th>Video Link (Opens in new tab)</th>
                                    <th>{{ trans('dashboard.admin.actions') }}</th>                        
                                </tr>
                            </thead>
                            <tbody>
                		    	@foreach($videos as $video)
                                <tr class="centered">
                                    <td id="id">{{ $video->id }}</td>
                                    <td>{{ $video->user }}</td>
                                    <td>{{ $video->charity->name }}</td>                                
                                    <td><a href="https://www.youtube.com/embed/{{ $video->youtube }}" target="_blank">{{ $video->youtube }}</a></td>
                                    <td>
                                        <div class="row">
                                            <button type="button" class="btn btn-success"><i class="fa fa-check fa-fw"></i></button>
                                            <button type="button" class="btn btn-danger"><i class="fa fa-close fa-fw"></i></button>
                                        </div>
                                    </td>
                                </tr>
                				@endforeach                    
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
    $('#pendingVideo .btn-success').click(function () {
        rows = $(this).closest("tr").find("td");
        vidID = $('#id').val(rows[0].innerText);
        vidID = vidID[0].innerText;
        if (confirm('Are you sure you want to approve this video?')) {
            $(this).closest("tr").remove();
            $.post("{{ url('video/approve') }}", { id: vidID, '_token': '{!! csrf_token() !!}' }, function(data){});             
        }
    });
    
    $('#pendingVideo .btn-danger').click(function () {
        rows = $(this).closest("tr").find("td");
        vidID = $('#id').val(rows[0].innerText);
        vidID = vidID[0].innerText;
        if (confirm('Are you sure you want to approve this video?')) {
            $(this).closest("tr").remove();
            $.post("{{ url('video/deny') }}", { id: vidID, '_token': '{!! csrf_token() !!}' }, function(data){});
        }
    });    
</script>
@endpush