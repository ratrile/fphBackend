<?php

namespace App\Http\Controllers;

use App\Models\Medicion;

use Illuminate\Http\Request;

class MedicionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    	return Medicion::create([
    		'lecturaAnt'=>$request->get('lecturaAnt'),
	        'lecturaAct'=>$request->get('lecturaAct'),
	        'fechaMedicion'=>$request->get('fechaMedicion'),
	        'consumo'=>$request->get('consumo'),
	        'pagado'=>$request->get('pagado'),
	        'total'=>$request->get('total'),
	        'medidor_id'=>$request->get('medidor_id'),
    	]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $sql ="UPDATE medicions
                  SET lecturaAct = ?, consumo=?, total=?
                  WHERE medicions.id=?;";
        $medicion = \DB::select($sql,array($request->get('lecturaAct'),$request->get('consumo'),$request->get('total'),
            $request->get('medicionsId')));
        return $medicion;
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


    public function UltimaLectura($id){
    	$sql ="SELECT medicions.lecturaAct
				FROM medidors, medicions
				WHERE medidors.id=medicions.medidor_id AND
				  medicions.id =(SELECT max(id) from medicions where medicions.medidor_id= ?)";
    	$medicion = \DB::select($sql,array($id));
    	return $medicion;
    }
}
