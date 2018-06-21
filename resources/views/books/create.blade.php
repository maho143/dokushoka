@extends('layouts.app')

@section('content')
    <div class="search">
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                {!! Form::open(['route' => 'books.create', 'method' => 'get', 'class' => 'form-inline']) !!}
                    <div class="form-group">
                        {!! Form::text('keyword', $keyword, ['class' => 'form-control input-lg', 'placeholder' => 'キーワードを入力', 'size' => 40]) !!}
                    </div>
                    {!! Form::submit('Search', ['class' => 'btn btn-success btn-lg']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    @include('books.books', ['items' => $items])
@endsection