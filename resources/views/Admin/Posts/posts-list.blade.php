@extends('Admin.app')
@section('content')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Posts List</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('admin/dashboard')}}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item">Posts List</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">                
                <span class="d-block m-t-5">
                    <a href="{{URL::to('admin/post/add')}}" class="btn btn-info"><i class="feather icon-plus"></i> Add Post</a>
                </span>
            </div>
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Decription</th>
                                <th class="text-center">Categories</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach($posts as $post)
                                @php 
                                    $PostsCategory = unserialize($post->categories);
                                    $getCats = DB::table('post_categories')->whereIn('id',$PostsCategory)->pluck('categoryName')->toArray();
                                    $catNames = implode(', ', $getCats);
                                @endphp
                                <tr>
                                    <td class="text-center">{{$i}}</td>
                                    <td class="text-center">
                                        @if(!empty($post->postImage))                                        
                                            <img src="{{ URL::asset('uploads/posts_images/'.$post->postImage) }}" style="width: 50px;border-radius: 13px;" />
                                        @else 
                                         <img src="{{ URL::asset('uploads/No_Image_Available.jpg')}}" style="width: 50px;border-radius: 13px;"/>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{$post->title}}                                        
                                    </td>
                                    <td class="text-center">                                                                               
                                        {!! Str::limit($post->description, 50) !!}                                   
                                    </td>                                 
                                    <td class="text-center">{{$catNames}}</td>
                                    @if($post->postStatus=='publish')
                                        <td class="text-success">Publish</td>
                                    @else
                                        <td class="text-danger">Draft</td>
                                    @endif
                                    <td class="text-center">
                                        <a href="{{ url('admin/post/edit/'.$post->postSlug) }}" class="btn btn-success"><i class="feather mr-2 icon-edit"></i> Edit</a>
                                    </td>
                                </tr>
                                @php $i++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if(count($posts)>0)
                    <div class="justify-content-center">                    
                        {!! $posts->withQueryString()->links('pagination::bootstrap-5') !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection('content')