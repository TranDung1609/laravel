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
        return view('admin.category.add_category');
    }
    public function index()
    {
        $category = Category::where('is_delete', 1)->get();
        return view('admin.Category.list_category', ['cate' => $category]);
    }
    public function insert(CategoryRequest $request)
    {
        $data = $request->all();
        Category::create($data);
        return Redirect::to('category/list-category');
    }
    public function edit($id)
    {
        $categories = Category::where('id', $id)->get();
        return view('admin.category.edit_category', ['categories' => $categories]);
    }
    public function update(CategoryRequest $request, $id)
    {

        $data = $request->all();
        $category = Category::find($id)->fill($data);
        $category->update($data);

        return Redirect::to('category/list-category');
    }
    public function delete($id)
    {

        $category = Category::find($id);
        $category->is_delete = "0";
        $category->save();
        return Redirect::to('category/list-category');
    }
    public function isDelete()
    {
        $category = Category::where('is_delete', 0)->get();
        return view('admin.category.isdelete_category', ['cate' => $category]);
    }
    public function rollbackCate($id)
    {

        $category = Category::find($id);
        $category->is_delete = "1";
        $category->save();
        return Redirect::to('category/list-category');
    }

    //home page

    public function showCategory($id)
    {
        $categories = Category::where('is_delete', 1)->where('status', 2)->get();
        $category = Category::where('id', $id)->get();
        
        foreach($category as $cate){
            $name = $cate->name;
        }
        //home page hot
        $hot = $this->service->hot();
        $hots = $this->service->hots();
        //home page tieu diem
        $focus = $this->service->focus();
        //home page new
        $new = $this->service->newPost();
        $news = $this->service->newsPost();
        if(isset($name)){
            $postCategory = $this->service->postCategory($id);
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
    }else{
        return Redirect::to('home');
    }
    }
}
