<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Services\HomeService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    protected $service;
    public function __construct(HomeService $service)
    {
        $this->service = $service;
    }
    public function addPost()
    {
        $category = Category::all();
        return view('admin.post.add_post', ['category' => $category]);
    }
    public function index()
    {
        $posts = Post::whereHas('user')->whereHas('category')->get();
        return view('admin.post.list_post', ['posts' => $posts]);
    }
    public function insert(PostRequest $request)
    {
        $data = $request->all();
        User::findOrFail(Auth::user()->id);
        $data['user_id'] = $request->user()->id;
        if ($request->hasFile('image')) {
            $uploadPath = 'posts';
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $nameImage = current(explode('.', $file->getClientOriginalName()));
            $filename = time() . $nameImage . '.' . $extension;
            $file->move($uploadPath, $filename);
            $data['image'] = $filename;
            Post::create($data);
        }
        return Redirect::to('post/list-post');
    }
    public function edit($id)
    {
        $posts = Post::where('id', $id)->get();
        $category = Category::all();
        return view('admin.post.edit_post', ['posts' => $posts], ['categories' => $category]);
    }
    public function update(UpdatePostRequest $request, $id)
    {
        $data = $request->all();
        $post = Post::find($id)->fill($data);
        if ($request->hasFile('image')) {
            $uploadPath = 'posts';
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $nameImage = current(explode('.', $file->getClientOriginalName()));
            $filename = time() . $nameImage . '.' . $extension;
            $file->move($uploadPath, $filename);
            $data['image'] = $filename;
        }
        $post->update($data);

        return Redirect::to('post/list-post');
    }
    public function delete(Request $request)
    {
        $post = Post::find($request->id);
        $post->delete();
        return Redirect::to('post/list-post');
    }

    public function isDeleted()
    {

        $posts = Post::onlyTrashed()->get();
        return view('admin/post/deleted_post', ['posts' => $posts]);
    }

    public function rollbackPost($id)
    {
        Post::withTrashed()->where('id', $id)->restore();
        return Redirect::to('post/list-post');
    }

    //home page
    public function postDetail($id)
    {
        $posts = Post::where('id', $id)->get();
        $categories = Category::where('status', 2)->get();
        foreach ($posts as $post) {
            $category_id = $post->category_id;
        }
        $post_id = Category::find($category_id)->posts->pluck('id');
        $postCategory = Post::orderBy('id', 'DESC')
            ->whereIn('id', $post_id)->take(9)->get();
        //home page hot
        $hot = $this->service->hot();
        $hots = $this->service->hots();
        //home page tieu diem
        $focus = $this->service->focus();
        //home page new
        $new = $this->service->newPost();
        $news = $this->service->newsPost();
        //comment
        $comments = Comment::where('post_id', $id)->get();
        return view(
            'user.post_detail',
            ['categories' => $categories],
            [
                'posts' => $posts,
                'hot' => $hot,
                'hots' => $hots,
                'focus' => $focus,
                'new' => $new,
                'news' => $news,
                'postCategory' => $postCategory,
                'comments' => $comments,
            ]
        );
    }
}
