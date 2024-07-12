@extends('viewBootstrap')

@section('content')

<div class="container"> 
    <h1>Report Employees</h1>
    <br>
    <a href="{{url('/newEmployee')}}" class="btn btn-primary">New Employee</a>
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr class="table-light">
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Department</th>
                <th scope="col">Age</th>
                <th scope="col">Change</th>
            </tr>    
            @foreach ($infoRequest as $employee)
            <tr>
                <th scope="col">{{$employee->ide}}</th>
                <th scope="col">{{$employee->name}}</th>
                <th scope="col">{{$employee->department}}</th>
                <th scope="col">{{$employee->age}}</th>
                <th>
                    <button type="button" class="btn btn-info">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </th>
              </tr>
            @endforeach  

        </thead>    
</div>    
@stop