<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    /**
    * Show post
    */    
    public function index($slug){
        $post = Post::where('slug', $slug)->first();
        return view('single-post')->with('post', $post);
    }
}
