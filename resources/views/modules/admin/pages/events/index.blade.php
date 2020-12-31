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
                            <strong class="card-title">Events</strong>
                            <div class="pull-right">
                                @can('item-create')
                                    <a class="btn btn-success" href="{{ route('events.create') }}"> Create New Event</a>
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
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Partners</th>
                                    <th>Image</th>
                                    <th width="300px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($events as $event)
                                    <tr>
                                        <td class="serial">{{ $event->id }}</td>
                                        <td>{{ $event->name }}</td>
                                        <td>{{ $event->description }}</td>
                                        <td>{{ $event->start_date }}</td>
                                        <td>{{ $event->end_date }}</td>
                                        <td>{{ $event->partner_name }}</td>
                                        <td>
                                            <img class="img-responsive img-thumbnail"
                                                 src="{{asset($event->image_path)}}" alt="Image"></td>
                                        </td>
                                        <td>
                                            <a href="{{ route('events.show',$event->id) }}"> <span class="btn btn-info ti-eye"></span> </a>
                                            @can('events-edit')
                                                <a href="{{ route('events.edit',$event->id) }}">
                                                    <span class="btn btn-success ti-pencil"></span>
                                                </a>
                                            @endcan
                                            @can('events-delete')
                                                <form action="{{ route('events.destroy',$event->id) }}" style="display: inline" method="POST" onsubmit="return ConfirmItemDelete()">
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
                {!! $events->links('pagination::bootstrap-4') !!}
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

