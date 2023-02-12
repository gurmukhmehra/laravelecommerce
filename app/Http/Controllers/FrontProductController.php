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
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\MaintenanceAddon;
use App\Models\Feature;
use Session;

class FrontProductController extends Controller
{
    public function singleProduct($ProductSlug)
    {
        $checkProduct = Product::where('ProductSlug',$ProductSlug)->count();
        if($checkProduct>0):
            $productDetail = Product::with('category')->where('ProductSlug',$ProductSlug)->first();
            $MaintenanceAddon = MaintenanceAddon::orderBy('id','ASC')->get();
            $cartdata=Session::get('cart');
            $Features = Feature::orderBy('id','ASC')->get();
            return view('Frontend.product-detail',compact('productDetail','MaintenanceAddon','Features','cartdata'));
        else:
            return redirect('/shop');
        endif;
    }

    public function addtocart(Request $request)
    {
        $data =  Request::except(array('_token')) ;        
        $inputs = Request::all();
        Session::push('cart',$inputs);        
        return redirect()->back()->with('AddToCartSuccess', 'Product Add To Cart Successfully');
    }

    public function RemoveCartItem($cartProductID)
    {       
        $array=array();
        $newarray=array();
        $array=Session::get('cart');

        foreach($array as $key => $item):
            if($cartProductID==$item['productID']):
                $idx = $key;
            endif;
        endforeach;

        unset($array[$idx]);

        $newarray = $array;
        Session::forget("'".$cartProductID."'");
        Session::forget('cart');
        foreach($newarray as $newarray1)
        {
            Session::push('cart',$newarray1);
        }        
        $cartdata=Session::get('cart');
        return view('Frontend.ajax-cart-load',compact('cartdata'));
    }

    public function cartPage()
    {
        $cartdata=Session::get('cart');
        return view('Frontend.cart-page',compact('cartdata'));
    }

    public function RemoveItemCartPage($CartItemProductID)
    {
        $array=array();
        $newarray=array();
        $array=Session::get('cart');        
        foreach($array as $key => $item):
            if($CartItemProductID==$item['productID']):
                $idx = $key;
            endif;
        endforeach;

        unset($array[$idx]);

        $newarray = $array;
        Session::forget("'".$CartItemProductID."'");
        Session::forget('cart');
        foreach($newarray as $newarray1)
        {
            Session::push('cart',$newarray1);
        }        
        $cartdata=Session::get('cart');
        
        return view('Frontend.remove-cart-page-item',compact('cartdata'));
    }

    public function checkout()
    {
        $cartdata=Session::get('cart');        
        return view('Frontend.checkout-page',compact('cartdata'));
    }
}
