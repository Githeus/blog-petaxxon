@extends('layouts.app')


@push('head')
    <style>
        .pagination{
            justify-content:center;
        }
    </style>
@endpush

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="/post/{{$post->id}}" class="btn btn-sm btn-danger">
                Voltar para o post
            </a>
            <h1 class="display-4 font-weight-bold">
                {{$post->titulo}}
            </h1>
            <p class="lead">
                Por: {{$post->user->name}} ({{$post->dataPostagem()}})
            </p>
            <hr>
        </div>
        <div class="col-12">
            <h2>Comentários</h2>
            <ul class="list-group">
                @foreach($comentarios as $c)
                <li class="list-group-item">
                    <p class="small"> 
                        <b>{{$c->user->name}}</b> em {{$c->dataPostagem()}}
                    </p>
                    <p class="lead text-justify">{{$c->conteudo}}</p>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="col-12 py-2">
            {{$comentarios->links()}}
        </div>
    </div>
</div>

@endsection