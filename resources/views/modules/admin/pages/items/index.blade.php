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
                            <strong class="card-title">Items</strong>
                            <div class="pull-right">
                                @can('item-create')
                                    <a class="btn btn-success" href="{{ route('items.create') }}"> Create New Item</a>
                                @endcan
                            </div>
                        </div>


                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th width="300px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($items as $item)
                                    <tr>
                                        <td class="serial">{{ $item->id }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>
                                            <img class="img-responsive img-thumbnail"
                                                 src="{{asset($item->image)}}" alt="Image"></td>
                                        </td>
                                        <td>
                                            <a href="{{ route('items.show',$item->id) }}"> <span class="btn btn-info ti-eye"></span> </a>
                                            @can('item-edit')
                                                <a href="{{ route('items.edit',$item->id) }}">
                                                    <span class="btn btn-success ti-pencil"></span>
                                                </a>
                                            @endcan
                                            @can('item-delete')
                                                <form action="{{ route('items.destroy',$item->id) }}" style="display: inline" method="POST" onsubmit="return ConfirmItemDelete()">
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
                {!! $items->links('pagination::bootstrap-4') !!}
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

