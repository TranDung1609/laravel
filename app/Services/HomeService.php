<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class HomeService
{
    public function newPost()
    {
        $posts = Post::whereHas('user')->whereHas('category', function ($query) {
            return $query->where('status', '=', 2);
        })->orderby('id', 'desc')->take(1)->get();

        // $posts = DB::table('posts')
        //     ->select('posts.id', 'posts.title', 'posts.image')
        //     ->join('categories', 'categories.id', '=', 'posts.category_id')
        //     ->where('categories.is_delete', 1)
        //     ->where('categories.status', 2)
        //     ->orderby('posts.id', 'desc')->limit(1)->get();
        return $posts;
    }
    public function newsPost()
    {
        $posts = Post::whereHas('user')->whereHas('category', function ($query) {
            return $query->where('status', '=', 2);
        })->orderby('id', 'desc')->skip(1)->take(4)->get();

        // $posts = DB::table('posts')
        //     ->select('posts.id', 'posts.title', 'posts.image')
        //     ->join('categories', 'categories.id', '=', 'posts.category_id')
        //     ->where('categories.is_delete', 1)
        //     ->where('categories.status', 2)
        //     ->orderby('posts.id', 'desc')->limit(4)->skip(1)->get();
        return $posts;
    }
    public function world()
    {
        $posts = Post::whereHas('user')->whereHas('category', function ($query) {
            return $query->where('id', '=', 7)->where('status', '=', 2);
        })->orderby('id', 'desc')->take(1)->get();

        // $posts = DB::table('posts')
        //     ->select('posts.id', 'posts.title', 'posts.image')
        //     ->join('categories', 'categories.id', '=', 'posts.category_id')
        //     ->where('categories.is_delete', 1)
        //     ->where('categories.id', 7)
        //     ->where('categories.status', 2)
        //     ->orderby('posts.id', 'desc')->limit(1)->get();
        return $posts;
    }
    public function titleWorld()
    {
        $posts = Post::whereHas('user')->whereHas('category', function ($query) {
            return $query->where('id', '=', 7)->where('status', '=', 2);
        })->orderby('id', 'desc')->skip(1)->take(4)->get();

        // $posts = DB::table('posts')
        //     ->select('posts.id', 'posts.title', 'posts.image')
        //     ->join('categories', 'categories.id', '=', 'posts.category_id')
        //     ->where('categories.id', 7)
        //     ->where('categories.status', 2)
        //     ->orderby('posts.id', 'desc')->limit(4)->skip(1)->get();
        return $posts;
    }
    public function worlds()
    {
        $posts = Post::whereHas('user')->whereHas('category', function ($query) {
            return $query->where('id', '=', 7)->where('status', '=', 2);
        })->orderby('id', 'desc')->skip(5)->take(4)->get();

        // $posts = DB::table('posts')
        //     ->select('posts.id', 'posts.title', 'posts.image')
        //     ->join('categories', 'categories.id', '=', 'posts.category_id')
        //     ->where('categories.id', 7)
        //     ->where('categories.status', 2)
        //     ->orderby('posts.id', 'desc')->limit(4)->skip(5)->get();
        return $posts;
    }
    public function vietnam()
    {
        $posts = Post::whereHas('user')->whereHas('category', function ($query) {
            return $query->where('id', '=', 6)->where('status', '=', 2);
        })->orderby('id', 'desc')->take(1)->get();

        // $posts = DB::table('posts')
        //     ->select('posts.id', 'posts.title', 'posts.image')
        //     ->join('categories', 'categories.id', '=', 'posts.category_id')
        //     ->where('categories.is_delete', 1)
        //     ->where('categories.id', 6)
        //     ->where('categories.status', 2)
        //     ->orderby('posts.id', 'desc')->limit(1)->get();
        return $posts;
    }
    public function titleVietnam()
    {
        $posts = Post::whereHas('user')->whereHas('category', function ($query) {
            return $query->where('id', '=', 6)->where('status', '=', 2);
        })->orderby('id', 'desc')->skip(1)->take(4)->get();

        // $posts = DB::table('posts')
        //     ->select('posts.id', 'posts.title', 'posts.image')
        //     ->join('categories', 'categories.id', '=', 'posts.category_id')
        //     ->where('categories.id', 6)
        //     ->where('categories.status', 2)
        //     ->orderby('posts.id', 'desc')->limit(4)->skip(1)->get();
        return $posts;
    }
    public function vietnams()
    {
        $posts = Post::whereHas('user')->whereHas('category', function ($query) {
            return $query->where('id', '=', 6)->where('status', '=', 2);
        })->orderby('id', 'desc')->skip(5)->take(4)->get();

        // $posts = DB::table('posts')
        //     ->select('posts.id', 'posts.title', 'posts.image')
        //     ->join('categories', 'categories.id', '=', 'posts.category_id')
        //     ->where('categories.id', 6)
        //     ->where('categories.status', 2)
        //     ->orderby('posts.id', 'desc')->limit(4)->skip(5)->get();
        return $posts;
    }
    public function car()
    {
        $posts = Post::whereHas('user')->whereHas('category', function ($query) {
            return $query->where('id', '=', 9)->where('status', '=', 2);
        })->orderby('id', 'desc')->take(1)->get();

        // $posts = DB::table('posts')
        //     ->select('posts.id', 'posts.title', 'posts.image')
        //     ->join('categories', 'categories.id', '=', 'posts.category_id')
        //     ->where('categories.is_delete', 1)
        //     ->where('categories.id', 9)
        //     ->where('categories.status', 2)
        //     ->orderby('posts.id', 'desc')->limit(1)->get();
        return $posts;
    }
    public function cars()
    {
        $posts = Post::whereHas('user')->whereHas('category', function ($query) {
            return $query->where('id', '=', 9)->where('status', '=', 2);
        })->orderby('id', 'desc')->skip(1)->take(4)->get();

        // $posts = DB::table('posts')
        //     ->select('posts.id', 'posts.title', 'posts.image')
        //     ->join('categories', 'categories.id', '=', 'posts.category_id')
        //     ->where('categories.id', 9)
        //     ->where('categories.status', 2)
        //     ->orderby('posts.id', 'desc')->limit(4)->skip(1)->get();
        return $posts;
    }
    public function person()
    {
        $posts = Post::whereHas('user')->whereHas('category', function ($query) {
            return $query->where('id', '=', 10)->where('status', '=', 2);
        })->orderby('id', 'desc')->take(1)->get();

        // $posts = DB::table('posts')
        //     ->select('posts.id', 'posts.title', 'posts.image')
        //     ->join('categories', 'categories.id', '=', 'posts.category_id')
        //     ->where('categories.is_delete', 1)
        //     ->where('categories.id', 10)
        //     ->where('categories.status', 2)
        //     ->orderby('posts.id', 'desc')->limit(1)->get();
        return $posts;
    }
    public function people()
    {
        $posts = Post::whereHas('user')->whereHas('category', function ($query) {
            return $query->where('id', '=', 10)->where('status', '=', 2);
        })->orderby('id', 'desc')->skip(1)->take(4)->get();

        // $posts = DB::table('posts')
        //     ->select('posts.id', 'posts.title', 'posts.image')
        //     ->join('categories', 'categories.id', '=', 'posts.category_id')
        //     ->where('categories.id', 10)
        //     ->where('categories.status', 2)
        //     ->orderby('posts.id', 'desc')->limit(4)->skip(1)->get();
        return $posts;
    }
    public function transfer()
    {
        $posts = Post::whereHas('user')->whereHas('category', function ($query) {
            return $query->where('id', '=', 8)->where('status', '=', 2);
        })->orderby('id', 'desc')->take(6)->get();

        // $posts = DB::table('posts')
        //     ->select('posts.id', 'posts.title', 'posts.image')
        //     ->join('categories', 'categories.id', '=', 'posts.category_id')
        //     ->where('categories.id', 8)
        //     ->where('categories.status', 2)
        //     ->orderby('posts.id', 'desc')->limit(6)->get();
        return $posts;
    }
    public function hot()
    {
        $posts = Post::whereHas('user')->whereHas('category', function ($query) {
            return $query->where('status', '=', 2);
        })->orderby('id', 'desc')->skip(5)->take(1)->get();

        // $posts = DB::table('posts')
        //     ->select('posts.id', 'posts.title', 'posts.image')
        //     ->join('categories', 'categories.id', '=', 'posts.category_id')
        //     ->where('categories.is_delete', 1)
        //     ->where('categories.status', 2)
        //     ->orderby('posts.id', 'desc')->limit(1)->skip(5)->get();
        return $posts;
    }
    public function hots()
    {
        $posts = Post::whereHas('user')->whereHas('category', function ($query) {
            return $query->where('status', '=', 2);
        })->orderby('id', 'desc')->skip(6)->take(4)->get();

        // $posts = DB::table('posts')
        //     ->select('posts.id', 'posts.title', 'posts.image')
        //     ->join('categories', 'categories.id', '=', 'posts.category_id')
        //     ->where('categories.is_delete', 1)
        //     ->where('categories.status', 2)
        //     ->orderby('posts.id', 'desc')->limit(4)->skip(6)->get();
        return $posts;
    }
    public function focus()
    {
        $posts = Post::whereHas('user')->whereHas('category', function ($query) {
            return $query->where('status', '=', 2);
        })->orderby('id', 'desc')->skip(10)->take(6)->get();

        // $posts = DB::table('posts')
        //     ->select('posts.id', 'posts.title', 'posts.image')
        //     ->join('categories', 'categories.id', '=', 'posts.category_id')
        //     ->where('categories.is_delete', 1)
        //     ->where('categories.status', 2)
        //     ->orderby('posts.id', 'desc')->limit(6)->skip(10)->get();
        return $posts;
    }
    public function postCategory($id)
    {
        $post_id = Category::find($id)->posts->pluck('id');
        $posts = Post::orderBy('id', 'DESC')->whereIn('id', $post_id)->get();
        return $posts;
    }
}
