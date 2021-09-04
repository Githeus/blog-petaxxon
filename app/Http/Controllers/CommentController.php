<?php

namespace App\Http\Controllers;

use App\Comment;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'post_id' => 'required|exists:posts,id',
            'conteudo' => 'required',
        ]);
        if ($validator->fails())
            return response(['errors'=>$validator->errors()],401);
        try{
            $comment = Comment::create([
                'user_id'=>auth()->user()->id,
                'post_id'=>$r->post_id,
                'conteudo'=>$r->conteudo
            ]);
        } catch(Exception $e){
            return response()->json([
                'message'=>"Não foi possível criar o comentário",
                'errors'=>$e
            ]);
        }
        return response()->json([
            'message'=>"Comentário criado com sucesso"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function delete(Comment $comment)
    {
        if($comment->user_id != auth()->user()->id)
            return response(['errors'=>"O usuário não possui autorização para excluir este comentário"],401); 
        try{
            $comment->delete();
        } catch(Exception $e){
            return response()->json([
                'message'=>"Não foi possível excluir o comentário",
                'errors'=>$e
            ]);
        }
        return response()->json([
            'message'=>"Comentário excluido com sucesso"
        ]);
    }
}
