@extends('templates.template')

@section('content')
    <div class="container">
        <div class="row welcomeFix margin">
            <div class="panel panel-primary" id="admin">
                <div class="panel-heading">
                    <h4 class="fixVid myBlock">{{ trans('general.admin.title') }}</h4>
                    <h4 class="fixVid myBlock"
                        style="float:right; margin-right:10px;">{{ trans('general.admin.loggedInA') }}
                        : {{ Auth::user()->name }}<a style="color:white; margin-left:25px;" href="{{ url('/logout') }}"><i
                                    class="fa fa-btn fa-sign-out"></i> Logout</a></h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i
                                                class="fa fa-long-arrow-right fa-cogs"></i> {{ trans('general.admin.settings') }}
                                    </h3>
                                </div>
                                <div class="panel-body centered">
                                    @if (Helper::settings('guests'))
                                        <a href="{{ url('toggleGuests') }}"
                                           class="btn btn-danger btn-semi-block">{{ trans('general.admin.disableGuests') }}</a>
                                    @else
                                        <a href="{{ url('toggleGuests') }}"
                                           class="btn btn-success btn-semi-block">{{ trans('general.admin.enableGuests') }}</a>
                                    @endif
                                    @if (Helper::settings('sponsors'))
                                        <a href="{{ url('toggleSponsors') }}" class="btn btn-danger btn-semi-block"
                                           style="margin-top:10px;">{{ trans('general.admin.disableSponsors') }}</a>
                                    @else
                                        <a href="{{ url('toggleSponsors') }}" class="btn btn-success btn-semi-block"
                                           style="margin-top:10px;">{{ trans('general.admin.enableSponsors') }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        {{-- Guests Table --}}
                        @include('admin.guests')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.modal')
@endsection

@push('scripts')
<script>
    var statusData = [{value: 70, color: "#63B8FF"}, {value: 30, color: "#666666"}];
    var status = new Chart(document.getElementById("serverLoad").getContext("2d")).Doughnut(statusData);
    var mcData = [{value: 70, color: "#63B8FF"}, {value: 30, color: "#666666"}];
    var mc = new Chart(document.getElementById("mcSrvLoad").getContext("2d")).Doughnut(mcData);
</script>

<script>
    $('#guests .btn-primary').click(function () {
        console.log($(this));
        $rows = $(this).closest("tr").find("td");
        console.log($rows);
        $('.modal-title').text('{{ trans('general.admin.edit.guest') }}: ' + $rows[1].innerText);

        $('#name').val($rows[1].innerText);
        $('#url').val($rows[2].innerText);
        $('#editModal').modal();
    });

    $(document).on('change', '.btn-file :file', function () {
        var input = $(this),
                numFiles = input.get(0).files ? input.get(0).files.length : 1,
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
    });

    $('.btn-file :file').on('fileselect', function (event, numFiles, label) {
        $('#imageName').val(label);
    });
</script>
@endpush