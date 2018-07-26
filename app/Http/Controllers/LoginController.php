<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class LoginController extends Controller
{   
    public function login(Request $request){
        $user =  $request->user;
        $pass =  $request->pass;

        $getUser = DB::table('usuarios')->join('roles', 'usuarios.role_id', '=', 'roles.role_id')->select('roles.role_name', 'usuarios.*')->where([['usr_email', '=', $user], ['usr_pass', '=', $pass]])
        ->get();

        if(count($getUser) == 1){
            return view('dashboard', ['user' => $getUser])->render();
        }else{
            return 'Credenciales Invalidas';
        }
    }
}