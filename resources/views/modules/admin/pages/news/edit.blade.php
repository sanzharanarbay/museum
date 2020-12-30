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
                            <strong class="card-title">Edit News</strong>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('news.index') }}"> Back</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Title:</strong>
                                            <input type="text" name="title" class="form-control" value="{{$news->title}}">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Description:</strong>
                                            <textarea class="form-control" style="height:150px" name="description">
                                                {{$news->content}}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <label for="file-input" class=" form-control-label">News image</label>
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
