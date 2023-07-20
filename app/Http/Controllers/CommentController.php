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
//        $post_id = $request->post_id;
//        $comment = Comment::where('post_id',$post_id)->get();
//        dd($comment);
//        $output = '';
//        foreach ($comment as $comm) {
//            $output .= '
//                <p>
//                                <span class="txt-name">
//                                    <a class="nav-link nickname">
//                                        <b>{{ $comm->user->name }} : </b> {{ $comm->comment }}
//                                    </a>
//                                </span>
//                            </p>
//           ';
//        }
//        echo $output;
    }
    public function sendComment(CommentRequest $request){
        $this->authorize('create-comment');
//        $post_id = $request->post_id;
//        $user_id = $request->user_id;
//        $comments = $request->comment;
//        dd($post_id);
//        $comment = new Comment();
//        $comment->comment = $comments;
//        $comment->user_id = $user_id;
//        $comment->post_id = $post_id;
//        $comment->save();
        $data = $request->all();
        User::findOrFail(Auth::user()->id);
        $data['user_id'] = $request->user()->id;
        Comment::create($data);

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
