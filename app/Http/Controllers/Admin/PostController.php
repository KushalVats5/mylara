<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Post;
Use Redirect;
use Helper;
use DB;

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
    public function create()
    {
        return view('admin/add-post');
    }

    /**
    * Save post
    */    
    public function store(Request $request) {
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
      	// Create slug.
      	$slug = Helper::createSlug($request->title);

        $post = Post::create([
          'name' 	=> $request->title,
          'slug' 	=> $slug,
          'content' => htmlspecialchars($request->content),
          'excerpt'	=> htmlspecialchars($request->excerpt),
        ]);
        // $post->id;
        DB::table('metas')->insert(
		    ['description' => $request->description, 'keywords' => $request->keywords, 'post_id' => $post->id]
		);
        return redirect()->back()->with('success', 'Post successfully added!');
    }

	/**
    * Show post
    */    
	public function show($slug){
	    $game = Game::where('slug', $slug)->first();
	    return view('game.show')->with('game', $game);
	}
}
