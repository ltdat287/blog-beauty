<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// use App\Http\Requests;
// use App\Http\Controllers\Controller;

use App\Post;
use Carbon\Carbon;

class BlogController extends Controller
{
    /**
     * display index post blog
     */
	public function index()
	{
		$posts = Post::where('published_at', '<=', Carbon::now())
			->orderBy('published_at','desc')
			->paginate(config('blog.posts_per_page'));

		return view('blog.index', compact('posts'));
	}

	/**
	 * display post blog with slug_post
	 */
	public function showPost($slug)
	{
		$post = Post::whereSlug($slug)->firstOrFail();

		return view('blog.post')->withPost($post);
	}
}
