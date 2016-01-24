@extends('templates.template')

@section('content')
<div id="header">
    <div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 centered">
				<h1>Donate to !</h1>
				<h3>We have raised <strong id="raised"></strong> so far! Help us reach our goal of £10,000</h3>
                <div class="raisedStats"></div>
			</div><!-- /col-lg-8 -->
		</div><!-- /row -->
    </div> <!-- /container -->
</div><!-- /ww -->

<div class="container">
    <h1 class="text-center">Top 10 Donations</h1>
    <div class="row margin centered">
        <div class="col-lg-8 col-lg-offset-2 centered">
            <div class="table-responsive  centered"></div>
            <table class="myTab table table-hover table-striped">
                <thead>
                <tr>
                    <th class="text-center">Username</th>
                    <th class="text-center">Donation</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div><!-- /container -->

{{-- Sponsor  Section --}}
@include('templates.sponsors')
@endsection

@push('scripts')
<!-- Top 10 Donators -->
<script>
    $(document).ready(function () {
        setInterval(function () {
            fetchTop();
        }, 600000);  // this will call your fetchData function for every 10 Min.
    });

    function fetchTop() {
        $(".myTab tbody").empty(); // this will remove all <tr>.
        $.get("https://imraising.tv/api/v1/topDonors?apikey=bfncDsxXbt8WB0wiRvwXVw", function (data) {
            $.each(data, function (i, donor) {
                $(".myTab").append(
                        "<tr><td class='centered'>" + donor.nickname + "</td>" +
                        "<td class='centered'>£" + donor.amount.total + "</td></tr>"
                );
            });
        });
    }
</script>

<!-- Total Raised -->
<script>
    $(document).ready(function () {
        setInterval(function () {
            fetchRaised();
        }, 300000);  // this will call your fetchRaised function for every 5 Min.
    });
    function fetchRaised() {
        $.get("https://imraising.tv/api/v1/donations/total?apikey=bfncDsxXbt8WB0wiRvwXVw", function (data) {
            $('#raised').html('£' + data[0].total);
            var raised = data[0].total / 10000 * 100;
            $('.raisedStats').html('<div class="progress"><div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="' + raised + '" aria-valuemin="0" aria-valuemax="100" style="width: ' + raised + '%;">£' + data[0].total + '</div></div>');
        });
    }
</script>

<script>
    $(document).ready(function () {
        fetchTop();
        fetchRaised();
    });
</script>
@endpush