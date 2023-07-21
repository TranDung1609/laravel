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
        $this->authorize('create-post');
        $categories = Category::all();
        return view('admin.post.add_post', ['categories' => $categories]);
    }

    public function index()
    {
        $this->authorize('view-post');
        $posts = Post::whereHas('user')->whereHas('category')->get();
        return view('admin.post.list_post', ['posts' => $posts]);
    }

    public function insert(PostRequest $request)
    {
        $this->authorize('create-post');
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
        return Redirect::to('post/list-post')->with('message', 'Thêm Post thành công');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('update-post', $post);
        $categories = Category::all();
        return view('admin.post.edit_post', [
            'post' => $post,
            'categories' => $categories
        ]);
    }

    public function update(UpdatePostRequest $request, $id)
    {
        $data = $request->all();
        $post = Post::FindOrFail($id)->fill($data);
        $this->authorize('update-post', $post);
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
        return Redirect::to('post/list-post')->with('message', 'Update Post thành công');
    }

    public function delete(Request $request)
    {
        $post = Post::FindOrFail($request->id);
        $this->authorize('delete-post', $post);
        $post->delete();
        return Redirect::to('post/list-post')->with('message', 'Delete Post thành công');
    }

    public function isDeleted()
    {
        $this->authorize('restore-post');
        $posts = Post::onlyTrashed()->get();
        return view('admin/post/deleted_post', ['posts' => $posts]);
    }

    public function rollbackPost($id)
    {
        $this->authorize('restore-post');
        Post::withTrashed()->where('id', $id)->restore();
        return Redirect::to('post/list-post')->with('message', 'Rollback Post thành công');
    }
    //home page
    public function postDetail(Request $request,$id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::where('status', 2)->get();
        $post_category = $post->category()->first();
        if ($post_category) {
            $postCategory = $post_category->posts()->take(9)->get();
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
                [
                    'categories' => $categories,
                    'post' => $post,
                    'hot' => $hot,
                    'hots' => $hots,
                    'focus' => $focus,
                    'new' => $new,
                    'news' => $news,
                    'postCategory' => $postCategory,
                    'comments' => $comments,
                ]
            );
        }else{
            return Redirect::to('home');
        }
    }
}
