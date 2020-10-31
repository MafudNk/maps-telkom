<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
Use Session;
use App\odp;
use App\user;

class MyController extends Controller
{

 	public function check(){
 	 	if(Auth::check() ){
	 	 	return redirect('/dashboard');
	 	}else{
 			return redirect('/login');
	 	}
 		
 	}

 	public function dashboard(){
 			if (Auth::user()->status == 'admin') {
 				return view('dashboard');
 			}else{
 				return redirect('map');
 			}
 			
 	}

 	public function login(){
 		return view('login');
 	}

 	public function dologin(Request $request){
 		

 		$this->validate($request,[
 			'username' => 'required',
 			'password' => 'required|string'
 		]);


 		if (Auth::attempt(["username" => $request->username, "password" => $request->password]) ) {
 			return redirect('/');
 			# code...
 		}else{
 			Session::flash('flash_notification',[
 				"level" 	=> "danger",
 				"message" 	=> "Username atau Password salah"
 				]);
 			return redirect('/login');
 		}
 	}

 	public function logout(){
 		Auth::logout();
 		return redirect('/login');
 	}

 	// public function map(){
 	// 	$odp = odp::all('latitude', 'longitude','sto');
 	// 	return view('cba_map', compact('odp'));
 	// }

 	
}

