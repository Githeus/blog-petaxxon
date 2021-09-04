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
        @if($post->comentarios->count())
        <div class="col-12 p-3 shadow">
            <h2>Comentários:</h2>
            <ul class="list-group">
                @foreach($post->comentarios as $c)
                <li class="list-group-item ">
                    <span class="lead font-weight-bold">
                        {{$c->user->name}}
                    </span> <br>
                    {{$c->conteudo}}
                </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>

@endsection