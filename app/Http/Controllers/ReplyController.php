<?php

namespace App\Http\Controllers;

use App\Events\CreateNewReply;
use App\Http\Resources\CommentResource;
use App\Http\Resources\ReplyResource;
use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $replies =  Reply::with('user')->where('comment_id', $id)->get();
        return response($replies);

    }

    /**
     * Store a newly created resource in storage.
     * @param int $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        abort_unless(Auth::user()->is_admin, 403);
        $validated = $request->validate([
            'text' => 'required|string'
        ]);

            $created_reply = new Reply();
            $created_reply->user_id = Auth::user()->id;
            $created_reply->text = $validated['text'];
            $created_reply->comment_id = $id;
            $created_reply->save();
            event(new CreateNewReply($request->text));
            return response($created_reply);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  int  $reply_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $reply_id)
    {
        $reply_to_destroy = Reply::where('comment_id', $id)->first();
        return $reply_to_destroy->destroy($reply_id);
    }
}
