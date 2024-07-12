<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('message',[EmployeeController::class,'message']);
Route::get('payController',[EmployeeController::class,'salary']);
Route::get('wage/{day}/{pay}',[EmployeeController::class,'wage']);

Route::get('sendMessage/{name}/{days}',[EmployeeController::class,'sendMessage']);

Route::get('GoOut',[EmployeeController::class,'GoOut'])->name('GoOut');
Route::get('VB',[EmployeeController::class,'VB'])->name('VB');
Route::get('view1',[EmployeeController::class,'view1'])->name('view1');
Route::get('view2',[EmployeeController::class,'view2'])->name('view2');
Route::get('newEmployee',[EmployeeController::class,'newEmployee'])->name('newEmployee');
Route::post('saveEmployee',[EmployeeController::class,'saveEmployee'])->name('saveEmployee');

Route::get('eloquent',[EmployeeController::class,'eloquent'])->name('eloquent');
Route::get('createDepartment',[EmployeeController::class,'createDepartment'])->name('createDepartment');
Route::get('/', function () {
    return view('welcome');


});

Route::get('/ruta1', function () {
    return "hola mundo";
    
});
Route::get('/arearectangulo', function () {
    $base=4;
    $height=3;
    $area=$base*$height;
    return  "el area del rectangulo es :$area con una base de : $height y de base $base";
    
});
Route::get('/arearectangulo2', function () {
    $base=4;
    $height=3;
    $area=$base*$height;
    return  "el area del rectangulo es :$area con una base de : $height y de base $base";
    
});
Route::get('/arearectangulo3/{base}/{height}', function ($base,$height) {
    $area=$base*$height;
    return  "el area del rectangulo es :".$area." con una base de :". $height." y de base ".$base;
    
});
Route::get('/salary/{days_worked}/{daily_pay?}', function ($days_worked,$daily_pay=null) {
    
    if ($daily_pay==null){
        $daily_pay=100;
        $salary=$days_worked*$daily_pay;
    }

    else{
        $salary=$days_worked*$daily_pay;
    }
       
    echo "days has been worked $days_worked";
    echo "<br> Your dayly pay is :".$daily_pay;
    echo"<br> your salary is ".$salary;

});
Route::get('/redirect', function () {
    return redirect('ruta1');

});
Route::redirect('redirect2','ruta1');
Route::redirect('redirect3','arearectangulo3/4/7');

Route::get('/redirect4/{base}/{altura}', function ($base,$height) {
    return redirect("/arearectangulo3/$base/$height");

});
Route::redirect('redirect5','https://apselom.com');

