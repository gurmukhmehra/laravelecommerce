<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use File;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class IndexController extends Controller
{
    protected $guard = 'admin'; 

    public function index()
    {
        if (Auth::check()):            
            if(Auth()->user()->role=='admin'):
                return redirect('admin/dashboard');
            else :
                return redirect('/');
            endif;
        else :            
            return view('Admin.login');
        endif;
    }

    public function adminLogin(Request $request)
    {
        $data =  Request::except(array('_token')) ;        
        $inputs = Request::all();
        $rule=array(
            'EmailUsername' => 'required', 
            'password' => 'required'                      		        	        
        );
        $validator = \Validator::make($data,$rule); 
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->messages());
        } 

        if(Auth::attempt(['email' => $inputs['EmailUsername'], 'password' => $inputs['password']])) 
        {   
            return redirect('admin/dashboard');
        } elseif (Auth::attempt(['username' => $inputs['EmailUsername'], 'password' => $inputs['password']])) 
        {   
            return redirect('admin/dashboard');
        }
         else {
            return redirect('/admin')->withErrors('invalid detail. Please try again.');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    public function dashboard()
    {
        return view('Admin.dashboard');
    }
}
