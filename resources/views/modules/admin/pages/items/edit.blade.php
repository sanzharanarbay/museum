@extends('layouts.app')

@push('styles')
    {{--<link rel="stylesheet" href="{{asset('admin/assets/css/lib/chosen/chosen.min.css')}}">--}}
@endpush

@section('content')

    @if (count($errors) > 0)
        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
            <span class="badge badge-pill badge-danger">Whoops! There were some problems with your input </span> <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
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
                            <strong class="card-title">Edit Item</strong>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('items.index') }}"> Back</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Select Category of Item:</strong>
                                            {!! Form::select('category_id', $categories, $item->category_id, array('class' => 'form-control',)) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Name:</strong>
                                            <input type="text" name="name" class="form-control" value="{{$item->name}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Description:</strong>
                                            <textarea class="form-control" style="height:150px" name="description">
                                                {{$item->description}}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Price:</strong>
                                            <input type="number" name="price" class="form-control" value="{{$item->price}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <label for="file-input" class=" form-control-label">Item image</label>
                                        <input type="file"  name="image" class="form-control-file">
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection


@push('scripts')
    {{--<script src="{{asset('admin/assets/js/lib/chosen/chosen.jquery.min.js')}}"></script>--}}
    {{--<script>--}}
    {{--jQuery(document).ready(function() {--}}
    {{--$(".standardSelect").chosen({--}}
    {{--disable_search_threshold: 10,--}}
    {{--no_results_text: "Oops, nothing found!",--}}
    {{--width: "100%"--}}
    {{--});--}}
    {{--});--}}
    {{--</script>--}}
@endpush
