@extends('layouts.app')

@section('content')
<h1 class="book-title text-left ml-3 mt-10 ">{{ $item->name }}</h1>
    <div class="row" style="margin-top: 50px;">
        <div class="col-md-3 col-sm-6 col-xs-12 col-md-offset-3">
            <div class="book">
                <div class="card" >
                      <img class="card-img-top mb-3" src="{{ $item->image_url }}" alt="Card image cap">
                      <div class="card-body　h5">
                        <div class="card-text text-center">
                            <div class="buttons btn-group">
                                @if (Auth::check())
                                    @include('books.want_button', ['item' => $item])
                                    @include('books.read_button', ['item' => $item])
                                    <a href="{{ $item->url }}" target="_blank">{!! Form::button('<i class="fas fa-shopping-cart fa-2x"></i>', ['type' => 'submit', 'class' => 'btn btn-link text-success']) !!}</a>
                                    @include('books.review_button', ['item' => $item])
                                @endif
                            </div>
                            <div class="book-information">
                                <p class="book-isbn">ISBN : {{ $item->isbn }}</p>
                                <p class="book-author">著者 : {{ $item->author }}</p>
                                <p class="book-publisherName">出版社 : {{ $item->publisherName }}</p>
                            </div>
                        </div>
                      </div>
                </div> 
            </div> 
        </div>
        <div class="col-md-8 col-sm-12" style="margin-left: 50px;">
            <div class="review text-center" style="margin-bottom: 30px;"></div>
                <div class="review-want" style="margin: 30px;">
                    <p class="h3"><i class="fas fa-heart text-danger" style="margin-right: 10px;"></i>{{ $want_users->count()}}</p>
                </div>
                <div class="review-read" style="margin: 30px;">
                    <p class="h3"><i class="fas fa-bookmark text-success" style="margin-right: 15px;"></i>{{ $read_users->count()}}</p>
                </div>
                
            
            <div class="want-users">
                <div class="card" style="padding: 20px; margin-bottom: 30px;">
                    
                    <div class="card-heading text-left">
                        Summary
                    </div>
                    <div class="card-body height-">
                        <p class="book-itemCaption">{{ $item->itemCaption }}</p> 
                    </div>
                </div>
            </div>
            <?php $reviews = $item ->reviews(); ?>
            @include('reviews.reviews', ['reviews' => $reviews])
            
            
            <p class="text-left"><a href="{{ $item->url }}" target="_blank">楽天booksページへ</a></p>
        </div>
    </div>
    
@endsection