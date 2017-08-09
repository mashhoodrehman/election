<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate;
use App\Voter;
use App\User;
use carbon\carbon;
use Redirect;
use Toastr;
use Alert;
use Auth;
class AdminController extends Controller
{
	 public function index()
	{
		if (Auth::user()) {
			if (Auth::user()->role == "admin") 
			{
				return redirect('/admin/dashboard');
			}
			else
			{
				return redirect('/');
			}		
		}
		else{
				return view('Admin.login');
		}

		
	}
	public function dashboard()
	{		
	        $count["voters"] = Voter::count();
	        $count["candidates"] = Candidate::count();
	        $count["students"] = User::where('role','=','student')->count();
	        $count["parents"] = User::where('role','=','parent')->count();
        
        	return view('Admin.dashboard',$count);		
	}

	public function sendCode(Request $request){

		$user = User::find($request->id);
            $num = $request->num;
            if($user->num==$num){
            	Auth::login($user);
            	return redirect('/admin/dashboard');
            }
            else{
            	return redirect('/login');
            }
		
	}
}
