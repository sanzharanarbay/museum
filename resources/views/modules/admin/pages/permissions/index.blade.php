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

    <!-- Begin table -->

    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Permission Management</strong>
                            <div class="pull-right">
                                @can('permission-create')
                                    <a class="btn btn-success" href="{{ route('permissions.create') }}"> Create New Permission</a>
                                @endcan
                            </div>
                        </div>


                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Name</th>
                                    <th width="280px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($permissions as $key => $permission)
                                    <tr>
                                        <td>{{ $permission->id}}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>
                                            <a href="{{ route('permissions.show',$permission->id) }}"><span class="btn btn-info ti-eye"></span></a>
                                            @can('permission-edit')
                                                    <a href="{{ route('permissions.edit',$permission->id) }}">
                                                    <span class="btn btn-success ti-pencil"></span>
                                                    </a>
                                            @endcan
                                            @can('permission-delete')
                                                {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline', 'onsubmit' => 'return ConfirmPermissionDelete()']) !!}
                                                {!! Form::button('<span></span>', ['type' =>'submit' ,'class' => 'btn btn-danger ti-trash']) !!}
                                                {!! Form::close() !!}
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="justify-content-center">
                {!! $permissions->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>


    <!-- End table -->

    @endsection


@push('scripts')

    <script>

        function ConfirmPermissionDelete()
        {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }

    </script>

    @endpush
