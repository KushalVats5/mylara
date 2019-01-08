<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use App\Category;
use App\CategoryPost;
use App\User;
use App\Post;
Use Redirect;
use Helper;
use Session;
use DB;
use File;

class PostController extends Controller
{
	/**
    * Display all post
    */
    public function index()
    {
        // $posts = Post::paginate(10);
        $posts = Post::where('post_type', '!=', 'page')->paginate(10);
        // return view('admin/posts',compact('posts',$posts));
        return view('master/posts',compact('posts',$posts));
    }

    /**
    * Display only pages
    */
    public function pages()
    {
        // $posts = Post::paginate(10);
        $posts = Post::where('post_type', '=', 'page')->paginate(10);
        // return view('admin/posts',compact('posts',$posts));
        return view('master/posts',compact('posts',$posts));
    }

    /**
    * Show create post view
    */
    public function create($id=false)
    {	
      $type = request()->segment(4);
      $postCats       = CategoryPost::where('post_id',$id)->get();
      // $postCats = Category::find(1);
      $postCats       = json_decode($postCats);
      // dd($postCats);
      $categories     = Category::where('parent_id', '=', 0)->get();
      $allCategories  = Category::pluck('title','id')->all();

    	if($id){
			$postData = Post::where('id', $id)
					    ->where('post_type', $type)
					    ->get()->first();
			if( !empty($postData) ){
        $metaTags     = Helper::get_post_meta($id,'_meta_tags');
        $post_slider  = Helper::get_post_meta( $id, '_post_slider');
        $metaTags     = unserialize($metaTags);
        $post_slider  = unserialize($post_slider);
        $description  = $metaTags['description'];
        $keywords     = $metaTags['keywords'];
			}else{
				$description 	= false;
				$keywords 		= false;
			}

    		$data = array(
    					'type' 			   => $type, 
    					'id' 			     => $id,
    					'postData' 		 => $postData, 
    					'description'  => $description, 
              'keywords'     => $keywords,
    					'post_slider'  => $post_slider
    					);
    	}else{
    		$data = array(
    					'type' 			   => $type, 
    					'id' 			     => $id,
    					'postData' 	   => false, 
    					'description'  => false,
    					'keywords' 	   => false
    					);
    	}
      // return view('admin/add-post')->with('data', $data);
    	// return view('master/add-post')->with('data', $data);
      // return view('master/add-post', ['data' => $data, 'categories' => $allCategories, 'postCats'=>$postCats]);
      return view('master/add-post', compact('data','categories','allCategories', 'postCats'));
    }

    /**
    * Save post
    */    
    public function store(Request $request) {
    	$rules = [
          'title'     => 'required',
          'featured_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      	];

      	$customMessages = [
          'title.required'      => 'Title field is required.',
      	];
      	$validator = Validator::make($request->all(), $rules, $customMessages);
      	if ($validator->fails()) {
          // send back to the page with the input data and errors
       		return redirect()->back()->withInput()->withErrors($validator);
      	}
      	// Create slug.
      	$slug = Helper::createSlug($request->title);
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $featured_image = Helper::upload_featured_image( $image);
          }else{
            $featured_image = null;
        }

        

        $post = Post::create([
          'title' 			   => $request->title,
          'slug'           => $slug,          
          'user_id'        => Auth::user()->id,          
          'post_type' 		 => $request->post_type,
          'featured_image' => $featured_image,
          'content' 		   => htmlspecialchars($request->content),
          'excerpt'			   => htmlspecialchars($request->excerpt),
        ]);
        // dd($request->category);
        // dd($post);
        $post->categories()->attach($request->category);

        $metaTags = array('keywords' => $request->keywords, 'description' => $request->description);

        Helper::add_post_meta( $post->id, '_meta_tags',  serialize($metaTags)); 

        if($request->hasFile('uploadFile')){
        $sliders = array();
        foreach ($request->file('uploadFile') as $key => $value) {
            $imageName = time(). $key . '.' . $value->getClientOriginalExtension();
            $sliders[] = $imageName;
            $value->move(public_path('images/sliders'), $imageName);
        }
        Helper::add_post_meta( $post->id, '_post_slider',  serialize($sliders));
		}
        return redirect()->back()->with('success', 'Record successfully added!');
    }

    /**
    * Update post
    */    
    public function update(Request $request, $id) {
    	$rules = [
          'title'     => 'required',
      	];

      	$customMessages = [
          'title.required'      => 'Title field is required.',
      	];
        
       
      	$validator = Validator::make($request->all(), $rules, $customMessages);
      	if ($validator->fails()) {
          // send back to the page with the input data and errors
       		return redirect()->back()->withInput()->withErrors($validator);
      	}

      	 // Get avatar from database 
		    if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $featured_image = Helper::upload_featured_image( $image);
          }else{
          	$featured_image = Post::where('id', $id)->first()->featured_image;
            // $featured_image = $avatar;
        }

      	Post::where('id',$id)->update([
	      		'title' 			   => $request->title,
		        'slug' 				   => $request->slug,
		        'post_type' 		 => $request->post_type,
		        'featured_image' => $featured_image,
		        'content' 			 => htmlspecialchars($request->content),
		        'excerpt'			   => htmlspecialchars($request->excerpt),
      	]);
        

       // check _post_slider  exists or not
        $post_slider    = Helper::get_post_meta( $id, '_post_slider');
        $post_slider  = unserialize($post_slider);
        if($request->hasFile('uploadFile')){
           $sliders = array();
            foreach ($request->file('uploadFile') as $key => $value) {
                $imageName = time(). $key . '.' . $value->getClientOriginalExtension();
                $sliders[] = $imageName;
                $value->move(public_path('images/sliders'), $imageName);
            }
          if(!empty($post_slider)){
            $post_slider      =  array_merge($post_slider, $sliders );
            Helper::update_post_meta( $id, '_post_slider',  serialize($post_slider));
          }else{
            $post_slider = $sliders;
            Helper::add_post_meta( $id, '_post_slider',  serialize($post_slider));
          }
         
        }
        // dd($post);
        $post = Post::find($id);
        $postCats       = CategoryPost::where('post_id',$id)->select('category_id')->get();
        $postCats       = json_decode($postCats);
        $cats = array();
        foreach ($postCats as $key => $value) {
          $cats[] = $postCats[$key]->category_id;
        }
        $postCats     = $post->categories()->detach($cats);
        $post->categories()->attach($request->category);
        
        // check _meta_tags  exists or not
        $_meta_tags     = Helper::get_post_meta( $id, '_meta_tags');
        $metaTags = array('keywords' => $request->keywords, 'description' => $request->description);
        if($_meta_tags){
          Helper::update_post_meta( $id, '_meta_tags',  serialize($metaTags));
        }else{
          Helper::add_post_meta( $id, '_meta_tags',  serialize($metaTags));
        }
		   
        
        return redirect()->back()->with('success', 'Record successfully updated!');
    }

	

	/**
    * Delete post from posts table 
    */  
    public function deletepost(Request $request, $id)
    { 
      $user = Post::find($id);    
      $user->delete();
      Helper::delete_all_post_meta($id);
      Session::flash('success', "Record deleted successfully!!!");
      return Redirect::back();
      // return Redirect::back()->with(['success', 'User deleted successfully!!!']);
      
    }
    
    /**
    * Delete post slider 
    */  
    public function delslide(Request $request)
    { 
      
      $post_slider  = Helper::get_post_meta( $request->post_id, '_post_slider');
      $post_slider = unserialize($post_slider);
      $index = $request->key;
      $image_path = public_path('images/sliders/'.$post_slider[$index]);
      if(file_exists($image_path)) {
          @unlink($image_path);
      }

      unset($post_slider[$index]);
      $post_slider = array_values($post_slider);
      $post_slider  = Helper::update_post_meta( $request->post_id, '_post_slider', serialize($post_slider));

      return response()->json(['success'=>'Image deleted Successfully !!!', 'index'=>$index]);
    }
    
}
