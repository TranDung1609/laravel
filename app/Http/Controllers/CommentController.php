<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    public function sendComment(CommentRequest $request){
        $data = $request->all();
        User::find(Auth::user()->id);
        $data['user_id'] = $request->user()->id;
        Comment::create($data);
        $id = $data['post_id'];
        return Redirect::to('home/show-post/'.$id);
    }

}
