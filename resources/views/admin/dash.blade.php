@extends('templates.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-primary" id="admin">
                <div class="panel-heading">
                    <h4 class="myBlock">{{ trans('dashboard.admin.title') }}</h4>
                    <h4 class="myBlock hidden-xs" style="float:right; margin-right:10px;">
                        {{ trans('dashboard.admin.loggedInA') }}: {{ Auth::user()->name }}
                        <a style="color:white; margin-left:25px;" href="{{ url('/logout') }}">
                        <i class="fa fa-btn fa-sign-out"></i> {{ trans('dashboard.admin.logout') }}</a>
                    </h4>
                </div>
                <div class="panel-body">
                    {{-- Top Stuff --}}
                    @include('admin.dashTop')
                    
                    {{-- Guests Table --}}
                    @include('admin.guests')
                    
                    {{-- Sponsors Table --}}
                    @include('admin.sponsors')                    
                </div>
            </div>
        </div>
    </div>
    @include('admin.modal')
@endsection

@push('scripts')
<script>
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