@extends('layouts.app')

@section('content')
    <h1><i class="fas fa-heart text-danger"></i>ランキング</h1>
    <h4>読んでみたい本ランキング</h4>
    @include('books.books', ['items' => $items])
@endsection