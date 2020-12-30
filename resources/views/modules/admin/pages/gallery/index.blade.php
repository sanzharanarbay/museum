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


    <!-- Begin Table content -->

    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Gallery Items</strong>
                            <div class="pull-right">
                                @can('gallery-create')
                                    <a class="btn btn-success" href="{{ route('gallery.create') }}"> Create New Gallery Item</a>
                                @endcan
                            </div>
                        </div>


                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th width="300px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($galleries as $gallery)
                                    <tr>
                                        <td class="serial">{{ $gallery->id }}</td>
                                        <td>{{ $gallery->name }}</td>
                                        <td>{{ $gallery->description }}</td>
                                        <td>
                                            <img class="img-responsive img-thumbnail"
                                                 src="{{asset($gallery->image_path)}}" alt="Image"></td>
                                        </td>
                                        <td>
                                            <a href="{{ route('gallery.show',$gallery->id) }}"> <span class="btn btn-info ti-eye"></span> </a>
                                            @can('gallery-edit')
                                                <a href="{{ route('gallery.edit',$gallery->id) }}">
                                                    <span class="btn btn-success ti-pencil"></span>
                                                </a>
                                            @endcan
                                            @can('gallery-delete')
                                                <form action="{{ route('gallery.destroy',$gallery->id) }}" style="display: inline" method="POST" onsubmit="return ConfirmItemDelete()">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger ti-trash"><span></span></button>
                                                </form>
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
                {!! $galleries->links('pagination::bootstrap-4') !!}
            </div>

        </div>
    </div>

    <!-- End Table content -->





@endsection


@push('scripts')

    <script>

        function ConfirmItemDelete()
        {
            var x = confirm("Are you sure you want to delete?");
            if (x)
                return true;
            else
                return false;
        }

    </script>


@endpush

