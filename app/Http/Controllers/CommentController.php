<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Comment;
use App\Post;
use App\User;

class CommentController extends Controller
{
	public function store(Request $request)
	{
		$rules = [
		'comment_body' => 'required',
		];

		$customMessages = [
		'comment_body.required'   => 'Comment field is required.',
		];
		$validator = Validator::make($request->all(), $rules, $customMessages);
		if ($validator->fails()) {
// send back to the page with the input data and errors
			return redirect()->back()->withInput()->withErrors($validator);
		}

		$comment = new Comment;
		$comment->body = strip_tags($request->get('comment_body'));
		$comment->user()->associate($request->user());
		$post = Post::find($request->get('post_id'));
		$post->comments()->save($comment);

		return back()->with('success','Add comment successfully');;
	}

	public function replyStore(Request $request)
	{
		$rules = [
		'comment_body' => 'required',
		];

		$customMessages = [
		'comment_body.required'   => 'Comment field is required.',
		];
		$validator = Validator::make($request->all(), $rules, $customMessages);
		if ($validator->fails()) {
// send back to the page with the input data and errors
			return redirect()->back()->withInput()->withErrors($validator);
		}

		$reply 				= new Comment();
		$reply->body 		= strip_tags($request->get('comment_body'));
		
		$reply->user()->associate($request->user());

		$reply->parent_id 	= $request->get('comment_id');
		
		$post 				= Post::find($request->get('post_id'));

		$post->comments()->save($reply);

		return back()->with('success','Reply comment successfully');;

	}
}