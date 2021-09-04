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
                                    <a class="text-dark" href="">
                                        <h3>
                                            {{$p->titulo}}
                                        </h3>
                                    </a>
                                </small>
                                <a class="text-dark" href="">
                                    <p class="card-text">{{substr($p->conteudo,0,200)}}...</p>
                                </a>
                                <hr>
                                {{$p->comentarios->count()}} comentários
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-12" style="justify-content:center">
                        {{$posts}}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
