<?php

namespace App\Http\Controllers;

use App\Models\Medidor;
use Illuminate\Http\Request;

class MedidorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $medidor = Medidor::find(1);
        //$user =[];
        //$user['usuario'] = $usuario;
        /*$user['medidor'] =*/ $medidor->usuario;
        return $medidor;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function buscarMedidor($texto){
        $text = '%'.$texto.'%';
        $sql ="SELECT *
        FROM medidors
        WHERE medidors.id LIKE ? OR medidors.numero LIKE ?";
        $medidor = \DB::select($sql,array($text, $text));
        //$usuario->medidores;
        return $medidor;
    }

    public function medidorAll(){
        $sql = "
            SELECT medidors.id AS medidorId, medidors.numero AS medidor, usuarios.name AS socio,
                    medidors.estado, medicions.lecturaAct, medicions.lecturaAnt, medicions.fechaMedicion as fechaUltimaMedicion,
                    medicions.consumo, medicions.total, medicions.id AS medicionsId
                FROM medidors, usuarios, medicions
                WHERE usuarios.id = medidors.usuario_id and medidors.id = medicions.medidor_id
                      AND medicions.id =(SELECT max(id) from medicions where medicions.medidor_id= medidors.id) ";
        $medidor = \DB::select($sql);
        return $medidor;
    }
}
