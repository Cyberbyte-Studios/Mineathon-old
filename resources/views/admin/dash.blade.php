@extends('templates.template')

@section('content')
<div class="container sponsorFix">
    <div class="row welcomeFix margin">
        <div class="panel panel-primary" id="admin">
            <div class="panel-heading">
                <h4 class="fixVid myBlock">Mineathon Admin Dashboard</h4>
                <h4 class="fixVid myBlock" style="float:right; margin-right:10px;">Logged in as: {{ Auth::user()->name }}<a style="color:white; margin-left:25px;" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></h4>                
            </div>
            <div class="panel-body">
                <div class="panel panel-default graphs">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Website Load</h3>
                    </div>
                    <div class="panel-body">
                	    <p class="centered"><canvas id="serverLoad" height="120" width="120" style="width: 120px; height: 120px;"></canvas></p>
                    	<p class="centered"><i class="fa fa-database"></i> Database 70% <br><i class="fa fa-gear"></i> NGIX: 70%</p>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Minecraft Server Load</h3>
                    </div>
                    <div class="panel-body">
                	    <p class="centered"><canvas id="mcSrvLoad" height="120" width="120" style="width: 120px; height: 120px;"></canvas></p>
                    	<p class="centered"><i class="fa fa-database"></i> Database 70% <br><i class="fa fa-gear"></i> NGIX: 70%</p>
                    </div>
                </div> 
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Server Load</h3>
                    </div>
                    <div class="panel-body">
                	    <p class="centered"><canvas id="serverLoad" height="120" width="120" style="width: 120px; height: 120px;"></canvas></p>
                    	<p class="centered"><i class="fa fa-database"></i> 70%</p>
                    </div>
                </div>
                
                {{-- Guests Table --}}
            	@include('admin.guests')
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
    $('.modal-title').text('{{ trans('admin.edit.guest') }}: ' + $rows[1].innerText);

    $('#name').val($rows[1].innerText);
    $('#url').val($rows[2].innerText);
    $('#editModal').modal();
});

$('#guests .btn-primary').click(function () {
    console.log($(this));
    $rows = $(this).closest("tr").find("td");
    console.log($rows);
    $('.modal-title').text('{{ trans('admin.edit.guest') }}: ' + $rows[1].innerText);

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