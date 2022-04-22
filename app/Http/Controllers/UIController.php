<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;

class UIController extends Controller
{
    public function homepage()
    {
        $page_title="All Posts";
        $category=Category::orderby('id','desc')->limit(4)->get();
        $post=Post::orderby('id','desc')->paginate(5);
        return view('user.home',compact('post','page_title','category'));
    }

    public function categorypage($id)
    {
        $page_title="Posts by Category";
        $category=Category::orderby('id','desc')->limit(4)->get();
        $post=Post::orderby('id','desc')->where('post_category_id',$id)->paginate(5);
        return view('user.category',compact('post','page_title','category'));
    }

    public function postdetail($id)
    {
        $page_title="Post Detail";
        $category=Category::orderby('id','desc')->limit(4)->get();
        $post=Post::where('id',$id)->get();
        return view('user.postdetail',compact('post','page_title','category'));
    }

    public function search(Request $request)
    {
        $page_title="Posts Search";
        $category=Category::orderby('id','desc')->limit(4)->get();
        $search = $request->get('search_text');
        $post=Post::where('post_title','LIKE',"%{$search}%")->orwhere('post_author','LIKE',"%{$search}%")->paginate(5);
        return view('user.searchpost',compact('post','category','page_title'));
    }
}
