@extends('templates.template')

@section('content')
<div class="container sponsorFix">
    <div class="row welcomeFix margin">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="fixVid myBlock">Mineathon Admin Dashboard</h4>
                <h4 class="fixVid myBlock" style="float:right; margin-right:10px;">Logged in as: NAME <a style="color:white; margin-left:25px;" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Logout</a></h4>                
            </div>
            <div class="panel-body">
                <div class="panel panel-default" style="width:30%;">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i> Server Load</h3>
                    </div>
                    <div class="panel-body">
                	    <canvas id="serverLoad" height="120" width="120" style="width: 120px; height: 120px;"></canvas>
                    	<p class="centered"><i class="fa fa-database"></i> 70%</p>
                    </div>
                </div> 
            </div>
        </div>        
    </div>
</div>
@endsection

@push('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
	<script>
		var doughnutData = [
				{
					value: 70,
					color:"#68dff0"
				},
				{
					value : 30,
					color : "#fdfdfd"
				}
			];
			var myDoughnut = new Chart(document.getElementById("serverLoad").getContext("2d")).Doughnut(doughnutData);
	</script>    
@endpush