<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
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
