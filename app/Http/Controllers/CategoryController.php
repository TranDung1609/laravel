<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Services\HomeService;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    protected $service;

    public function __construct(HomeService $service)
    {
        $this->service = $service;
    }

    public function addCategory()
    {
        $this->authorize('category');
        return view('admin.category.add_category');
    }

    public function index()
    {
        $this->authorize('category');
        $categories = Category::all();
        return view('admin.Category.list_category', ['categories' => $categories]);
    }

    public function insert(CategoryRequest $request)
    {
        $this->authorize('category');
        $data = $request->all();
        Category::create($data);
        return Redirect::to('category/list-category')->with('message','Thêm Category thành công');
    }

    public function edit($id)
    {
        $this->authorize('category');
        $category = Category::findOrFail($id);
        return view('admin.category.edit_category', ['category' => $category]);
    }

    public function update(CategoryRequest $request, $id)
    {
        $this->authorize('category');
        $data = $request->all();
        $category = Category::find($id)->fill($data);
        $category->update($data);
        return Redirect::to('category/list-category')->with('message','Sửa Category thành công');
    }

    public function delete($id)
    {
        $this->authorize('category');
        Category::find($id)->delete();
        return Redirect::to('category/list-category')->with('message','Xoá Category thành công');
    } 

    public function isDeleted()
    {
        $this->authorize('category');
        $categories = Category::onlyTrashed()->get();
        return view('admin/category/deleted_category', ['categories' => $categories]);
    }

    public function rollbackCate($id)
    {
        $this->authorize('category');
        Category::withTrashed()->where('id', $id)->restore();
        return Redirect::to('category/list-category')->with('message','Khôi phục Category thành công');
    }

    //home page

    public function showCategory($id)
    {
        $categories = Category::where('status', 2)->get();
        $category = Category::findOrFail($id);
        
            $postCategory = $this->service->postCategory($id);
            //home page hot
            $hot = $this->service->hot();
            $hots = $this->service->hots();
            //home page tieu diem
            $focus = $this->service->focus();
            //home page new
            $new = $this->service->newPost();
            $news = $this->service->newsPost();
            return view(
                'user.category_detail',
                ['category' => $category],
                [
                    'categories' => $categories,
                    'postCategory' => $postCategory,
                    'hot' => $hot,
                    'hots' => $hots,
                    'focus' => $focus,
                    'new' => $new,
                    'news' => $news,
                ]
            );
        
    }
}
