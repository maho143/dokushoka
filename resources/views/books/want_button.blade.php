@if (Auth::user()->is_wanting($item->isbn))
    {!! Form::open(['route' => 'book_user.dont_want', 'method' => 'delete']) !!}
        {!! Form::hidden('isbn', $item->isbn) !!}
        {!! Form::submit('読みたい！', ['class' => 'btn btn-default']) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => 'book_user.want']) !!}
        {!! Form::hidden('isbn', $item->isbn) !!}
        {!! Form::submit('読みたい！', ['class' => 'btn btn-success']) !!}
    {!! Form::close() !!}
@endif