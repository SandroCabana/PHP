@extends('viewBootstrap')
@section('content')

<div class="container">
    <h1>Login</h1>
    <hr>
    @if(Session::has('message'))
        <div class="alert alert-danger">{{Session::get('message')}}</div>
    @endif 
    <form method="POST" action="{{ route('validate') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email:
                <span class="text-danger">*</span>
                @if ($errors->first('email'))
                    <span class="text-danger">{{$errors->first('email')}}</span>
                @endif
            </label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Email" tabindex="1">
        </div>
        <div class="form-group">
            <label for="password">Password:
                <span class="text-danger">*</span>
                @if ($errors->first('password'))
                    <span class="text-danger">{{$errors->first('password')}}</span>
                @endif
            </label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" tabindex="2">
        </div>
        <div class="row">
            <div class="col-xs-6 col-md-6"><input type="submit" value="Login" class="btn btn-danger btn-block btn-lg" tabindex="3"
                title="Login"></div>
        </div>
    </form>
</div>
@stop
