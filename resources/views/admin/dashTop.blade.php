<div class="row">
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i
                            class="fa fa-long-arrow-right fa-cogs"></i> {{ trans('dashboard.admin.settings') }}
                </h3>
            </div>
            <div class="panel-body centered" style="padding-top:0">
                @if (Helper::settings('guests'))
                    <a href="{{ url('toggleGuests') }}" class="btn btn-danger enable"> {{ trans('dashboard.admin.disableGuests') }}</a>
                @else
                    <a href="{{ url('toggleGuests') }}" class="btn btn-success enable"> {{ trans('dashboard.admin.enableGuests') }}</a>
                @endif
                @if (Helper::settings('sponsors'))
                    <a href="{{ url('toggleSponsors') }}" class="btn btn-danger enable"> {{ trans('dashboard.admin.disableSponsors') }}</a>
                @else
                    <a href="{{ url('toggleSponsors') }}" class="btn btn-success enable"> {{ trans('dashboard.admin.enableSponsors') }}</a>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-cogs"></i> {{ trans('dashboard.admin.pending.video.titleDash') }}
                </h3>
            </div>
            <div class="panel-body centered" style="padding-top:0">
                <h4 style="padding-top:10px;">{{ $pending['videos'] }}</h4>
                <a href="{{ url('video/admin') }}" class="btn btn-success enable"> {{ trans('dashboard.admin.pending.view') }}</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i
                            class="fa fa-long-arrow-right fa-cogs"></i> {{ trans('dashboard.admin.pending.charity.titleDash') }}
                </h3>
            </div>
            <div class="panel-body centered" style="padding-top:0">

                <h4 style="padding-top:10px;">{{ $pending['charities'] }}</h4>
                <a href="{{ url('charity/admin') }}" class="btn btn-success enable"> {{ trans('dashboard.admin.pending.view') }}</a>
            </div>
        </div>
    </div>     
</div>