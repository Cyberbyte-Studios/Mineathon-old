<div class="panel panel-default adminTable" id="guests">
    <div class="panel-heading">
        <h4 style="color:black;"  class="myBlock"><i class="fa fa-users fa-fw"></i> {{ trans('general.guests') }} </h4>
        <button class="btn btn-success myBlock hidden-xs"><i class="fa fa-btn fa-file"></i> New</button>
    </div>
    <div class="panel-body">
        <div class="noWrap">
            <table class="table table-hover table-striped">
                <thead>
                    <tr class="centered">
                        <th>{{ trans('dashboard.admin.image') }}</th>
                        <th>{{ trans('dashboard.admin.name') }}</th>
                        <th>{{ trans('dashboard.admin.url') }}</th>
                        <th>{{ trans('dashboard.admin.actions') }}</th>                        
                    </tr>
                </thead>
                <tbody>
    		    	@foreach($guests as $guest)
                    <tr class="centered">
                        <td><img style="width:64px;height:64px;" src="{{ $guest->image }}" /></td>
                        <td>{{ $guest->name }}</td>
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
