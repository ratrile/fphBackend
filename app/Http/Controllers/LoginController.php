<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function acceder(Request $request){
       // DD($request->get('pass'));
        $sql ="SELECT *
              FROM logins
              WHERE correo=? AND pass=?";
        $login = \DB::select($sql,array($request->get('correo'), $request->get('pass')));
        return $login;
    }
}
