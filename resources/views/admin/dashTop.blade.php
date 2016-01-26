<div class="row">
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-long-arrow-right fa-cogs"></i> {{ trans('dashboard.admin.settings') }}
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
                @if (Auth::user()->level > 2)
                    <a href="{{ url('translations') }}" class="btn btn-primary enable"> {{ trans('transSystem.title') }}</a>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-long-arrow-right fa-cogs"></i> {{ trans('dashboard.admin.settings') }}
                </h3>
            </div>
            <div class="panel-body centered" style="padding-top:0;">
                @if (Helper::settings('votes'))
                    <a href="{{ url('toggleVote') }}" class="btn btn-danger enable"> {{ trans('vote.disableVote') }}</a>
                @else
                    <a href="{{ url('toggleVote') }}" class="btn btn-success enable"> {{ trans('vote.enableVote') }}</a>
                @endif
                
                @if (Helper::settings('donate'))
                    <a href="{{ url('toggleDonate') }}" class="btn btn-danger enable"> {{ trans('dashboard.disableDonate') }}</a>
                @else
                    <a href="{{ url('toggleDonate') }}" class="btn btn-success enable"> {{ trans('dashboard.enableDonate') }}</a>
                @endif
                
                @if (Auth::user()->level > 2)
                    <a href="{{ url('users') }}" class="btn btn-success enable"> {{ trans('dashboard.newStaff') }}</a>
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
                <h4 style="padding-top:10px;">{{ Helper::getPendingVideos()}}</h4>
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

                <h4 style="padding-top:10px;">{{  Helper::getPendingCharities() }}</h4>
                <a href="{{ url('charity/admin') }}" class="btn btn-success enable"> {{ trans('dashboard.admin.pending.view') }}</a>
            </div>
        </div>
    </div>
</div>