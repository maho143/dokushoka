


@foreach ($reviews as $review)
    <?php $user = $review->user; ?>
    <div class="reviews">
        <div class="card" style="padding: 20px; margin-bottom: 30px;">
            <div class="card-heading text-left">
                <div class="row">
                    <div class="col-4"><img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 80) }}" alt=""></div>
                    <div class="col-8">{!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!}<span class="text-muted">posted at {{ $review->created_at }}</span></div>  
                </div>
            </div>
            <div class="card-body">
                <p>{!! nl2br(e($review->content)) !!}</p>
                <div class="delete-button text-right">
                @if (Auth::id() == $review->user_id)
                    {!! Form::open(['route' => ['reviews.destroy', $review->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                @endif
                </div>
            </div>
        </div>
    </div>
    
    
@endforeach

{!! $reviews->render() !!}
