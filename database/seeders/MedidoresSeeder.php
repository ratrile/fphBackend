<?php

namespace Database\Seeders;

use App\Models\Medidor;
use Illuminate\Database\Seeder;
use League\Csv\Reader;

class MedidoresSeeder extends Seeder
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

        $csv = Reader::createFromPath('database/seeders/medidores.csv', 'r');

        $csv->setDelimiter(';');

        $csv->setHeaderOffset(0);
        $records = $csv->getRecords();

        foreach ($records as $r) {
            $medidor = new Medidor();
            $medidor->usuario_id = $r['usuario_id'];
            $medidor->numero = $r['numero'];
            $medidor->estado = $r['estado'];
            $medidor->fecha = $r['fecha'];
            $medidor->save();
        }
    }
}
