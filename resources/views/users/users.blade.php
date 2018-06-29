@if (count($users) > 0)
<div class="row">
@section('content')
@foreach ($users as $user)
<div class="card">
    <div class="card">
        <div class="card-body">
            @if ($user->avatar_filename)
              <img src="{{ asset('storage/avatar/' . $user->avatar_filename) }}" alt="avatar"class="rounded-circle" style="width: 150px;height: 150px;"/>
             @else
            <img src="{{ Gravatar::src($user->email, 100) . '&d=mm' }}" alt="" class="rounded-circle">
            @endif
            <h5 class="card-title">{{ $user->name }}</h5>
            <p class="card-text">ユーザーの紹介</p>
            <a href="{{route('users.show', ['id'=>$user->id])" class="btn btn-primary">View Profile</a>
        </div>
    </div>
</div>
@endforeach

{!! $users->render() !!}
@endsection
</div>
@endif