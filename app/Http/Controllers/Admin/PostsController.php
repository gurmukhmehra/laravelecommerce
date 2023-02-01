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
use App\Models\Post;
use App\Models\PostCategory;

class PostsController extends Controller
{
    protected $guard = 'admin';

    public function posts()
    {
        $posts = Post::with('categories')->orderby('id','DESC')->paginate(10);       
        return view('Admin.Posts.posts-list',compact('posts'));
    }

    public function postAdd()
    {
        $categories = PostCategory::where('categoryStatus','publish')->orderBy('id','DESC')->get();
        return view('Admin.Posts.add-post',compact('categories'));
    }

    public function postsCategories()
    {
        $categories = PostCategory::where('categoryStatus','publish')->orderBy('id','DESC')->paginate(10); 
        return view('Admin.Posts.post-categories',compact('categories'));
    }

    public function AddPostsCategories()
    {
        return view('Admin.Posts.add-post-categories');
    }

    public function SavePostsCategories(Request $request)
    {
        $data =  Request::except(array('_token')) ;        
        $inputs = Request::all();
        $rule=array(
            'categoryName' => 'required|unique:post_categories',
            'categoryImage' => 'mimes:png,jpg,jpeg|max:2048'                      		        	        
        );
        $validator = \Validator::make($data,$rule); 
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->messages());
        }        
        $category = new PostCategory;
        $category->categoryName = $inputs['categoryName'];
        $category->categorySlug = Str::slug($inputs['categoryName']);        
        $category->CategoryDescription = $inputs['CategoryDescription'];        
        $category->categoryStatus = $inputs['categoryStatus'];
        if(!empty($inputs['categoryImage'])):                     
            $file= $inputs['categoryImage'];
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('uploads/posts_category'), Str::slug($inputs['categoryName']).'_'.$filename);
            $category->categoryImage = Str::slug($inputs['categoryName']).'_'.$filename;
        endif;
        $category->save();
        return redirect()->back()->with('success', 'Save successfully.');
    }
}
