<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use League\Csv\Reader;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        if (!ini_get("auto_detect_line_endings")) {
            ini_set("auto_detect_line_endings", '1');
        }

        $csv = Reader::createFromPath('database/seeders/usuarios.csv', 'r');

        $csv->setDelimiter(';');

        $csv->setHeaderOffset(0);
        $records = $csv->getRecords();

        foreach ($records as $r) {
            $usuario = new Usuario();
            $usuario->id = utf8_encode($r['ID']);
            $usuario->name = $r['name'];
            $usuario->ci = $r['ci'];
            $usuario->direccion = $r['direccion'];
            $usuario->detalle = $r['detalle'];
            $usuario->save();
        }
    }
}
