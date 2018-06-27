@extends('layouts.app')

@section('content')
    @foreach($users as $user)
    <div class="row">
        <aside class="col-xs-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                </div>
                <div class="panel-body">
                    <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 500) }}" alt="">
                </div>
            </div>
            @include('user_follow.follow_button', ['user' => $user])
        </aside>
    </div>
    @endforeach
@endsection