<?php

namespace App\Http\Controllers;

use File;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Request;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function signUp()
    {
        if(Auth::check() && Auth::User()->role=='customer'):
            return redirect('/shop');
        elseif(Auth::check() && Auth::User()->role=='admin'):
            return redirect('/admin/dashboard');
        else :
            return view('Frontend.sign-up');
        endif;
    }

    public function SaveSignUpfields(Request $request)
    {
        $data =  Request::except(array('_token')) ;        
        $inputs = Request::all();
        $rule=array(
            'name' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipCode' => 'required',
            'country'  => 'required',           
            'email' => 'required|unique:users',
            'password' => 'required'                                 		        	        
        );
        $validator = \Validator::make($data,$rule); 
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->messages());
        }

        $customer = new User;
        $customer->role = 'customer';
        $customer->name = $inputs['name'];
        $customer->mobile = $inputs['mobile'];
        $customer->address = $inputs['address'];
        $customer->city = $inputs['city'];
        $customer->state = $inputs['state'];
        $customer->zipCode = $inputs['zipCode'];
        $customer->country = $inputs['country'];
        $customer->email = $inputs['email'];
        $customer->password = Hash::make($inputs['password']);
        $customer->save();
        return redirect()->back()->with('success', 'Thanks for sign up.');
    }

    public function login()
    {
        if(Auth::check() && Auth::User()->role=='customer'):
            return redirect('/shop');
        elseif(Auth::check() && Auth::User()->role=='admin'):
            return redirect('/admin/dashboard');
        else :
            return view('Frontend.sign-in');
        endif;
    }

    public function loginRequest(Request $request)
    {
        $data =  Request::except(array('_token')) ;        
        $inputs = Request::all();
        $rule=array(           
            'email' => 'required',
            'password' => 'required'                                 		        	        
        );
        $validator = \Validator::make($data,$rule); 
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->messages());
        }

        $checkUserInfo = User::where('email',$inputs['email'])->count();
            if($checkUserInfo>0):
                if(Auth::attempt(['email' => $inputs['email'], 'password' => $inputs['password']])) 
            {   
                return redirect('/shop');
            } else {
                return redirect('/sign-in')->withErrors('invalid detail. Please try again.');
            }            
        else:
            return redirect('/sign-in')->withErrors('invalid detail. Please try again.');
        endif;
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function profile()
    {
        if(Auth::check() && Auth::User()->role=='customer'):            
            return view('Frontend.cumtomer-profile');
        elseif(Auth::check() && Auth::User()->role=='admin'):
            return redirect('/admin/dashboard');
        else :
            return redirect('/');
        endif;
    }

}
