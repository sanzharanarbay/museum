@extends('layouts.app')

@push('styles')


    @endpush

@section('content')

    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Show Category</strong>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="mx-auto d-block">
                                <div class="location text-sm-center">
                                    <i class="fa fa-list"></i>   {{ $category->name }} <br>
                                    <i class="fa fa-tag"></i>   {{ $category->slug }} <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('scripts')

    @endpush
