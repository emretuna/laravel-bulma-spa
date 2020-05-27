<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentStoreRequest;
use App\Http\Requests\CommentUpdateRequest;
use App\Http\Resources\Comment as CommentResource;
use App\Http\Resources\CommentCollection;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\CommentCollection
     */
    public function index(Request $request)
    {
        $comments = Comment::all();

        return new CommentCollection($comments);
    }

    /**
     * @param \App\Http\Requests\CommentStoreRequest $request
     * @return \App\Http\Resources\Comment
     */
    public function store(CommentStoreRequest $request)
    {
        $comment = Comment::create($request->all());

        return new CommentResource($comment);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Comment $comment
     * @return \App\Http\Resources\Comment
     */
    public function show(Request $request, Comment $comment)
    {
        return new CommentResource($comment);
    }

    /**
     * @param \App\Http\Requests\CommentUpdateRequest $request
     * @param \App\Comment $comment
     * @return \App\Http\Resources\Comment
     */
    public function update(CommentUpdateRequest $request, Comment $comment)
    {
        $comment->update([]);

        return new CommentResource($comment);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Comment $comment)
    {
        $comment->delete();

        return response()->noContent(200);
    }
}
