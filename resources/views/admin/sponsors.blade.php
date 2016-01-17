<div class="panel panel-default adminTable" id="sponsors">
    <div class="panel-heading">
        <h4><i class="fa fa-users fa-fw"></i> {{ trans('general.admin.sponsors') }} </h4>
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
    		    	@foreach($sponsors as $sponsor)
                    <tr class="centered">
                        <td><img style="width:64px;height:64px;" src="{{ $sponsor->image }}" /></td>
                        <td>{{ $sponsor->name }}</td>
                        <td>{{ $sponsor->url }}</td>
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
