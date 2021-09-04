<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id','user_id','conteudo'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function dataPostagem(){
        return date('d/m/Y H:i', strtotime( $this->created_at ) );
    }
}
