<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

use App\Http\Requests\loginRequest;

class LoginController extends Controller
{

    public function authLogin(loginRequest $req)
    {
        $user = $req->input('email');
        $pass = $req->input('password');

        $remember = $req->input('remember');
        $response = [];
        $response = Http::post('http://localhost:3000/api/v1/Auth/login', [
            'username' => $user,
            'password' => $pass ,
        ]);
        if($response->status()===401 && $response->json()===null){
            return redirect()->back()->with('error', 'Credenciales no validas, corrobora el correo y contraseña.');
        }else{
            if($response->status()===200 && $response->json() != null){
                $dataUser = json_decode($response)->user;

                session(['authSesionLogin'=>$dataUser]);

                if($dataUser->Datos==null){
                    $nombres="";
                    $apellidos="";
                }else{
                    $nombres=$dataUser->Datos->nombres;
                    $apellidos=$dataUser->Datos->apellidos;
                }
                session([
                    'userId' => $dataUser->idUser,
                    'email'=>$dataUser->email,
                    'rol'=>$dataUser->idRol,
                    'empresa'=> $dataUser->idEmpresa,
                    'nombres'=> $nombres,
                    'apellidos'=> $apellidos
                ]);
                //dd(session('email'));
                return redirect()->back();
            }else{
                return redirect()->back()->with('error', 'Ha ocurrido un error, verifica tu conexion');
            }
        }
    }

    public function logout()
    {
        session()->forget('authSesionLogin');
        session()->flush();
        return redirect('/');
    }

}
