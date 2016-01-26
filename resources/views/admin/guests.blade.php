<div class="panel panel-default adminTable" id="guests">
    <div class="panel-heading">
        <h4 style="color:black" class="myBlock"><i class="fa fa-users fa-fw"></i> {{ trans('general.guests') }} </h4>
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
                    <tr class="centered" data-guestID="{{ $guest->id }}">
                        <td><img style="width:64px;height:64px;" src="{{ secure_asset('uploads/images/200/' . $guest->image) }}" /></td>
                        <td>{{ $guest->name }}</td>
                        <td><a href="{{ $guest->url }}">{{ $guest->url }}</a></td>
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
    $('#guests .btn-primary').click(function () {
        var row = $(this).closest("tr");
        var rows = row.find("td");

        $('.modal-title').text('{{ trans('dashboard.admin.edit.guest') }}: ' + rows[1].innerText);

        $('#name').val(rows[1].innerText);
        $('#url').val(rows[2].innerText);
        $("#image").attr("src", rows[0].innerText);
        $("#id").val(row.data("guestid"));
    
        $("#dashForm").attr("action", "/guest/edit");

        $('#editModal').modal();
    });
    
    $('#guests .btn-success').click(function () {
        $('.modal-title').text('Add new guest');
        $('#name').val('');
        $('#url').val('');
        $("#dashForm").attr("action", "/guest/new");
        $("#image").attr("src", '');

        $('#editModal').modal();
    });

    $('#guests .btn-danger').click(function () {
        var row = $(this).closest("tr");
        var guestID = row.data("guestid");
        if (confirm('Are you sure you want to remove this guest?')) {  
            row.remove();
            $.post("{{ url('/guest/remove') }}", { id: guestID, '_token': '{!! csrf_token() !!}' }, function(data){});
        }
    });
</script>
@endpush