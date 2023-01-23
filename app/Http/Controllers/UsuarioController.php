<?php

namespace App\Http\Controllers;

use App\Models\Medicion;
use App\Models\Medidor;
use App\Models\Usuario;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$usuario = Usuario::find(1);
        //$user =[];
        //$user['usuario'] = $usuario;
        /*$user['medidor'] =*/
        //$usuario->medidores;
        //return $usuario;
        $sql ="SELECT us.id as idUsuario, us.name, 
                us.ci, us.direccion, me.id as idMedidor, me.numero
                FROM usuarios AS us, medidors AS me
                WHERE us.id = me.usuario_id";
        $usuario = \DB::select($sql);
        //$usuario->medidores;
        return $usuario;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $usuario= Usuario::create([
            'name'=>$request->get('name'),
            'ci'=>$request->get('ci'),
            'direccion'=>$request->get('direccion'),
            'detalle'=>$request->get('detalle'),
        ]);

        $medidor = Medidor::create([
            'numero'=> $request->get('numero'),
            'estado'=> true,
            'fecha'=> $request->get('fecha'),
            'usuario_id'=>$usuario->id,
        ]);
        $medicion = Medicion::create([
            'lecturaAnt'=>0,
            'lecturaAct'=>0,
            'fechaMedicion'=>'1985/01/01',
            'consumo'=>0,
            'pagado'=>'1',
            'total'=>0,
            'medidor_id'=>$medidor->id,
        ]);
        return $medicion;
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

    // * @param  int  $id
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request);
        $sql ="UPDATE usuarios
                SET name = ?, ci = ?, direccion = ? 
                WHERE id =?";
        $usuario = \DB::select($sql,array($request->get('name'), $request->get('ci'),
                        $request->get('direccion'), $request->get('idUsuario')));
        $sql1 ="UPDATE  medidors
                  SET numero = ?
                  WHERE id =?";

        $medidor = \DB::select($sql1,array($request->get('numero'), $request->get('idMedidor')));
        return $usuario;
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

    public function buscarUsuario($texto){
        $text = '%'.$texto.'%';
        $sql ="SELECT *
        FROM usuarios
        WHERE usuarios.id LIKE ? OR usuarios.ci LIKE ?";
        $usuario = \DB::select($sql,array($text, $text));
        //$usuario->medidores;
        return $usuario;
    }
}
