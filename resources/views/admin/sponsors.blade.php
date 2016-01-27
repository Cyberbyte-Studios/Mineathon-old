<div class="panel panel-default adminTable" id="sponsors">
    <div class="panel-heading">
        <h4 style="color:black" class="myBlock"><i class="fa fa-users fa-fw"></i> {{ trans('general.sponsors') }} </h4>
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
    		    	@foreach($sponsors as $sponsor)
                    <tr class="centered" data-sponsorID="{{ $sponsor->id }}">
                        <td><img style="width:64px;height:64px;" src="{{ secure_asset('uploads/images/200/' . $sponsor->image) }}" /></td>
                        <td>{{ $sponsor->name }}</td>
                        <td><a href="{{ $sponsor->url }}">{{ $sponsor->url }}</a></td>
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

@push('scripts')
<script>
    $('#sponsors .btn-primary').click(function () {
        var row = $(this).closest("tr");
        var rows = row.find("td");

        $('.modal-title').text('{{ trans('dashboard.admin.edit.sponsor') }}: ' + rows[1].innerText);

        $('#name').val(rows[1].innerText);
        $('#url').val(rows[2].innerText);
        $("#image").attr("src", rows[0].innerText);
        $("#id").val(row.data("sponsorid"));
    
        $("#dashForm").attr("action", "/sponsor/edit");
        $('#editModal').modal();
    });
    
    $('#sponsors .btn-success').click(function () {
        $('.modal-title').text('Add new Sponsor');
        $('#name').val('');
        $('#url').val('');
        $("#dashForm").attr("action", "/sponsor/new");
        $("#image").attr("src", '');

        $('#editModal').modal();
    });

    $('#sponsors .btn-danger').click(function () {
        var row = $(this).closest("tr");
        var sponsorID = row.data("sponsorid");
        if (confirm('Are you sure you want to remove this sponsor?')) {  
            row.remove();
            $.post("{{ secure_url('/sponsor/remove') }}", { id: sponsorID, '_token': '{!! csrf_token() !!}' }, function(data){});
        }
    });    
</script>
@endpush