<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): \Illuminate\Contracts\Pagination\Paginator
    {
         return DB::table('posts')
                 ->join('users','posts.user_id','=','users.id')
                 ->select('posts.*','users.name')
                 ->paginate(16);
         //return DB::table('posts')->paginate(16);
    }

    public function store(Request $request )
    {
        try{
            $post = new Post();
            $post->user_id = $request->user_id;
            $post->title   = $request->title;
            $post->body    = $request->body;

            if ($post->save()){
                return response()->json(['status' => 'success', 'message' => 'Post created successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $post = Post::findOrFail($id);
            $post->title = $request->title;
            $post->body  = $request->body;
            if ($post->save()){
                return response()->json(['status' => 'success', 'message' => 'Post updated successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        try{
            $post = Post::findOrFail($id);
            if ($post->delete()){
                return response()->json(['status' => 'success', 'message' => 'Post deleted successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function indexwithusers(){
       return Post::with('user','comment')->get();

    }

    public function singlepost(Request $request, $post_id){
        return Post::with('user','comment','comment.user')->where('id',$post_id)->get();
    }


}

