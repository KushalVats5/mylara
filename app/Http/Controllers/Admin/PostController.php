<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;
use App\User;
use App\Post;
Use Redirect;
use Helper;
use DB;
use File;

class PostController extends Controller
{
	/**
    * Display all post
    */
    public function index()
    {
        $products = Post::all();

        return view('viewproducts', ['allProducts' => $products]);
    }

    /**
    * Show create post view
    */
    public function create($type, $id=false)
    {	
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
    	return view('admin/add-post')->with('data', $data);
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
            echo $featured_image;
          }else{
            $featured_image = null;
        }

        

        $post = Post::create([
          'title' 			=> $request->title,
          'slug'      => $slug,          
          'user_id'      => Auth::user()->id,          
          'post_type' 		=> $request->post_type,
          'featured_image' 	=> $featured_image,
          'content' 		=> htmlspecialchars($request->content),
          'excerpt'			=> htmlspecialchars($request->excerpt),
        ]);

         $metaTags = array('keywords' => $request->keywords, 'description' => $request->description);
        Helper::add_post_meta( $post->id, '_meta_tags',  serialize($metaTags)); 
        $sliders = array();
        foreach ($request->file('uploadFile') as $key => $value) {
            $imageName = time(). $key . '.' . $value->getClientOriginalExtension();
            $sliders[] = $imageName;
            $value->move(public_path('images/sliders'), $imageName);
        }
        Helper::add_post_meta( $post->id, '_post_slider',  serialize($sliders));
		
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
	      		'title' 			=> $request->title,
		        'slug' 				=> $request->slug,
		        'post_type' 		=> $request->post_type,
		        'featured_image' 	=> $featured_image,
		        'content' 			=> htmlspecialchars($request->content),
		        'excerpt'			=> htmlspecialchars($request->excerpt),
      	]);
        

	$metaTags = array('keywords' => $request->keywords, 'description' => $request->description);
        Helper::update_post_meta( $id, '_meta_tags',  serialize($metaTags));

		
        return redirect()->back()->with('success', 'Record successfully updated!');
    }

	/**
    * Show post
    */    
	public function showposts(){
	    // $posts = Post::all();
	    $posts = Post::paginate(10);
      	return view('admin/posts',compact('posts',$posts));
	}


	/**
    * Delete post from posts table 
    */  
    public function deletepost(Request $request, $id)
    { 
      $user = Post::find($id);    
      $user->delete();
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
      unset($post_slider[$request->post_id]);
      print_r(array_values($post_slider));
      // return response()->json(['success'=>'Images Uploaded Successfully.']);
    }
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function imagesUploadPost(Request $request)
    {
        request()->validate([
            'uploadFile' => 'required',
        ]);

        foreach ($request->file('uploadFile') as $key => $value) {
            $imageName = time(). $key . '.' . $value->getClientOriginalExtension();
            $value->move(public_path('images/sliders'), $imageName);
        }

        return response()->json(['success'=>'Images Uploaded Successfully.']);
    }*/
}
