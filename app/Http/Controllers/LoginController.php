<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
class LoginController extends Controller
{
    public function login(){
        return view('login');
    }
    
    public function loginPost(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $usersRequest=users::where('user',$request->email)
        ->where('active','Si')
        ->get();
        $numUsers=count($usersRequest);
        if($numUsers==1 and Hash::check($request->password, $usersRequest[0]->password)){
            return redirect('/readEmployee');
        }
        else{
            Session::flash('message', 'User or password incorrect');
            return redirect('/login');
        }
        
        
       
    }
}
