@extends('layouts.app')


@section('content')

    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Show Item</strong>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('items.index') }}"> Back</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="mx-auto d-block">
                                <div class="location text-sm-center">
                                    <i class="fa fa-font"></i>   {{ $item->name }} <br>
                                    <i class="fa fa-book"></i>   {{ $item->description }} <br>
                                    <i class="fa fa-dollar"></i>   {{ $item->price }} <br>
                                    <i class="fa fa-list"></i>   {{ $item->category->name }} <br>
                                </div>
                                <div class="card-text text-sm-center">
                                    <img class="card-img-bottom" src="{{asset($item->image)}}" alt="Card image cap">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



