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
        $this->authorize('create-comment');
        $data = $request->all();
        User::findOrFail(Auth::user()->id);
        $data['user_id'] = $request->user()->id;
        Comment::create($data);
        return redirect()->back();
    }
    public function delete(Request $request)
    {
        $comment = Comment::find($request->id);
        $this->authorize('delete-comment',$comment);
        $comment->delete();
        return redirect()->back();
    }
    public function isDeleted()
    {
        $this->authorize('view-comment');
        $comments = Comment::onlyTrashed()->get();
        return view('admin.comment.deleted_comment', ['comments' => $comments]);
    }
    public function rollbackComment($id)
    {
        $this->authorize('view-comment');
        Comment::withTrashed()->where('id', $id)->restore();
        return redirect()->back();
    }
}
