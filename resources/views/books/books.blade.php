@if ($items)
    <div class="row">
        @foreach ($items as $key => $item)
            <div class="book">
                <div class="col-md-3 col-sm-4 col-xs-12">
                   <div class="card" style="width: 18rem;">
                      <img class="card-img-top" src="{{ $item->image_url }}" alt="Card image cap">
                        <div class="card-body">
                        <div class="caption">
                        @if ($item->id)
                            <a href="{{ route('books.show', $item->id) }}"><p class="book-title">{{ $item->name }}</p></a>
                        @else
                            <a href="{{ $item->url }}"><p class="book-title">{{ $item->name }}</p></a>
                        @endif
                            <div class="buttons btn-group">
                                @if (Auth::check())
                                    @include('books.want_button', ['item' => $item])
                                    @include('books.read_button', ['item' => $item])
                                    <a href="{{ $item->url }}" target="_blank">{!! Form::button('<i class="fas fa-shopping-cart fa-2x"></i>', ['type' => 'submit', 'class' => 'btn btn-link text-success']) !!}</a>
                                @endif
                            </div>
                        </div>
                        </div>
                        @if (isset($item->count))
                            <div class="card-footer">
                                <p class="text-center">{{ $key+1 }}位:{{ $item->count}}people </p>
                            </div>
                        @endif
                    </div> 
                </div>
            </div>
        @endforeach
    </div>
@endif

