@extends('layouts.app')

@section('cover')
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>あなただけホンダナをつくろう</h1>
                <a href="{{ route('signup.get') }}" class="btn btn-success btn-lg">ドクショカをはじめる</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    テスト
@endsection