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
use App\Models\Setting;

class SettingsController extends Controller
{
    protected $guard = 'admin';

    public function GeneralSetting()
    {
        $setting = Setting::where('id',1)->first();
        return view('Admin.General.general-setting',compact('setting'));
    }

    public function SaveGeneralSetting(Request $request)
    {
        $data =  Request::except(array('_token')) ;        
        $inputs = Request::all();
        $rule=array(
            'siteName' => 'required',
            'SiteSupportNumber' => 'required',
            'siteEmail' => 'required',
            'SiteCopyRight' => 'required',
            'siteLogo' => 'mimes:png,jpg,jpeg|max:2048'                      		        	        
        );
        $validator = \Validator::make($data,$rule); 
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->messages());
        }

        $setting = Setting::where('id',1)->first();
        $setting->siteName = $inputs['siteName'];
        $setting->SiteSupportNumber = $inputs['SiteSupportNumber'];
        $setting->siteEmail = $inputs['siteEmail'];
        $setting->FacebookLink = $inputs['FacebookLink'];
        $setting->TwitterLink = $inputs['TwitterLink'];
        $setting->LinkedinLink = $inputs['LinkedinLink'];
        $setting->InstagramLink = $inputs['InstagramLink'];

        if(!empty($inputs['siteLogo'])):                     
            $file= $inputs['siteLogo'];
            if(!empty($setting->siteLogo)):
                if(File::exists(public_path('uploads/'.$setting->siteLogo))):
                    File::delete(public_path('uploads/'.$setting->siteLogo));
                endif;
            endif; 
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('uploads/'), 'logo_'.$filename);
            $setting->siteLogo = 'logo_'.$filename;
        endif;
        $setting->save();
        return redirect()->back()->with('success', 'Update successfully.');
    }

    public function AffiliateSetting()
    {
        $setting = Setting::where('id',1)->first();
        return view('Admin.General.affiliate-setting',compact('setting'));
    }

    public function SaveAffiliateSetting(Request $request)
    {
        $data =  Request::except(array('_token')) ;        
        $inputs = Request::all();
        $rule=array(
            'affiliate_comission_1_to_10' => 'required',
            'affiliate_comission_11_to_100' => 'required',
            'affiliate_comission_more_100' => 'required'                    		        	        
        );
        $validator = \Validator::make($data,$rule); 
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->messages());
        }

        $setting = Setting::where('id',1)->first();
        $setting->affiliate_comission_1_to_10 = $inputs['affiliate_comission_1_to_10'];
        $setting->affiliate_comission_11_to_100 = $inputs['affiliate_comission_11_to_100'];
        $setting->affiliate_comission_more_100 = $inputs['affiliate_comission_more_100'];
        $setting->save();
        return redirect()->back()->with('success', 'Update successfully.');
    }

}
