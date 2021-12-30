<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Comment;



class CommentController extends Controller
{
    public function index()
    {
        return Comment::all();
    }

    public function store(Request $request )
    {

        try{
            $comment = new Comment();
            $comment->user_id = $request->user_id;
            $comment->post_id = $request->post_id;
            $comment->body    = $request->body;

            if ($comment->save()){
                return response()->json(['status' => 'success', 'message' => 'Comment created successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

}
