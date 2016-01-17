<div class="panel panel-default adminTable" id="guests">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-users fa-fw"></i> {{ trans('general.admin.guests') }}
        <button type="button" class="btn btn-success pull-right"><i class="fa fa fa-file-o fa-fw"></i> {{ trans('general.admin.new') }} </button>
        </h3>
    </div>
    <div class="panel-body">
        <div class="noWrap">
            <table class="table table-hover table-striped">
                <thead>
                    <tr class="centered">
                        <th>{{ trans('general.admin.image') }}</th>
                        <th>{{ trans('general.admin.name') }}</th>
                        <th>{{ trans('general.admin.url') }}</th>
                        <th>{{ trans('general.admin.actions') }}</th>                        
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
                                <button type="button" class="btn btn-danger"><i class="fa fa-close fa-fw"></i></button>
                            </div>
                        </td>
                    </tr>
    				@endforeach                    
                </tbody>
            </table>
        </div>
    </div>
</div>
