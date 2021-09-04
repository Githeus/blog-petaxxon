@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="/" class="btn btn-sm btn-danger">
                Voltar para o início
            </a>
            <h1 class="display-4 font-weight-bold">
                {{$post->titulo}}
            </h1>
            <p class="lead">
                Por: {{$post->user->name}} ({{$post->dataPostagem()}})
            </p>
            <hr>
            <p class="text-justify lead">
                {{$post->conteudo}}
            </p>
        </div>
        <div class="col-12 text-center">
            <a href="{{route('post.comments',$post)}}" class="btn btn-primary font-weight-bolder">Visualizar {{$post->comentarios->count()}} comentários</a>
        </div>
    </div>
</div>

@endsection