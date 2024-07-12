@extends('viewBootstrap')

@section('content')

<div class="container"> 
<h1>Process {{$process}}</h1>
    <div class="alert alert-success">{{ $message }}</div>
</div>
@stop