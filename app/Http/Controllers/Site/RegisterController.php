<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PLan;

class RegisterController extends Controller
{
    public function index()
   	{
   		$plans = Plan::all();

   		return view('site.pages.register.plan', compact('plans'));
   }

   public function plan($url)
   {
   		if (!$plan = Plan::where('url', $url)->first()) {
    		return redirect()->back();
    	}	

    	session()->put('plan', $plan);

		return redirect()->route('register');
   }

    public function logout(){

        auth()->logout();
        return redirect()->route('home.index');
    }
}
