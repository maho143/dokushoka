@if (Auth::user()->is_wanting($item->isbn) || Auth::user()->is_reading($item->isbn))
  {!! link_to_route('reviews.create', '<i class="fas fa-pencil-alt text-dark fa-2x"></i>', ['item_id' => $item->id],  ['class' => 'btn btn-block btn-primary']) !!}
@endif