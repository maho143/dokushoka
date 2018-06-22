@extends('layouts.app')

@section('content')
    <h1><i class="fas fa-bookmark text-info"></i>ランキング</h1>
    <h4>みんなが今読んでいる本ランキング</h4>
    @include('books.books', ['items' => $items])
@endsection