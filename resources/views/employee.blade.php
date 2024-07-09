<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>First View employee</title>
</head>
<body>
    <h1>Enterprise duckling .com </h1>
    <br>
    <!--First method to show a view :Name of the employee : <?php echo $name ?> <br> Days worked : <?php echo $days ?> <br> Salary : <?php echo $salary ?>
    -->
    <!--Second method to show a view using blade -->
    <h1>Welcome {{$name}}</h1>
    Name of the employee : {{ $name }} <br> Days worked : {{ $days }} <br> Salary : {{ $salary }}
    <br>
    @if($name=="Charly")
    <br>
    <img src="{{asset('pictures/Charly_Sheen.jpg')}}" weight="500" height="500"> 
    @endif 
    @if($name=="Margaery")
    <br>
    <img src="{{asset('pictures/Margaery_Tyrell.jpg')}}" weight="500" height="500"> 
    @else
    <br>
    <h1>No picture found</h1> 
    @endif
    <br>
    <a href="{{route('GoOut')}}">Go Out</a>
</body>
</html>