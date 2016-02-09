@extends('templates.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default adminTable" id="pendingVideo">
            <div class="panel-heading">
                <h4><i class="fa fa-users fa-fw"></i> Pending Charities </h4>
                <a href="{{ secure_url('dashboard') }}" class="btn btn-primary"><i class="fa fa-reply-all fa-fw"></i> Dashboard</a>
            </div>
            <div class="panel-body">
                <div class="noWrap">
                    @if (count($charities) < 1)
                        <h3 class="centered">No Pending Charities</h3>
                    @else                    
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr class="centered">
                                    <th>ID</th>
                                    <th>Charity Name</th> 
                                    <th>View More (Opens in new tab)</th>
                                    <th>{{ trans('dashboard.admin.actions') }}</th>                        
                                </tr>
                            </thead>
                            <tbody>
                    		    	@foreach($charities as $charity)
                                    <tr class="centered">
                                        <td id="id">{{ $charity->id }}</td>
                                        <td>{{ $charity->name}}</td>
                                        <td><a href="{{ secure_url('charity/'.$charity->id) }}" target="_blank">View More</a> </td>                                   
                                        <td>
                                            <div class="row">
                                                @if($charity->trashed())
                                                <i class="fa fa-trash-o"></i>
                                                @else
                                                <button type="button" class="btn btn-success"><i class="fa fa-check fa-fw"></i></button>
                                                <button type="button" class="btn btn-danger"><i class="fa fa-close fa-fw"></i></button>
                                                @endif
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
        if (confirm('Are you sure you want to approve this charity?')) {
            $(this).closest("tr").remove();
            $.post("{{ secure_url('charity/approve') }}", { id: vidID, '_token': '{!! csrf_token() !!}' }, function(data){});             
        }
    });
    
    $('#pendingVideo .btn-danger').click(function () {
        rows = $(this).closest("tr").find("td");
        vidID = $('#id').val(rows[0].innerText);
        vidID = vidID[0].innerText;
        if (confirm('Are you sure you want to deny this chaity?')) {  
            $(this).closest("tr").remove();
            $.post("{{ secure_url('charity/deny') }}", { id: vidID, '_token': '{!! csrf_token() !!}' }, function(data){});
        }
    });    
</script>
@endpush