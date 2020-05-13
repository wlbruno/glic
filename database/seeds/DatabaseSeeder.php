<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *s
     * @return void
     */
    public function run()
    {
           $this->call([
            PlanosTableSeeder::class,
            UsuariosTableSeeder::class,
            SolicitantesTableSeed::class,
            PerfisTableSeed::class,
            PermissionsTableSeed::class,
        ]);
     }

}
