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
                    @if ($user->avatar_filename)
                      <img src="{{ asset('storage/avatar/' . $user->avatar_filename) }}" alt="avatar"class="rounded-circle" style="width: 150px;height: 150px;"/>
                    @else
                        <img src="{{ Gravatar::src($user->email, 100) . '&d=mm' }}" alt="" class="rounded-circle">
                    @endif
                </div>
            </div>
            @include('user_follow.follow_button', ['user' => $user])
        </aside>
    </div>
    @endforeach
@endsection