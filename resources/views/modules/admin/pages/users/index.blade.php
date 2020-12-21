@extends('layouts.app')



@push('styles')


@endpush


@section('content')

    @if ($message = Session::get('success'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            <span class="badge badge-pill badge-success">Success</span>
            {{$message}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Users Management</strong>
                            <div class="pull-right">
                                @can('user-create')
                                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
                                    @endcan
                            </div>
                        </div>
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th width="280px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $key => $user)
                                <tr>
                                    <td class="serial">{{ ++$i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                                <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('users.show',$user->id) }}"><span class="btn btn-info ti-eye"></span></a>
                                        @can('user-edit')
                                        <a href="{{ route('users.edit',$user->id) }}">
                                            <span class="btn btn-success ti-pencil"></span>
                                        </a>
                                        @endcan
                                        @can('user-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline', 'onsubmit' => 'return ConfirmUserDelete()']) !!}
                                        {!! Form::button('<span></span>', ['type' =>'submit', 'class' => 'btn btn-danger ti-trash']) !!}
                                        {!! Form::close() !!}
                                            @endcan
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="justify-content-center">
                {!! $data->links('pagination::bootstrap-4') !!}
            </div>

        </div>
    </div>


@endsection

@push('scripts')

    <script>

        function ConfirmUserDelete()
        {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }

    </script>

@endpush
