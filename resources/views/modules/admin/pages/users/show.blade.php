@extends('layouts.app')


@section('content')

    <div class="content">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Show User</strong>
                            <div class="pull-right">
                                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                            </div>
                        </div>

                         <div class="card-body">
                                <div class="mx-auto d-block">
                                    <div class="location text-sm-center">
                                        <i class="fa fa-info-circle"></i> {{ $user->name }} <br>
                                         <i class="fa fa-envelope-o"></i>  {{ $user->email }} <br>
                                    </div>
                                    <div class="card-text text-sm-center">
                                            <i class="fa fa-male"></i>
                                        @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                                 <label class="badge badge-success">{{ $v }}</label>
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
