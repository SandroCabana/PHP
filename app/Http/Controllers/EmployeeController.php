<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employees;
use App\Models\department;

class EmployeeController extends Controller
{

    public function readEmployee(){
        $infoRequest = employees::join('departments', 'employees.idd', '=', 'departments.idd')
            ->select('employees.ide', 'employees.name','employees.lastname' , 'departments.name as department', 'employees.age')
            ->get();
        return view('readEmployee', compact('infoRequest'));
    }

    public function createDepartment()
    {
        $department = new department;
        $department->idd = 8;
        $department->name = "IOT";
        $department->save();
        return $department;
    }
    public function eloquent()
    {
        /*||=||=||=||=||single and multiple sources eloquent||=||=||=||=||*/
        $infoRequest = employees::all();

        $infoRequest = employees::where('gender', 'M')->get();

        $infoRequest = employees::where('age', '>=', 20)
            ->where('age', '<=', 30)
            ->get();

        $infoRequest = employees::whereBetween('age', [20, 25])->get();

        $infoRequest = employees::whereIn('ide', [3, 4, 5])->get();

        $infoRequest = employees::select(['name', 'lastname', 'age'])
            ->where('age', '>=', 30)
            ->get();
        $infoRequest = employees::select(['name', 'lastname', 'age'])
            ->where('lastname', 'LIKE', '%oe%')
            ->get();
        $infoRequest = employees::where('gender', 'F')->sum('salary');
        $infoRequest = employees::groupBY('gender')
            ->selectRaw('gender,sum(salary) as total')
            ->get();
        /*
        SQL="SELECT e.ide, e.name, d.name as department,e.age i 
        FROM employees AS e
        INNER JOIN department AS d ON e.idd=d.idd
        WHERE e.age>=30 AND e.age<=30"
        */
        $infoRequest = employees::join('department', 'employees.idd', '=', 'department.idd')
            ->select('employees.ide', 'employees.name', 'department.name as department', 'employees.age')
            ->where('employees.age', '>=', 30)
            ->get();
        return $infoRequest;
        /*||=||=||=||=||||=||=||=||=||||=||=||=||=||||=||=||=||=||=||=||=*/
    }
    public function getLastEmployee()
    {
        $requestEmployee = employees::orderBy('ide', 'DESC')
            ->take(1)
            ->get();
        return $requestEmployee;
    }
    public function newIdEmployee()
    {
        $lastIdEmployee = $this->getLastEmployee();
        /*  if($lastIdEmployee->isEmpty()){
            $newIdEmployee=1;
        }
        else{
            $newIdEmployee=$lastIdEmployee[0]->ide+1;
        }
        return $newIdEmployee;*/
        return $lastIdEmployee->isEmpty() ? 1 : $lastIdEmployee[0]->ide + 1;
    }
    public function getDepartments()
    {
        $departments = department::orderBy('name', 'DESC')->get();
        return $departments;
    }

    public function newEmployee()
    {
        $newIdEmployee = $this->newIdEmployee();
        $departments = $this->getDepartments();
        return view('newEmployee', compact('newIdEmployee', 'departments'));
    }

    public function saveEmployee(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|regex:/^[a-z,A-Z,á,é,í,ó,ü\s]+$/|min:5|max:15',
            'lastname' => 'required|regex:/^[a-z,A-Z,á,é,í,ó,ü\s]+$/|min:5|max:15',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9]*)$/|min:9|max:9',
        ]);
        $employees = new employees;
        $employees->ide = $request->ide;
        $employees->name = $request->name;
        $employees->lastname = $request->lastname;
        $employees->email = $request->email;
        $employees->phone = $request->phone;
        $employees->gender = $request->gender;
        $employees->salary = 0;
        $employees->age = '50';
        $employees->description = $request->description;
        $employees->idd = $request->idd;
        $employees->save();
        return view('message')->with('process', 'The employee has been saved')
            ->with('message', "the employee $request->name $request->lastname has been saved");
    }
    public function VB()
    {
        return view('viewBootstrap');
    }
    public function goOut()
    {
        return "GoOut";
    }
    public function sendMessage($name, $days)
    {
        $pay = 100;
        $salary = $pay * $days;
        /*First Method to send values to the view whit compact
        return view('employee',compact('name','days'));*/

        /*Second Method to send values to the view whit array
        return view('employee',['name'=>$name,'days'=>$days]);*/
        /*Third Method to send values to the view whit with*/
        return view('employee')
            ->with('name', $name)
            ->with('days', $days)
            ->with('salary', $salary);
    }
    public function message()
    {
        return "Hello worker";
    }
    public function salary()
    {
        $day = 7;
        $pay = 600;
        $salary = $pay * $day;
        return "The pay of the employee is : $salary which has been worked $day days";
    }
    public function wage($day, $pay)
    {

        $salary = $pay * $day;
        dd($salary, $pay, $day);
        return "The pay is $salary for has been worker $day days";
    }
    //
}

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