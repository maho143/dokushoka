@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
       <div class="card text-center">
            <div class="card-heading font-weight-bold h2 ">Login</div>
            <div class="card-body">
                {!! Form::open(['route' => 'login.post']) !!}
                    <div class="form-group">
                        {!! form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Email Address']) !!}
                    </div>

                    <div class="form-group">
                        {!! form::password('password', ['class' => 'form-control',  'placeholder' => 'Passward']) !!}
                    </div>

                    <div class="text-center">
                        {!! form::submit('Login', ['class' => 'btn btn-info w-100']) !!}
                    </div>
                {!! form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection