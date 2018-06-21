@if (Auth::user()->is_reading($item->isbn))
    {!! Form::open(['route' => 'book_user.dont_read', 'method' => 'delete']) !!}
        {!! Form::hidden('isbn', $item->isbn) !!}
        {!! Form::button('<i class="fas fa-bookmark fa-2x"></i>', ['type' => 'submit', 'class' => 'btn btn-link text-info']) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => 'book_user.read']) !!}
        {!! Form::hidden('isbn', $item->isbn) !!}
        {!! Form::button('<i class="far fa-bookmark fa-2x"></i>', ['type' => 'submit', 'class' => 'btn btn-link text-info']) !!}
    {!! Form::close() !!}
@endif