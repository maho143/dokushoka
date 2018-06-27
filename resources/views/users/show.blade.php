@extends('layouts.app')

@section('content')
    <div class="user-profile">
        <div class="icon text-center">
            <img src="{{ Gravatar::src($user->email, 100) . '&d=mm' }}" alt="" class="img-circle">
        </div>
        <div class="name text-center">
            <h1>{{ $user->name }}</h1>
            @include('user_follow.follow_button', ['user' => $user])
        </div>
        <div class="status text-center">
            <ul>
                <li>
                    <div class="status-label">Follow</div>
                    <div id="count_followings" class="status-value">
                        <a href="{{ route('users.followings', ['id' => $user->id]) }}">{{ $count_followings }}</a>
                    </div>
                </li>
                <li>
                    <div class="status-label">Follower</div>
                    <div id="count_followers" class="status-value">
                        <a href="{{ route('users.followers', ['id' => $user->id]) }}">{{ $count_followers }}</a>
                    </div>
                </li>
            </ul>
        </div>
        
        
        <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="want-tab" data-toggle="tab" href="#want" role="tab" aria-controls="want" aria-selected="true"><i class="fas fa-heart text-danger"></i>読みたい！<span class="badge">{{ $count_want }}</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="read-tab" data-toggle="tab" href="#read" role="tab" aria-controls="read" aria-selected="false"><i class="fas fa-bookmark text-success"></i>読んだ！<span class="badge">{{ $count_read }}</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews<span class="badge">{{ $count_read }}</span></a>
          </li>
        </ul>
        
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="want" role="tabpanel" aria-labelledby="want-tab">
              {{ var_dump($want_items) }}
          </div>
          
          <div class="tab-pane fade" id="read" role="tabpanel" aria-labelledby="read-tab">
              {!! $read_items->render() !!}
          </div>
          
          <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
              {!! $reviews->render() !!}
          </div>
        </div>
    
            
    </div>
 
@endsection