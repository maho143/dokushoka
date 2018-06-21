
@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
       <div class="card text-center">
            <div class="card-heading font-weight-bold h2 ">Signup</div>
            <div class="card-body">
                {!! Form::open(['route' => 'signup.post']) !!}
                    <div class="form-group">
                        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Email Address']) !!}
                    </div>

                    <div class="form-group">
                        
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Passward']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Passward']) !!}
                    </div>

                    <div class="text-center">
                        {!! Form::submit('Register', ['class' => 'btn btn-info w-100']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection