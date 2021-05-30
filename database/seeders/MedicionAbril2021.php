<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use League\Csv\Reader;

use App\Models\Medicion;

class MedicionAbril2021 extends Seeder
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

        $csv = Reader::createFromPath('database/seeders/mediciones2021.csv', 'r');

        $csv->setDelimiter(',');

        $csv->setHeaderOffset(0);
        $records = $csv->getRecords();

        foreach ($records as $r) {
            $medicion = new Medicion();
            $medicion->lecturaAnt = $r['lecturaAnt'];
            $medicion->lecturaAct = $r['lecturaAct'];
            $medicion->fechaMedicion = $r['fechaMedicion'];
            $medicion->consumo = $r['consumo'];
            $medicion->pagado = $r['pagado'];
            $medicion->total = $r['total'];
            $medicion->medidor_id = $r['medidor_id'];
            $medicion->save();
        }
    }
}
