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

class FrontController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->where('productStatus','publish')
                            ->orderBy('id','DESC')->take(6)->get();
        return view('Frontend.index',compact('products'));
    }

    public function aboutUs()
    {
        return view('Frontend.about-us');
    }

    public function shop()
    {
        $products = Product::with('category')->where('productStatus','publish')
                            ->orderBy('id','DESC')->paginate(20);
        $categoryList = ProductCategory::with('ProductByCategory')->orderBy('id','DESC')->get();
        return view('Frontend.shop',compact('products','categoryList'));
    }

    public function affiliate()
    {
        return view('Frontend.affiliate');
    }

    public function blogs()
    {
        return view('Frontend.blogs');
    }

    public function contactUs()
    {
        return view('Frontend.contact-us');
    }

    public function termAndCondination()
    {
        return view('Frontend.term-and-condination');
    }

    public function privacyPolicy()
    {
        return view('Frontend.privacy-policy');
    }

}
