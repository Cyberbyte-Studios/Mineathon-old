@extends('templates.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel panel-default adminTable" id="guests">
                <div class="panel-heading">
                    <h4 style="color:black;"  class="myBlock"><i class="fa fa-users fa-fw"></i> {{ trans('general.users') }} </h4>
                    <a href="{{ url('dashboard') }}" class="btn btn-primary"><i class="fa fa-reply-all fa-fw"></i> Dashboard</a>
                </div>
                <div class="panel-body">
                    <div class="noWrap">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr class="centered">
                                    <th>{{ trans('dashboard.admin.name') }}</th>
                                    <th>{{ trans('dashboard.admin.url') }}</th>
                                    <th>{{ trans('dashboard.admin.actions') }}</th>                        
                                </tr>
                            </thead>
                            <tbody>
                		    	@foreach($users as $user)
                                <tr class="centered">
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <div class="row">
                                            @if ($user->level < 2)
                                                <button type="button" data-id="{{$user->id}}" class="btn btn-success"><i class="fa fa-check fa-fw"></i> Approve User</button>
                                            @else
                                                <button type="button" data-id="{{$user->id}}" class="btn btn-danger"><i class="fa fa-close fa-fw"></i> Remove User</button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                				@endforeach                    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>            
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.btn-success').click(function () {
                var self = $(this);
                var id = self.data('id');
                $.post("{{ secure_url('/user/approve') }}", {'id': id, '_token': '{{ csrf_token() }}'}, function (data) {
                });
                location.reload();
            });
        });
        $(document).ready(function () {
            $('.btn-danger').click(function () {
                var self = $(this);
                var id = self.data('id');
                $.post("{{ secure_url('/user/remove') }}", {'id': id, '_token': '{{ csrf_token() }}'}, function (data) {
                });
                location.reload();                
            });
        });        
    </script>
@endpush