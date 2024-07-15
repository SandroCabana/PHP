@extends('viewBootstrap')
@section('content')
<div class="container">
<h1>Alta de empleado</h1>
<hr>
<form action = "{{route('saveEmployee')}}" method = "POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="well">
      <div class="form-group">
          <label for="dni">Clave empleado:
            <span class="text-danger">*</span>
            @if ($errors->first('ide'))
                <span class="text-danger">{{$errors->first('ide')}}</span>
            @endif
          </label>
          <input type="text" name="ide" id="ide" class="form-control" value="{{$newIdEmployee}}" placeholder="Clave empleado" readonly="readonly" tabindex="5">
      </div>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="name">name:
                        <span class="text-danger">*</span>
                        @if ($errors->first('name'))
                            <span class="text-danger">{{$errors->first('name')}}</span>
                        @endif
                    </label>
                <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" placeholder="name" tabindex="1">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="lastname">lastname:
                        <span class="text-danger">*</span>
                        @if ($errors->first('lastname'))
                            <span class="text-danger">{{$errors->first('lastname')}}</span>
                        @endif
                    </label>
                    <input type="text" name="lastname" id="lastname" class="form-control" value="{{old('lastname')}}" placeholder="lastname" tabindex="2">
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="email">Email:
                        <span class="text-danger">*</span>
                        @if ($errors->first('email'))
                            <span class="text-danger">{{$errors->first('email')}}</span>
                        @endif
                    </label>
                    <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}" placeholder="Email" tabindex="4">
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <label for="phone">phone:
                        <span class="text-danger">*</span>
                        @if ($errors->first('phone'))
                            <span class="text-danger">{{$errors->first('phone')}}</span>
                        @endif
                    </label>
                    <input type="text" name="phone" id="phone" class="form-control"  value="{{old('phone')}}" placeholder="phone" tabindex="3">
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <label for="dni">gender:</label>
                <div class="custom-control custom-radio">
                <input type="radio" id="gender1" name="gender"  value = "M" class="custom-control-input" checked="">
                <label class="custom-control-label" for="gender1">Masculino</label>
                </div>
                <div class="custom-control custom-radio">
                <input type="radio" id="gender2" name="gender" value = "F" class="custom-control-input">
                <label class="custom-control-label" for="gender2">Femenino</label>
                </div>


            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">

              <div class="form-group">
                <label for="dni">Departamento:</label>
                <select name = 'idd' class="custom-select">
                  <option selected="">Selecciona un departamento</option>
                  @foreach ($departments as $department)
                    <option value = "{{$department->idd}}"> {{$department->name}}</option>
                  @endforeach
                </select>
              </div>

            </div>
        </div>
        <div class="form-group">
            <label for="dni">Descripción:</label>
            <textarea name="description" id="description" class="form-control" tabindex="5">
            </textarea>
        </div>
        <div class="form-group">
            <label for="dni">Profile picture:</label>
            @if ($errors->first('img'))
            <span class="text-danger">{{$errors->first('img')}}</span>
            @endif
            <input type="file" name="img" id="img" class="form-control" tabindex="6"/>
            
            
        </div>
        <div class="row">
            <div class="col-xs-6 col-md-6"><input type="submit" value="Guardar" class="btn btn-danger btn-block btn-lg" tabindex="7"
                title="Guardar datos ingresados"></div>
        </div>
</form>
@stop
