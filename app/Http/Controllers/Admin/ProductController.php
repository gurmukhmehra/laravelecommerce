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
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\MaintenanceAddon;
use App\Models\Feature;


class ProductController extends Controller
{
    protected $guard = 'admin'; 

    public function productList()
    {
        $productList = Product::with('category')->orderby('id','DESC')->paginate(10);       
        return view('Admin.Product.product-list',compact('productList'));
    }

    public function addProduct()
    {
        $categories = ProductCategory::where('categoryStatus','publish')->orderBy('id','DESC')->get();
        return view('Admin.Product.add-product',compact('categories'));
    }

    public function SaveProduct(Request $request)
    {
        $data =  Request::except(array('_token')) ;        
        $inputs = Request::all();
        $rule=array(
            'ProductName' => 'required|unique:products',
            'product_price' => 'required',
            'description' => 'required',
            'productImage' => 'mimes:png,jpg,jpeg|max:2048'                      		        	        
        );
        $validator = \Validator::make($data,$rule); 
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator->messages());
        }

        if($inputs['product_sale_price'] >= $inputs['product_price']):
            return redirect()->back()->withErrors('Please enter sale price less then price.');
        endif;

        $product = new Product;
        $product->ProductName = $inputs['ProductName'];
        $product->ProductSlug = Str::slug($inputs['ProductName']);        
        $product->quantity = 1;
        $product->product_price = $inputs['product_price'];
        $product->product_sale_price = $inputs['product_sale_price'];
        $product->productCategory = $inputs['productCategory'];
        $product->description = $inputs['description'];
        $product->productStatus = $inputs['productStatus'];

        $product->demo_link = $inputs['demo_link'];
        $product->play_store_url = $inputs['play_store_url'];
        $product->play_username = $inputs['play_username'];
        $product->play_password = $inputs['play_password'];

        if(!empty($inputs['productImage'])):                     
            $file= $inputs['productImage'];
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('uploads/product_images'), Str::slug($inputs['ProductName']).'_'.$filename);
            $product->productImage = Str::slug($inputs['ProductName']).'_'.$filename;
        endif;
        $product->save();
        return redirect()->back()->with('success', 'Save successfully.');
    }

    public function editProduct($ProductSlug)
    {
        $checkProduct = Product::where('ProductSlug',$ProductSlug)->count();
        if($checkProduct>0):
            $categories = ProductCategory::where('categoryStatus','publish')->orderBy('id','DESC')->get();
            $productDetail = Product::where('ProductSlug',$ProductSlug)->first();
            return view('Admin.Product.edit-product',compact('productDetail','categories'));
        else:
            return redirect('admin/product-list');
        endif;
    }

    public function updateProduct(Request $request)
    {
        $data =  Request::except(array('_token')) ;        
        $inputs = Request::all();
        $checkproduct = Product::where('id',$inputs['id'])->count();
        if($checkproduct>0):
            $rule=array(
                'ProductName' => 'required|unique:products,id,'.$inputs['id'],
                'product_price' => 'required',
                'description' => 'required',
                'productImage' => 'mimes:png,jpg,jpeg|max:2048'                      		        	        
            );
            $validator = \Validator::make($data,$rule); 
            if($validator->fails())
            {
                return redirect()->back()->withErrors($validator->messages());
            }                
            $product = Product::where('id',$inputs['id'])->first();
            $product->ProductName = $inputs['ProductName'];
            $product->ProductSlug = Str::slug($inputs['ProductName']);
            $product->product_price = $inputs['product_price'];
            $product->product_sale_price = $inputs['product_sale_price'];
            $product->productCategory = $inputs['productCategory'];
            $product->description = $inputs['description'];
            $product->productStatus = $inputs['productStatus'];

            $product->demo_link = $inputs['demo_link'];
            $product->play_store_url = $inputs['play_store_url'];
            $product->play_username = $inputs['play_username'];
            $product->play_password = $inputs['play_password'];

            if(!empty($inputs['productImage'])):                     
                $file= $inputs['productImage'];
                if(!empty($product->ProductSlug)):
                    if(File::exists(public_path('uploads/product_images/'.$product->ProductSlug))):
                        File::delete(public_path('uploads/product_images/'.$product->ProductSlug));
                    endif;
                endif; 
                $filename= $file->getClientOriginalName();
                $file-> move(public_path('uploads/product_images'), Str::slug($inputs['ProductName']).'_'.$filename);
                $product->productImage = Str::slug($inputs['ProductName']).'_'.$filename;
            endif;
            $product->save();
            return redirect()->back()->with('success', 'Update successfully.');
        else:
            return redirect('admin/product-list');
        endif;
    }

    public function categoriesList()
    {
        $categoryList = ProductCategory::with('ProductByCategory')->orderBy('id','DESC')->paginate(10);        
        return view('Admin.Product.categories-list',compact('categoryList'));
    }

    public function addCategory()
    {
        return view('Admin.Product.add-category');
    }

    public function saveCategory(Request $request)
    {
        $data =  Request::except(array('_token')) ;        
        $inputs = Request::all();
        $rule=array(
            'categoryName' => 'required|unique:product_categories',
            'categoryImage' => 'mimes:png,jpg,jpeg|max:2048'                      		        	        
        );
        $validator = \Validator::make($data,$rule); 
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->messages());
        }        
        $category = new ProductCategory;
        $category->categoryName = $inputs['categoryName'];
        $category->categorySlug = Str::slug($inputs['categoryName']);        
        $category->CategoryDescription = $inputs['CategoryDescription'];        
        $category->categoryStatus = $inputs['categoryStatus'];
        if(!empty($inputs['categoryImage'])):                     
            $file= $inputs['categoryImage'];
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('uploads/category_images'), Str::slug($inputs['categoryName']).'_'.$filename);
            $category->categoryImage = Str::slug($inputs['categoryName']).'_'.$filename;
        endif;
        $category->save();
        return redirect()->back()->with('success', 'Save successfully.');
    }

    public function editCategory($categorySlug)
    {
        $checkCategory = ProductCategory::where('categorySlug',$categorySlug)->count();
        if($checkCategory>0):
            $categoryDetail = ProductCategory::where('categorySlug',$categorySlug)->first();
            return view('Admin.Product.edit-category',compact('categoryDetail'));
        else:
            return redirect('admin/categories-list');
        endif;
    }

    public function updateCategory(Request $request)
    {
        $data =  Request::except(array('_token')) ;        
        $inputs = Request::all();
        $checkCategory = ProductCategory::where('id',$inputs['id'])->count();
        if($checkCategory>0):
            $rule=array(
                'categoryName' => 'required|unique:product_categories,id,'.$inputs['id'],
                'categoryImage' => 'mimes:png,jpg,jpeg|max:2048'                      		        	        
            );
            $validator = \Validator::make($data,$rule); 
            if ($validator->fails())
            {
                return redirect()->back()->withErrors($validator->messages());
            }     
            $category = ProductCategory::where('id',$inputs['id'])->first();
            $category->categoryName = $inputs['categoryName'];
            $category->categorySlug = Str::slug($inputs['categoryName']);        
            $category->CategoryDescription = $inputs['CategoryDescription'];        
            $category->categoryStatus = $inputs['categoryStatus'];
            if(!empty($inputs['categoryImage'])): 
                if(!empty($category->categoryImage)):
                    if(File::exists(public_path('uploads/category_images/'.$category->categoryImage))):
                        File::delete(public_path('uploads/category_images/'.$category->categoryImage));
                    endif;
                endif;                   
                $file= $inputs['categoryImage'];
                $filename= $file->getClientOriginalName();
                $file-> move(public_path('uploads/category_images'), Str::slug($inputs['categoryName']).'_'.$filename);
                $category->categoryImage = Str::slug($inputs['categoryName']).'_'.$filename;
            endif;
            $category->save();
            return redirect()->back()->with('success', 'Update successfully.');
        else:
            return redirect('admin/categories-list');
        endif;        
    }

    public function MaintenanceAddon()
    {
        $maintenanceAddons = MaintenanceAddon::with('ProductMaintenanceAddon')->orderBy('id','DESC')->paginate(10);
        return view('Admin.Maintenance_addon.maintenance-addon',compact('maintenanceAddons'));
    }

    public function AddMaintenanceAddon()
    {
        return view('Admin.Maintenance_addon.add-maintenance-addon');
    }

    public function SaveMaintenanceAddon(Request $request)
    {
        $data =  Request::except(array('_token')) ;        
        $inputs = Request::all();
        $rule=array(
            'maintenance_addon' => 'required|unique:maintenance_addons',
            'addon_price' => 'required'                      		        	        
        );
        $validator = \Validator::make($data,$rule); 
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->messages());
        }

        $MaintenanceAddon = new MaintenanceAddon;
        $MaintenanceAddon->maintenance_addon = $inputs['maintenance_addon'];
        $MaintenanceAddon->addon_price = $inputs['addon_price'];
        $MaintenanceAddon->save();
        return redirect()->back()->with('success', 'Update successfully.');

    }

    public function featuresList()
    {
        $featuresList = Feature::orderby('id','DESC')->paginate(10);
        return view('Admin.Features.product-features',compact('featuresList'));
    }

    public function AddFeatures()
    {
        return view('Admin.Features.add-product-features');
    }

    public function SaveFeatures(Request $request)
    {
        $data =  Request::except(array('_token')) ;        
        $inputs = Request::all();
        $rule=array(
            'featureName' => 'required|unique:features',
            'featurePrice' => 'required'                      		        	        
        );
        $validator = \Validator::make($data,$rule); 
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->messages());
        }

        $feature = new Feature;
        $feature->featureName = $inputs['featureName'];
        $feature->featurePrice = $inputs['featurePrice'];
        $feature->save();
        return redirect()->back()->with('success', 'Update successfully.');
    }

}
