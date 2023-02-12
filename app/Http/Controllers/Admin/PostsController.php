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
        $posts = Post::orderby('id','DESC')->paginate(10);       
        return view('Admin.Posts.posts-list',compact('posts'));
    }

    public function postAdd()
    {
        $categories = PostCategory::where('categoryStatus','publish')->orderBy('id','DESC')->get();
        return view('Admin.Posts.add-post',compact('categories'));
    }

    public function savePost(Request $request)
    {
        $data =  Request::except(array('_token')) ;        
        $inputs = Request::all();
        $rule=array(
            'title' => 'required|unique:posts',
            'description' => 'required'                      		        	        
        );
        $validator = \Validator::make($data,$rule); 
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->messages());
        } 

        $post = new Post;
        $post->title = $inputs['title'];
        $post->postSlug = Str::slug($inputs['title']);        
        $post->description = $inputs['description'];        
        $post->postStatus = $inputs['postStatus'];
        if(!empty($inputs['postImage'])):                     
            $file= $inputs['postImage'];
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('uploads/posts_images'), Str::slug($inputs['title']).'_'.$filename);
            $post->postImage = Str::slug($inputs['title']).'_'.$filename;
        endif;

        if(!empty($inputs['categories'])):
            $post->categories =  serialize($inputs['categories']);
        endif;
        $post->save();
        return redirect()->back()->with('success', 'Save successfully.');
    }

    public function editPost($postSlug)
    {
        $checkPost = Post::where('postSlug', $postSlug)->count();
        if($checkPost>0):
            $categories = PostCategory::where('categoryStatus','publish')->orderBy('id','DESC')->get();
            $postDetail = Post::where('postSlug', $postSlug)->first();
            return view('Admin.Posts.edit-post',compact('postDetail','categories'));
        else:
            return redirect('admin/posts');
        endif;
    }

    public function postUpdate(Request $request)
    {
        $data =  Request::except(array('_token')) ;        
        $inputs = Request::all();
        $checkPostID = Post::where('id',$inputs['id'])->count();
        if($checkPostID>0):
            $rule=array(
                'title' => 'required|unique:posts,id,'.$inputs['id'],
                'description' => 'required'                      		        	        
            );
            $validator = \Validator::make($data,$rule); 
            if ($validator->fails())
            {
                return redirect()->back()->withErrors($validator->messages());
            }
            $PostUpdate = Post::where('id',$inputs['id'])->first();
            $PostUpdate->title = $inputs['title'];
            $PostUpdate->postSlug = Str::slug($inputs['title']);        
            $PostUpdate->description = $inputs['description'];        
            $PostUpdate->postStatus = $inputs['postStatus'];
            if(!empty($inputs['postImage'])): 
                if(!empty($PostUpdate->postImage)):
                    if(File::exists(public_path('uploads/posts_images/'.$PostUpdate->postImage))):
                        File::delete(public_path('uploads/category_images/'.$PostUpdate->postImage));
                    endif;
                endif;                    
                $file= $inputs['postImage'];
                $filename= $file->getClientOriginalName();
                $file-> move(public_path('uploads/posts_images'), Str::slug($inputs['title']).'_'.$filename);
                $PostUpdate->postImage = Str::slug($inputs['title']).'_'.$filename;
            endif;
            $PostUpdate->save();
            return redirect()->back()->with('success', 'Update successfully.');

        else:
            return redirect('admin/posts');
        endif;
    }

    public function postsCategories()
    {
        $categories = PostCategory::orderBy('id','DESC')->paginate(10);        
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

    public function editPostsCategories($categorySlug)
    {
        $checkCategory = PostCategory::where('categorySlug', $categorySlug)->count();
        if($checkCategory>0):
            $category = PostCategory::where('categorySlug', $categorySlug)->first();
            return view('Admin.Posts.edit-post-categories',compact('category'));
        else:
            return redirect('admin/posts/categories');
        endif;
    }

    public function updatePostsCategories(Request $request)
    {
        $data =  Request::except(array('_token')) ;        
        $inputs = Request::all();
        $checkPostCategoryID = PostCategory::where('id',$inputs['id'])->count();
        if($checkPostCategoryID>0):
            $PostCategoryID = PostCategory::where('id',$inputs['id'])->first();
            $rule=array(
                'categoryName' => 'required|unique:post_categories,id,'.$inputs['id'],
                'categoryImage' => 'mimes:png,jpg,jpeg|max:2048'                      		        	        
            );
            $validator = \Validator::make($data,$rule); 
            if ($validator->fails())
            {
                return redirect()->back()->withErrors($validator->messages());
            }        
            $PostCategoryID->categoryName = $inputs['categoryName'];
            $PostCategoryID->categorySlug = Str::slug($inputs['categoryName']);        
            $PostCategoryID->CategoryDescription = $inputs['CategoryDescription'];        
            $PostCategoryID->categoryStatus = $inputs['categoryStatus'];
            if(!empty($inputs['categoryImage'])): 
                if(!empty($PostCategoryID->postImage)):
                    if(File::exists(public_path('uploads/posts_category/'.$PostCategoryID->categoryImage))):
                        File::delete(public_path('uploads/posts_category/'.$PostCategoryID->categoryImage));
                    endif;
                endif;                    
                $file= $inputs['categoryImage'];
                $filename= $file->getClientOriginalName();
                $file-> move(public_path('uploads/posts_category'), Str::slug($inputs['categoryName']).'_'.$filename);
                $PostCategoryID->categoryImage = Str::slug($inputs['categoryName']).'_'.$filename;
            endif;
            $PostCategoryID->save();
            return redirect()->back()->with('success', 'Update successfully.');
        else:
            return redirect('admin/posts/categories');
        endif;
    }
}
