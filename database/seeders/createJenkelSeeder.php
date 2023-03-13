<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class createJenkelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \App\Models\jenisKelamin::create(
           [
               "jenkel" => "laki laki"
           ],
           [
               "jenkel" => "laki laki"
           ]
       );
    }
}
