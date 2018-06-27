            <!-- Button trigger modal -->
              <i class="fas fa-pencil-alt text-dark fa-2x" data-toggle="modal" data-target="#exampleModal"></i>
           
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @if (Auth::id() == $item->id)
                  {!! Form::open(['route' => 'reviews.store']) !!}
                  <div class="form-group">
                      <div class="modal-body">
                        {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                      </div>
                  </div>
                  {!! Form::close() !!}
                  @endif
                </div>
              </div>
            </div>
           