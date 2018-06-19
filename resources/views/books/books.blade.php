@if ($items)
    <div class="row">
        @foreach ($items as $item)
            <div class="book">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <img src="{{ $item->image_url }}" alt="">
                        </div>
                        <div class="panel-body">
                            <p class="book-title"><a href="#">{{ $item->title }}</a></p>
                            <div class="buttons text-center">
                                @include('books.want_button', ['item' => $item])
                            </div>
                        </div>
                        <div class="panel-body">
                            <p class=""></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif