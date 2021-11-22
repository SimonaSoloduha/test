<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;

class BlogController extends Controller
{
    public function submit(BlogRequest $request)
    {

        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->text = $request->input('text');
        $blog->author = $request->input('author');
        $blog->save();

        $image = \Image::make($request->file('photo'));
        $imagePath = storage_path("app/public/images/photo" . "$blog->id" . ".jpg");
        $image->resize(209.984, 296);
        $image->save($imagePath);

        $imagePathBlog = \Storage::disk('public')->url("images/photo" . "$blog->id" . ".jpg");
        $blog->photo = $imagePathBlog;
        $blog->save();

        return redirect()->route('blog-one', $blog->id)->with('success', 'Запись добавлена!');

    }

    public function blogAll()
    {
//        return view('blog_all', ['data' => Blog::orderBy('updated_at', 'desc')->get()]);
        return view('blog_all', ['data' => Blog::simplePaginate(3)]);

    }

    public function showOne($id)
    {
        $blog = new Blog();
        $comments = Comment::where('blog_id', '=', $id)->get();
        return view('blog_one', ['data' => $blog->find($id), 'comments' => $comments]);

    }

    public function updateOne($id)
    {
        $blog = new Blog();

        return view('blog_update', ['data' => $blog->find($id)]);
    }

    public function updateOneSubmit($id, BlogRequest $request)
    {

        $blog = Blog::find($id);
        $blog->title = $request->input('title');
        $blog->text = $request->input('text');
        $blog->author = $request->input('author');

        $blog->save();

        $image = \Image::make($request->file('photo'));
        $imagePath = storage_path("app/public/images/photo" . "$blog->id" . ".jpg");
        $image->resize(209.984, 296);
        $image->save($imagePath);


        $imagePathBlog = \Storage::disk('public')->url("images/photo" . "$blog->id" . ".jpg");
        $blog->photo = $imagePathBlog;
        $blog->save();

        return redirect()->route('blog-one', $id)->with('success', 'Запись обновлена!');

    }
}
