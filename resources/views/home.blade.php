@extends('layouts.app')

@push('head')
    <style>
        .pagination{
            justify-content:center;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            @if(session('success'))
            <div class="col-6">
                <div class="alert alert-success text-center" role="alert">
                    <strong>
                        {{session('success')}}
                    </strong>
                </div>
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col-12">
                <h1>
                    Últimas postagens
                </h1>
                <div class="row">
                    @foreach($posts as $p)
                    <div class="p-4 col-12 col-sm-6 col-lg-4">
                        <div class="card p-0 shadow">                            
                            <div class="card-body">
                                <small class="card-title">
                                    {{$p->user->name}} <br>
                                    {{$p->dataPostagem()}}
                                    <a class="text-dark" href="{{route('post.show',$p)}}">
                                        <h3 class="font-weight-bolder">
                                            {{$p->titulo}}
                                        </h3>
                                    </a>
                                </small>
                                <a class="text-dark" href="{{route('post.show',$p)}}">
                                    <p class="card-text text-justify">{{substr($p->conteudo,0,200)}}...</p>
                                </a>
                                <hr>
                                {{$p->comentarios->count()}} comentários
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>                
            </div>
            <div class="col-12" style="justify-content:center">
                {{$posts}}
            </div>
        </div>
    </div>
@endsection
