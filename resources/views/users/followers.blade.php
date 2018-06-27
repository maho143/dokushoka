@extends('layouts.app')

@section('content')
<div class="row">
    @foreach($users as $user)
        <div class="col-md-3">
            <div class="card">
              <div class="card-header">
                {{ $user->name }}
              </div>
            <div class="card-body">
                <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 100) }}" alt="">
                @include('user_follow.follow_button', ['user' => $user])
        </div>
        </div>
    @endforeach
</div>
@endsection