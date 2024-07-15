@extends('viewBootstrap')

@section('content')

<div class="container"> 
    <h1>Report Employees</h1>
    <br>
    @if(Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
    @endif  
    <a href="{{url('/newEmployee')}}" class="btn btn-success">New Employee</a>
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr class="table-light">
                <th scope="col">Picture</th>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Department</th>
                <th scope="col">Age</th>
                <th scope="col">Change</th>
            </tr>    
            @foreach ($infoRequest as $employee)
            <tr>
                <th scope="col"><img src="{{asset('files/'.$employee->img)}}" width="50" height="50"></th>
                <th scope="col">{{$employee->ide}}</th>
                <th scope="col">{{$employee->name}}</th>
                <th scope="col">{{$employee->department}}</th>
                <th scope="col">{{$employee->age}}</th>
                <th>
                    <a type="button" href="{{url('/editEmployee/'.$employee->ide)}}" class="btn btn-info">Edit</a>
                    @if ($employee->deleted_at)
                        <a type="button" href="{{url('/reactivateEmployee/'.$employee->ide)}}"  class="btn btn-warning">Reactivate</a>
                    @else
                        <a type="button" href="{{url('/deactivateEmployee/'.$employee->ide)}}"  class="btn btn-danger">deactivate</a>
                    @endif
                </th>
              </tr>
            @endforeach  

        </thead>    
</div>    
@stop