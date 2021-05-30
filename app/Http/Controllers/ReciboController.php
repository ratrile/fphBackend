<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Spatie\Browsershot\Browsershot;
use App\Models\Medicion;
use App\Models\Recibo;


class ReciboController extends Controller
{
    /**
     *
     */
    public function medidorMedicion($idMedidor){
        $sql="SELECT me.lecturaAnt, me.lecturaAct, me.fechaMedicion, me.consumo,
                me.total, re.fechaEmision, me.pagado, me.id as medicion_id, me.medidor_id as id_medidor,
                month(me.fechaMedicion) AS mes , year(me.fechaMedicion) AS anio
            FROM medicions me LEFT JOIN recibos re ON
                (me.id = re.medicion_id)
            WHERE me.medidor_id = ?;";

        $listamedicionMedidor = \DB::select($sql,array($idMedidor));

        return $listamedicionMedidor;
    }

    public function pdf(){
//        $Browsershot = new Browsershot();
        $pdf =Browsershot::url('http://localhost:4200/pages/recibo')
//            ->setNodeBinary(config('services.nodejs.node_path'))
//            ->setNpmBinary(config('services.nodejs.npm_path'))
            ->deviceScaleFactor(1)
            ->setOption('scale', 0.90)
            ->noSandbox()
            ->ignoreHttpsErrors()
            ->setDelay(2000)
            ->showBackground()
            ->margins(10, 10, 10, 10)
            ->emulateMedia('print')
            ->save('example.pdf');
        return response($pdf)->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', "inline;filename= raul");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sql ="UPDATE medicions
                set pagado = 1
                WHERE medicions.id=? ;";
        $medicion = \DB::select($sql,array($request->get('medicion_id')));
//        return $medicion;
        $recibo= Recibo::create([
            'fechaEmision'=>$request->get('fechaEmision'),
            'total'=>$request->get('total'),
            'periodo'=>$request->get('periodo'),
            'medicion_id'=>$request->get('medicion_id'),
            ]);
        return $recibo;
    }

    //
    public function cuerpoRecibo($idMedicion){
        $sql="SELECT usuarios.name, medidors.numero, medicions.fechaMedicion, medicions.consumo, medicions.total,
            usuarios.id AS idUser
            FROM medicions, medidors, usuarios
            WHERE usuarios.id=medidors.usuario_id AND  medidors.id=medicions.medidor_id
            AND medicions.id = ? ";

        $listamedicionMedidor = \DB::select($sql,array($idMedicion));

        return $listamedicionMedidor;
    }

    public function maxId(){
        $sql="SELECT MAX(re.id) as max FROM recibos AS re";
        $maxId= \DB::select($sql);
        return$maxId;
    }

    public function copia($idMedicion){
        $sql="SELECT us.name, us.id, me.numero, med.fechaMedicion, med.consumo, med.total,
                re.id as idRecibo, re.fechaEmision
                FROM usuarios AS us, medidors AS me, medicions AS med, recibos AS re
                WHERE us.id = me.usuario_id AND me.id = med.medidor_id and med.id = re.medicion_id AND
                med.id = ?";

        $listamedicionMedidor = \DB::select($sql,array($idMedicion));

        return $listamedicionMedidor;
    }
}
