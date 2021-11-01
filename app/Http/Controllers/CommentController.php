<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|min:3',
        ]);

        $comment = new Comment;
        $comment->body = $request->body;
        $comment->user_id = $request->user_id;
        $comment->post_id = $request->post_id;
        $comment->save();

        return redirect()->route('post.detalles', $request->post_id);

    }
    public function destroy(Request $request, $id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect()->route('post.detalles', $request->post_id);
    }
}
