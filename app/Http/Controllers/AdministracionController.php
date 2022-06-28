<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;

class AdministracionController extends Controller
{

    public function empresas()
    {
        $response = Http::get('http://localhost:3000/api/v1/Empresas');
        $empresas = json_decode($response);
        return view('Administracion.empresas', compact('empresas'));
    }

    public function registerEmpresa(Request $req)
    {
        if ($req->input('vision') == null && $req->input('mision') == null) {
            $datos = [
                "empresa" => $req->input('empresa'),
                "descripcion" => $req->input('descripcion')
            ];
        }
        if ($req->input('vision') != null && $req->input('mision') == null) {
            $datos = [
                "empresa" => $req->input('empresa'),
                "descripcion" => $req->input('descripcion'),
                "vision" => $req->input('vision'),
            ];
        }
        if ($req->input('vision') == null && $req->input('mision') != null) {
            $datos = [
                "empresa" => $req->input('empresa'),
                "descripcion" => $req->input('descripcion'),
                "mision" => $req->input('mision'),
            ];
        }
        if ($req->input('vision') != null && $req->input('mision') != null) {
            $datos = [
                "empresa" => $req->input('empresa'),
                "descripcion" => $req->input('descripcion'),
                "vision" => $req->input('vision'),
                "mision" => $req->input('mision'),
            ];
        }

        $response = Http::post('http://localhost:3000/api/v1/Empresas', $datos);
        if ($response->status() == 201) {
            return redirect()->back()->with('success', 'Registro creado correctamente');
        } else {
            return redirect()->back()->with('error', 'Ha ocurrido un error, verifica los datos enviado o tu conexion a internet');
        }
    }

    public function deleteEmpresa(Request $req)
    {
        //dd($req->input('estado'));
        if ($req->input('estado') == 1) {
            $estado = false;
            $msg = 'Registro dado de baja correctamente';
        } else {
            $estado = true;
            $msg = 'Registro dado de alta correctamente';
        }
        $response = Http::patch('http://localhost:3000/api/v1/Empresas/' . $req->input('idEmpresa'), [
            "estado" => $estado
        ]);

        if ($response->status() == 200) {
            return redirect()->back()->with('success', $msg);
        } else {
            return redirect()->back()->with('error', 'Ha ocurrido un error, verifica los datos enviados o tu conexion a internet');
        }
    }

    public function updateEmpresa(Request $req)
    {
        if ($req->input('vision') == null && $req->input('mision') == null) {
            $datos = [
                "empresa" => $req->input('empresa'),
                "descripcion" => $req->input('descripcion')
            ];
        }
        if ($req->input('vision') != null && $req->input('mision') == null) {
            $datos = [
                "empresa" => $req->input('empresa'),
                "descripcion" => $req->input('descripcion'),
                "vision" => $req->input('vision'),
            ];
        }
        if ($req->input('vision') == null && $req->input('mision') != null) {
            $datos = [
                "empresa" => $req->input('empresa'),
                "descripcion" => $req->input('descripcion'),
                "mision" => $req->input('mision'),
            ];
        }
        if ($req->input('vision') != null && $req->input('mision') != null) {
            $datos = [
                "empresa" => $req->input('empresa'),
                "descripcion" => $req->input('descripcion'),
                "vision" => $req->input('vision'),
                "mision" => $req->input('mision'),
            ];
        }

        if ($req->input('empresa') === null && $req->input('descripcion') === null) {
            return redirect()->back()->with('error', 'El campo nombre empresa y descripcion no pueden estar  vacios');
        }

        $response = Http::patch('http://localhost:3000/api/v1/Empresas/' . $req->input('idEmpresa'), $datos);
        if ($response->status() == 200) {
            return redirect()->back()->with('success', 'Registro actualizado correctamente');
        } else {
            return redirect()->back()->with('error', 'Ha ocurrido un error, verifica los datos enviados o tu conexion a internet');
        }
    }

    public function tipoSedes()
    {
        $response = Http::get('http://localhost:3000/api/v1/TipoSedes');
        $tipoSedes = json_decode($response);
        //dd($tipoSedes);
        return view('Administracion.tipoSedes', compact('tipoSedes'));
    }

    public function registerTipoSede(Request $req)
    {
        if ($req->input('descripcion') == null && $req->input('tipoSede') != null) {
            $datos = [
                "tipoSede" => $req->input('tipoSede')
            ];
        }

        if ($req->input('descripcion') != null && $req->input('tipoSede') != null) {
            $datos = [
                "tipoSede" => $req->input('tipoSede'),
                "descripcion" => $req->input('descripcion')
            ];
        }

        if ($req->input('tipoSede') === null) {
            return redirect()->back()->with('error', 'El campo tipo de sede no puede estar  vacio');
        }

        $response = Http::post('http://localhost:3000/api/v1/TipoSedes', $datos);
        if ($response->status() == 201) {
            return redirect()->back()->with('success', 'Registro creado correctamente');
        } else {
            return redirect()->back()->with('error', 'Ha ocurrido un error, verifica los datos enviado o tu conexion a internet');
        }
    }

    public function deleteTipoSede(Request $req)
    {
        //dd($req->input('estado'));
        if ($req->input('estado') == 1) {
            $estado = false;
            $msg = 'Registro dado de baja correctamente';
        } else {
            $estado = true;
            $msg = 'Registro dado de alta correctamente';
        }
        $response = Http::patch('http://localhost:3000/api/v1/TipoSedes/' . $req->input('idTipoSede'), [
            "estado" => $estado
        ]);

        if ($response->status() == 200) {
            return redirect()->back()->with('success', $msg);
        } else {
            return redirect()->back()->with('error', 'Ha ocurrido un error, verifica los datos enviados o tu conexion a internet');
        }
    }

    public function updateTipoSede(Request $req)
    {
        if ($req->input('descripcion') == null && $req->input('tipoSede') != null) {
            $datos = [
                "tipoSede" => $req->input('tipoSede')
            ];
        }

        if ($req->input('descripcion') != null && $req->input('tipoSede') != null) {
            $datos = [
                "tipoSede" => $req->input('tipoSede'),
                "descripcion" => $req->input('descripcion')
            ];
        }

        if ($req->input('tipoSede') === null) {
            return redirect()->back()->with('error', 'El campo tipo de sede no puede estar  vacio');
        }

        $response = Http::patch('http://localhost:3000/api/v1/TipoSedes/' . $req->input('idTipoSede'), $datos);
        if ($response->status() == 200) {
            return redirect()->back()->with('success', 'Registro actualizado correctamente');
        } else {
            return redirect()->back()->with('error', 'Ha ocurrido un error, verifica los datos enviados o tu conexion a internet');
        }
    }

    public function sedes()
    {
        $response = Http::get('http://localhost:3000/api/v1/Sedes/' . session('empresa'));
        $sedes = json_decode($response);

        $response = Http::get('http://localhost:3000/api/v1/TipoSedes');
        $tipoSedes = json_decode($response);
        //dd($tipoSedes);
        return view('Administracion.sedes', compact('sedes', 'tipoSedes'));
    }

    public function registerSede(Request $req)
    {
        if ($req->input('sede') === null || $req->input('descripcion') === null || $req->input('idTipoSede') === null) {
            return redirect()->back()->with('error', 'Todos los campos del formulario para registrar una sede son obligatorios.');
        } else {
            $datos = [
                "sede" => $req->input('sede'),
                "descripcion" => $req->input('descripcion'),
                "idEmpresa" => session('empresa'),
                "idTipoSede" => $req->input('idTipoSede')
            ];
        }

        $response = Http::post('http://localhost:3000/api/v1/Sedes', $datos);
        if ($response->status() == 201) {
            return redirect()->back()->with('success', 'Registro creado correctamente');
        } else {
            return redirect()->back()->with('error', 'Ha ocurrido un error, verifica los datos enviado o tu conexion a internet');
        }
    }
    public function deleteSede(Request $req)
    {
        //dd($req->input('estado'));
        if ($req->input('estado') == 1) {
            $estado = false;
            $msg = 'Registro dado de baja correctamente';
        } else {
            $estado = true;
            $msg = 'Registro dado de alta correctamente';
        }
        $response = Http::patch('http://localhost:3000/api/v1/Sedes/' . $req->input('idSede'), [
            "estado" => $estado
        ]);

        if ($response->status() == 200) {
            return redirect()->back()->with('success', $msg);
        } else {
            return redirect()->back()->with('error', 'Ha ocurrido un error, verifica los datos enviados o tu conexion a internet');
        }
    }

    public function updateSede(Request $req)
    {
        if ($req->input('idSede') === null || $req->input('sede') === null || $req->input('descripcion') === null || $req->input('idTipoSede') === null) {
            return redirect()->back()->with('error', 'Todos los campos del formulario para editar la sede son obligatorios.');
        } else {
            $datos = [
                "sede" => $req->input('sede'),
                "descripcion" => $req->input('descripcion'),
                "idTipoSede" => $req->input('idTipoSede')
            ];
        }

        $response = Http::patch('http://localhost:3000/api/v1/Sedes/' . $req->input('idSede'), $datos);
        if ($response->status() == 200) {
            return redirect()->back()->with('success', 'Registro actualizado correctamente');
        } else {
            return redirect()->back()->with('error', 'Ha ocurrido un error, verifica los datos enviados o tu conexion a internet');
        }
    }

    public function usuarios(Request $req)
    {
        if(session('empresa')==1){
            $response = Http::get('http://localhost:3000/api/v1/Users');
        }

        if(session('empresa')>1){
            $response = Http::get('http://localhost:3000/api/v1/Users/Admin',[
                "idEmpresa"=>session('empresa')
            ]);
        }
        $usuarios = json_decode($response);
        //dd($usuarios);

        return view('Administracion.usuarios',compact('usuarios'));
    }
}
