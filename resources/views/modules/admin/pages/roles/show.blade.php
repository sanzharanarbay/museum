@extends('layouts.app')


@section('content')

    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Show Role</strong>
                                <div class="pull-right">
                                    <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
                                </div>
                            </div>

                        <div class="card-body">
                            <div class="mx-auto d-block">
                                <div class="location text-sm-center">
                                    <i class="fa fa-male"></i>   {{ $role->name }} <br>
                                </div>
                                <div class="card-text text-sm-center">
                                    @if(!empty($rolePermissions))
                                        @foreach($rolePermissions as $v)
                                            <i class="fa fa-unlock"></i> <label class="label label-success">{{ $v->name }},</label>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



