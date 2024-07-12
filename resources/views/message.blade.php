@extends('viewBootstrap')

@section('content')

<div class="container"> 
    
<h1>Process {{$process}}</h1>
    <div class="alert alert-success">{{ $message }}</div>
<a><a href="{{url('/readEmployee')}}" class="btn btn-success">Back</a>    
</div>
@stop