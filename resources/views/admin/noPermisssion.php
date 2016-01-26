@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-primary" id="admin">
                <div class="panel-heading">
                    <h4 class="myBlock"> {{ trans('admin.awaiting') }}</h4>
                    <h4 class="myBlock hidden-xs" style="float:right; margin-right:10px;">{{ trans('dashboard.admin.loggedInA') }}:
                    {{ Auth::user()->name }}<a style="color:white; margin-left:25px;" href="{{ url('/logout') }}"><i
                                    class="fa fa-btn fa-sign-out"></i> {{ trans('dashboard.logout') }}</a></h4>
                </div>
                <div class="panel-body">
                    <h3 class="centered"> {{ trans('dashboard.awaiting') }}</h3>              
                </div>
            </div>
        </div>
    </div>
@endsection