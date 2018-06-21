@extends('layouts.app')

@section('content')
    <div class="user-profile">
        <div class="icon text-center">
            <img src="{{ Gravatar::src($user->email, 100) . '&d=mm' }}" alt="" class="img-circle">
        </div>
        <div class="name text-center">
            <h1>{{ $user->name }}</h1>
        </div>
        <div class="status text-center">
            <ul>
                <li>
                    <div class="status-label">読みたい！</div>
                    <div id="want_count" class="status-value">
                        {{ $count_want }}
                    </div>
                </li>
                <li>
                    <div class="status-label">読んだ！</div>
                    <div id="have_count" class="status-value">
                        {{ $count_read }}
                    </div>
                </li>
            </ul>
        </div>
    </div>
    @include('books.books', ['items' => $items])
    {!! $items->render() !!}
@endsection