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
    public function loadComment(Request $request){
        $post_id = $request->post_id;
        $comments = Comment::where('post_id', $post_id)->get();
        $output = '';
        foreach ($comments as  $comment) {
            $output .= '
                <div class="row style_comment">
                                        <div class="col-sm-10">
                                            <p style="color: blue">@'.$comment->user->name.'</p>
                                            <p>'.$comment->comment.'</p>
                                        </div>
                                    </div><p></p>
           ';
        }
        echo $output;
    }
    public function sendComment(CommentRequest $request){
        $this->authorize('create-comment');
//        $data = $request->all();
//        User::findOrFail(Auth::user()->id);
//        $data['user_id'] = $request->user()->id;
//        Comment::create($data);
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->user_id = auth()->user()->id; // Assuming you have an authentication system in place
        $comment->user_name = auth()->user()->name;
        $comment->post_id = $request->post_id;
        $comment->save();
        return response()->json(['message' => 'Comment created successfully', 'comment' => $comment]);
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
        return redirect()->back()->with('message','Rollback Comment thành công');
    }
}
