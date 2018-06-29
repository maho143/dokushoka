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
                @if ($user->avatar_filename)
                  <img src="{{ asset('storage/avatar/' . $user->avatar_filename) }}" alt="avatar"class="rounded-circle" style="width: 150px;height: 150px;"/>
                @else
                    <img src="{{ Gravatar::src($user->email, 100) . '&d=mm' }}" alt="" class="rounded-circle">
                @endif
                @include('user_follow.follow_button', ['user' => $user])
        </div>
        </div>
    @endforeach
</div>
@endsection

