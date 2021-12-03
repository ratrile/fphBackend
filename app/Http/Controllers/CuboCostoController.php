<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cuboCosto;

class CuboCostoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql ="SELECT *
              FROM cubo_costos";
        $costoCubo = \DB::select($sql);
        //$usuario->medidores;
        return $costoCubo;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $costoCubo= cuboCosto::create([
            'cantidadMinimaCubo'=>$request->get('cantidadMinimaCubo'),
            'costoMinimoConsumo'=>$request->get('costoMinimoConsumo'),
            'costoCuboAdicional'=>$request->get('costoCuboAdicional'),
            'activo'=>$request->get('activo'),
            'detalle'=>$request->get('detalle'),
        ]);
        return $costoCubo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $sql ="UPDATE cubo_costos
              SET cantidadMinimaCubo = ?, costoMinimoConsumo= ?, costoCuboAdicional = ?, activo=?
              WHERE id=?";
        $updateCostoCubo = \DB::select($sql,array($request->get('cantidadMinimaCubo'), $request->get('costoMinimoConsumo'),
            $request->get('costoCuboAdicional'), $request->get('activo'), $request->get('id')));

        return $updateCostoCubo;
    }

    public function selecionar(Request $request)
    {

        $sql1 ="SELECT id
              FROM cubo_costos
              WHERE activo=1";
        $idAnterior = \DB::select($sql1);
        $tmp =  $idAnterior[0]->id;

        $sql2 ="UPDATE cubo_costos
              SET activo=?
              WHERE id=?";
        $updateDesactivo = \DB::select($sql2,array(0, $tmp));

        $sql ="UPDATE cubo_costos
              SET activo=?
              WHERE id=?";
        $updateActivo = \DB::select($sql,array(1, $request->get('id')));

        return $updateActivo;
    }

    public function tarifaActual(){
        $sql1 ="SELECT *
              FROM cubo_costos
              WHERE activo=1";
        $idAnterior = \DB::select($sql1);
        return $idAnterior;
    }
}
