@if (count($users) > 0)
<div class="row">
@section('content')
@foreach ($users as $user)

<div class="col-md-3">
<div class="card">
        <div class="card">
            <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
        <div class="card-body">
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