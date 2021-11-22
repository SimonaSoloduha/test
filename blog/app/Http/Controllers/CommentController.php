<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    public function add($id, CommentRequest $request)
    {

        $comment = new Comment();
        $comment->blog_id = $id;
        $comment->name = $request->input('name');
        $comment->email = $request->input('email');
        $comment->message = $request->input('message');
        $comment->save();

        return redirect()->route('blog-one', $id);

    }

    public function commentAll($id)
    {
        return view('blog_one', ['comments' => Comment::orderBy('post_id', $id)->get()]);
    }
}
