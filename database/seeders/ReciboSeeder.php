<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use League\Csv\Reader;

use App\Models\Recibo;
use App\Models\Medicion;

class ReciboSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!ini_get("auto_detect_line_endings")) {
            ini_set("auto_detect_line_endings", '1');
        }

        $csv = Reader::createFromPath('database/seeders/recibosActual.csv', 'r');

        $csv->setDelimiter(',');

        $csv->setHeaderOffset(0);
        $records = $csv->getRecords();

        foreach ($records as $r) {
            if($r['pagado']==1){
                $recibo = new Recibo();
                $recibo->fechaEmision = $r['fechaEmision'];
                $recibo->total = $r['total'];
                $recibo->medicion_id = $r['idMedicion'];
                $recibo->save();

                $medicion = Medicion::find( $r['idMedicion']);
                $medicion->pagado = 1;
                $medicion->save();
            }
        }
    }
}
