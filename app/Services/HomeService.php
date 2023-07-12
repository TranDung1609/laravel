<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class HomeService
{
    public function newPost()
    {
        $posts = DB::table('posts')
            ->select('posts.id', 'posts.title', 'posts.image')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->where('categories.is_delete', 1)
            ->where('categories.status', 2)
            ->orderby('posts.id', 'desc')->limit(1)->get();
        return $posts;
    }
    public function newsPost()
    {
        $posts = DB::table('posts')
            ->select('posts.id', 'posts.title', 'posts.image')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->where('categories.is_delete', 1)
            ->where('categories.status', 2)
            ->orderby('posts.id', 'desc')->limit(4)->skip(1)->get();
        return $posts;
    }
    public function world()
    {
        $posts = DB::table('posts')
            ->select('posts.id', 'posts.title', 'posts.image')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->where('categories.is_delete', 1)
            ->where('categories.id', 7)
            ->where('categories.status', 2)
            ->orderby('posts.id', 'desc')->limit(1)->get();
        return $posts;
    }
    public function titleWorld()
    {
        $posts = DB::table('posts')
            ->select('posts.id', 'posts.title', 'posts.image')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->where('categories.id', 7)
            ->where('categories.status', 2)
            ->orderby('posts.id', 'desc')->limit(4)->skip(1)->get();
        return $posts;
    }
    public function worlds()
    {
        $posts = DB::table('posts')
            ->select('posts.id', 'posts.title', 'posts.image')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->where('categories.id', 7)
            ->where('categories.status', 2)
            ->orderby('posts.id', 'desc')->limit(4)->skip(5)->get();
        return $posts;
    }
    public function vietnam()
    {
        $posts = DB::table('posts')
            ->select('posts.id', 'posts.title', 'posts.image')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->where('categories.is_delete', 1)
            ->where('categories.id', 6)
            ->where('categories.status', 2)
            ->orderby('posts.id', 'desc')->limit(1)->get();
        return $posts;
    }
    public function titleVietnam()
    {
        $posts = DB::table('posts')
            ->select('posts.id', 'posts.title', 'posts.image')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->where('categories.id', 6)
            ->where('categories.status', 2)
            ->orderby('posts.id', 'desc')->limit(4)->skip(1)->get();
        return $posts;
    }
    public function vietnams()
    {
        $posts = DB::table('posts')
            ->select('posts.id', 'posts.title', 'posts.image')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->where('categories.id', 6)
            ->where('categories.status', 2)
            ->orderby('posts.id', 'desc')->limit(4)->skip(5)->get();
        return $posts;
    }
    public function car()
    {
        $posts = DB::table('posts')
            ->select('posts.id', 'posts.title', 'posts.image')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->where('categories.is_delete', 1)
            ->where('categories.id', 9)
            ->where('categories.status', 2)
            ->orderby('posts.id', 'desc')->limit(1)->get();
        return $posts;
    }
    public function cars()
    {
        $posts = DB::table('posts')
            ->select('posts.id', 'posts.title', 'posts.image')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->where('categories.id', 9)
            ->where('categories.status', 2)
            ->orderby('posts.id', 'desc')->limit(4)->skip(1)->get();
        return $posts;
    }
    public function person()
    {
        $posts = DB::table('posts')
            ->select('posts.id', 'posts.title', 'posts.image')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->where('categories.is_delete', 1)
            ->where('categories.id', 10)
            ->where('categories.status', 2)
            ->orderby('posts.id', 'desc')->limit(1)->get();
        return $posts;
    }
    public function people()
    {
        $posts = DB::table('posts')
            ->select('posts.id', 'posts.title', 'posts.image')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->where('categories.id', 10)
            ->where('categories.status', 2)
            ->orderby('posts.id', 'desc')->limit(4)->skip(1)->get();
        return $posts;
    }
    public function transfer()
    {
        $posts = DB::table('posts')
            ->select('posts.id', 'posts.title', 'posts.image')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->where('categories.id',8)
            ->where('categories.status',2)
            ->orderby('posts.id', 'desc')->limit(6)->get();
        return $posts;
    }
    public function hot()
    {
        $posts = DB::table('posts')
            ->select('posts.id', 'posts.title', 'posts.image')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->where('categories.is_delete', 1)
            ->where('categories.status', 2)
            ->orderby('posts.id', 'desc')->limit(1)->skip(5)->get();
        return $posts;
    }
    public function hots()
    {
        $posts = DB::table('posts')
            ->select('posts.id', 'posts.title', 'posts.image')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->where('categories.is_delete', 1)
            ->where('categories.status', 2)
            ->orderby('posts.id', 'desc')->limit(4)->skip(6)->get();
        return $posts;
    }
    public function focus()
    {
        $posts = DB::table('posts')
            ->select('posts.id', 'posts.title', 'posts.image')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->where('categories.is_delete', 1)
            ->where('categories.status', 2)
            ->orderby('posts.id', 'desc')->limit(6)->skip(10)->get();
        return $posts;
    }
    public function postCategory($id){
        $post_id = Category::find($id)->posts->pluck('id');
        $posts = Post::orderBy('id', 'DESC')->whereIn('id',$post_id)->get();
        return $posts;
    }
}
