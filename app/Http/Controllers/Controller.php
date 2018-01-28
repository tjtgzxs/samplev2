<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
   public function home(){
       return view('static_pages/home');
   }

   public function help(){
       return view('static_pages/help');
   }

   public function about(){
       return view('static_pages/about');
   }
   public function store(Request $request){
       $this->validate($request,[
          'name'=>'required|max:50',
          'email'=>'required|email|unique:users|max:25',
          'password'=>'required|confirmed|min:6'
       ]);
       $user=User::create([
           'name'=>$request->name,
           'email'=>$request->email,
           'password'=>bcrypt($request->password)
       ]);
       session()->flash('success','欢迎，您将在这里开启一段新的旅程');
       return redirect()->route('users.show',[$user]);
   }
}
