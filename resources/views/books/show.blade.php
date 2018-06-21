@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12 col-md-offset-3">
            <div class="book">
                <div class="card" >
                      <img class="card-img-top" src="{{ $item->image_url }}" alt="Card image cap">
                      <div class="card-body　h5">
                        @if ($item->id)
                            <p class="book-title">{{ $item->name }}</a></p>
                        @else
                            <p class="book-title">{{ $item->name }}</p>
                        @endif
                        <div class="card-text">
                            <div class="buttons btn-group">
                                @if (Auth::check())
                                    @include('books.want_button', ['item' => $item])
                                    @include('books.read_button', ['item' => $item])
                                    <a href="{{ $item->url }}" target="_blank">{!! Form::button('<i class="fas fa-shopping-cart fa-2x"></i>', ['type' => 'submit', 'class' => 'btn btn-link text-success']) !!}</a>
                                @endif
                            </div>
                            <p class="book-isbn"><a href="#">{{ $item->isbn }}</a></p>
                        </div>
                      </div>
                </div> 
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="want-users">
                <div class="card">
                    <div class="card-heading text-center">
                        読みたい！したドクショカ
                    </div>
                    <div class="card-body">
                        @foreach ($want_users as $user)
                            <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="have-users">
                <div class="card card-default">
                    <div class="card-heading text-center">
                        読んだ！したドクショカ
                    </div>
                    <div class="card-body">
                        @foreach ($read_users as $user)
                            <a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <p class="text-center"><a href="{{ $item->url }}" target="_blank">楽天booksページへ</a></p>
        </div>
    </div>
    
@endsection