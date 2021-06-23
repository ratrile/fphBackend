<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use Illuminate\Http\Request;

class CuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql ="SELECT cu.id as idCuenta, cu.numero, 
                cu.monto, cu.entidadFinanciera
                FROM cuentas AS cu";
        $cuenta = \DB::select($sql);
        //$usuario->medidores;
        return $cuenta;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $cuenta= Cuenta::create([
            'numero'=>$request->get('numero'),
            'monto'=>$request->get('monto'),
            'entidadFinanciera'=>$request->get('entidadFinanciera'),
            'activo'=>$request-get('activo'),
        ]);
        return $cuenta;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sql ="UPDATE cuentas
                SET monto = ?
                WHERE id =?";
        $cuenta = \DB::select($sql,array($request->get('monto'), $id));

        return $cuenta;
    }

    public  function  updateActivo(Request $request, $id){
        $sql ="UPDATE cuentas
                SET activo = ?
                WHERE id =?";
        $cuenta = \DB::select($sql,array($request->get('activo'), $id));

        return $cuenta;
    }
}
