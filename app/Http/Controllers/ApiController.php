<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function login(Request $r){
        $validator = Validator::make($r->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails())
            return response(['errors'=>$validator->errors()],401);


        //Get usuário
        $user = User::where('email',$r->email)->get()->first();
        if($user){
            // Verifica a senha informada com a senha do banco
            if (Hash::check($r->password, $user->password))
                return response()->json([
                    'token'=>$user->api_token
                ]);
            else
                return response()->json([
                    'message'=>"Senha inválida"
                ]);
        }
        else
            return response()->json([
                'message'=>"Usuário não cadastrado"
            ]);

    }
}
