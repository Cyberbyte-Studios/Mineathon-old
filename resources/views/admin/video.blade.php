@extends('templates.template')

@section('content')
<div class="container sponsorFix">
    <div class="row welcomeFix margin">
        <div class="panel panel-primary" id="admin">
            <div class="panel-heading">
                <h4 class="fixVid myBlock">{{ trans('general.admin.title') }}</h4>
                <h4 class="fixVid myBlock" style="float:right; margin-right:10px;">
                    {{ trans('general.admin.loggedInA') }}: {{ Auth::user()->name }}
                    <a style="color:white; margin-left:25px;" href="{{ secure_url('/logout') }}">
                        <i class="fa fa-btn fa-sign-out"></i> {{ trans('dashboard.logout') }}
                    </a>
                </h4>                
            </div>
            <div class="panel-body">
                <div class="panel panel-default adminTable" id="guests">
                    <div class="panel-heading">
                        <h4><i class="fa fa-users fa-fw"></i> {{ trans('general.admin.guests') }} </h4>
                    </div>
                    <div class="panel-body">
                        <div class="noWrap">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr class="centered">
                                        <th>{{ trans('general.admin.name') }}</th>
                                        <th>{{ trans('general.admin.url') }}</th>
                                        <th>{{ trans('general.admin.actions') }}</th>                        
                                    </tr>
                                </thead>
                                <tbody>
                    		    	@foreach($videos as $video)
                                    <tr class="centered">
                                        <td><img style="width:64px;height:64px;" src="{{ $guest->image }}" /></td>
                                        <td>{{ $video->name }}</td>
                                        <td>{{ $guest->url }}</td>
                                        <td>
                                            <div class="row">
                                                <button type="button" class="btn btn-primary"><i class="fa fa-pencil fa-fw"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                    				@endforeach                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>       	
            </div>
        </div>        
    </div>
</div>
@include('admin.modal')
@endsection

@push('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
<script>
	var statusData = [ { value: 70, color:"#63B8FF" }, { value : 30, color : "#666666" } ];
	var status = new Chart(document.getElementById("serverLoad").getContext("2d")).Doughnut(statusData);
	var mcData = [ { value: 70, color:"#63B8FF" }, { value : 30, color : "#666666" } ];
	var mc = new Chart(document.getElementById("mcSrvLoad").getContext("2d")).Doughnut(mcData);		
</script>

<script>
$('#guests .btn-primary').click(function () {
    console.log($(this));
    $rows = $(this).closest("tr").find("td");
    console.log($rows);
    $('.modal-title').text('{{ trans('general.admin.edit.guest') }}: ' + $rows[1].innerText);

    $('#name').val($rows[1].innerText);
    $('#url').val($rows[2].innerText);
    $('#editModal').modal();
});

$('#guests .btn-primary').click(function () {
    console.log($(this));
    $rows = $(this).closest("tr").find("td");
    console.log($rows);
    $('.modal-title').text('{{ trans('general.admin.edit.guest') }}: ' + $rows[1].innerText);

    $('#name').val($rows[1].innerText);
    $('#url').val($rows[2].innerText);
    $('#editModal').modal();
});
    
$(document).on('change', '.btn-file :file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
});

$('.btn-file :file').on('fileselect', function(event, numFiles, label) {
    $('#imageName').val(label);
});
</script>
@endpush