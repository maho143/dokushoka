@if (Auth::user()->is_wanting($item->isbn))
    {!! Form::open(['route' => 'book_user.dont_want', 'method' => 'delete']) !!}
        {!! Form::hidden('isbn', $item->isbn) !!}
        {!! Form::button('<i class="fas fa-heart fa-2x"></i>', ['type' => 'submit', 'class' => 'btn btn-link text-danger h3']) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => 'book_user.want']) !!}
        {!! Form::hidden('isbn', $item->isbn) !!}
        {!! Form::button('<i class="far fa-heart fa-2x"></i>', ['type' => 'submit', 'class' => 'btn btn-link text-danger h3']) !!}
    {!! Form::close() !!}
@endif