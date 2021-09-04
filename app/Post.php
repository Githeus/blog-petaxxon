<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id','titulo','conteudo'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function dataPostagem(){
        return date('d/m/Y H:i', strtotime( $this->created_at ) );
    }

    public function comentarios(){
        return $this->hasMany('App\Comment');
    }
}
