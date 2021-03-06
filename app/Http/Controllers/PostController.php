<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index(){
        return response()->json(Post::paginate(5));
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
            'titulo' => 'required|max:255',
            'conteudo' => 'required',
        ]);
        if ($validator->fails())
            return response(['errors'=>$validator->errors()],401);
        
        try{
            $post = Post::create([
                'user_id'=>auth()->user()->id,
                'titulo'=>$r->titulo,
                'conteudo'=>$r->conteudo
            ]);
        } catch(Exception $e){
            return response()->json([
                'message'=>"Não foi possível criar o post",
                'errors'=>$e
            ]);
        }
        return response()->json([
            'message'=>"Post criado com sucesso"
        ]);
            
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function apishow(Post $post)
    {
        return response()->json($post);
    }
    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }


    /**
     * Display the comments of the resource
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */

    public function apicomments(Post $post){
        $comentarios = Comment::where('post_id',$post->id)->paginate(3);
        return response()->json($comentarios);
    }
    public function comments(Post $post){
        $comentarios = Comment::where('post_id',$post->id)->paginate(3);
        return view('posts.comentarios',compact('post','comentarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, Post $post)
    {
        if($post->user_id != auth()->user()->id)
            return response(['errors'=>"O usuário não possui autorização para editar este post"],401); 
        
        $validator = Validator::make($r->all(), [
            'titulo' => 'nullable|max:255',
            'conteudo' => 'nullable',
        ]);
        if ($validator->fails())
            return response(['errors'=>$validator->errors()],401);

        $toUpdate = Arr::where($validator->validated(), function ($value, $key){
            return !is_null($value);
        });
    
        try{
            $post->update($toUpdate);
        } catch(Exception $e){
            return response()->json([
                'message'=>"Não foi possível editar o post",
                'errors'=>$e
            ]);
        }
        return response()->json([
            'message'=>"Post editado com sucesso"
        ]); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function delete(Post $post)
    {
        if($post->user_id != auth()->user()->id)
            return response(['errors'=>"O usuário não possui autorização para excluir este post"],401); 
        try{
            $post->delete();
        } catch(Exception $e){
            return response()->json([
                'message'=>"Não foi possível excluir o post",
                'errors'=>$e
            ]);
        }
        return response()->json([
            'message'=>"Post excluido com sucesso"
        ]);    
    }
}
