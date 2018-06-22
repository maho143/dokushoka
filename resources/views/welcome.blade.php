@extends('layouts.app')

@section('cover')
    <div class="cover ">
        <div class="cover-inner mr-5">
            <div class="cover-contents" style="margin-top: 100px; ">
                <h1>素敵な本に出会う場所</h1>
                <a href="{{ route('signup.get') }}"><i class="fas fa-book-open fa-5x text-muted"></i></a>
                <h4>START HERE</h4>
            </div>
        </div>
    </div>
@endsection

@section('content')
<h2>Library</h2>
    @include('books.books')
    {!! $items->render() !!}
@endsection