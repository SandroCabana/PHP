<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employees;
use App\Models\department;
class EmployeeController extends Controller
{
    public function createDepartment(){
        $department= new department;
        $department->idd=8;
        $department->name="IOT";
        $department->save();
        return $department;
    }
    public function eloquent(){
        $employees=employees::all();
        return $employees;

        /*$employees= new employees;
        $employees->ide="1";
        $employees->name="John";
        $employees->lastname="Doe";
        $employees->email="johndoe@me.com";
        $employees->phone="123456789";
        $employees->gender="M";
        $employees->idd=1;
        $employees->save();
        return $employees;*/
      /* $employees=employees::create([
            'ide'=>'1','name'=>'juan','lastname'=>'Diaz','email'=>'juanDiaz@me.com',
            'phone'=>'123456789','gender'=>'M','description'=>'Software Developer','idd'=>1
        ]);
        return "saved";*/
        /*$employees=employees::find(1);
        $employees->name="pedro";
        $employees->lastname="smith";
        $employees->save();
        return "modified";*/
        /*employees::where('gender','M')->update(['name'=>'carlos']);
        return "updated with gender";*/
        /*employees::destroy(1);
        return "deleted";*/
        /*$employees=employees::find(1);
        $employees->delete();
        return "deleted";
        */
        /*$employees=employees::where('gender','M')
        ->where('phone','123456789')
        ->delete();
        return "deleted with gender and phone";*/
        //$test=employees::all();
        //return $test;
        /*$employees=employees::find(1)->forceDelete();
        return $employees;
        */
        /*employees::withTrashed()->where('ide','1')->restore();
        return "restored";*/
        /*$employees=employees::withTrashed()->get();
        return $employees;*/
        
    }
    public function newEmployee(){
        return view('newEmployee');
    }
    public function saveEmployee(Request $request){
        $this->validate($request,[
            'ide'=>'required|regex:/^[E][M][P][-][0-9]{5}$/',
            'name'=>'required|regex:/^[a-z,A-Z,á,é,í,ó,ü\s]+$/|min:5|max:15',
            'lastname'=>'required|min:2',
            'email'=>'required|email',
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:9',

        ]);
        echo "The data has been saved";
        //return $request;
        //dd($request);
        //return view('view2');
    }
    public function VB(){
        return view('viewBootstrap');
    }
    public function goOut(){ 
        return "GoOut";
    }
    public function sendMessage($name,$days){
        $pay=100;
        $salary=$pay*$days;
        /*First Method to send values to the view whit compact
        return view('employee',compact('name','days'));*/

        /*Second Method to send values to the view whit array
        return view('employee',['name'=>$name,'days'=>$days]);*/
        /*Third Method to send values to the view whit with*/
        return view('employee')
        ->with('name',$name)
        ->with('days',$days)
        ->with('salary',$salary);

    }
    public function message(){
        return "Hello worker";
    }
    public function salary(){
        $day=7;
        $pay=600;
        $salary=$pay*$day;
        return "The pay of the employee is : $salary which has been worked $day days";

    }
    public function wage($day,$pay){
        
        $salary=$pay*$day;
        dd($salary,$pay,$day);
        return "The pay is $salary for has been worker $day days";
    }
    //
}
