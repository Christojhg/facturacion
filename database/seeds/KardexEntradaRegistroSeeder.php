<?php

use Illuminate\Database\Seeder;

class KardexEntradaRegistroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kardex_entrada_registro')->insert([
            'id' => 1 ,
            'kardex_entrada_id' => 1,
            'producto_id' => 1,
            'cantidad_inicial' => 1,
            'precio' => 112,
            'cantidad' => 100,
            'estado' => 1,
            
            'created_at' => date('2019-08-01 00:00:00'),
           	'updated_at' => date('2019-08-01 00:00:00')
        ]);
        
        DB::table('kardex_entrada_registro')->insert([
            'id' => 2 ,
            'kardex_entrada_id' => 1,
            'producto_id' => 1,
            'cantidad_inicial' => 1,
            'precio' => 112,
            'cantidad' => 100,
            'estado' => 1,
            
            'created_at' => date('2019-08-01 00:00:00'),
           	'updated_at' => date('2019-08-01 00:00:00')
        ]);
        
        DB::table('kardex_entrada_registro')->insert([
            'id' => 3 ,
            'kardex_entrada_id' => 1,
            'producto_id' => 1,
            'cantidad_inicial' => 1,
            'precio' => 112,
            'cantidad' => 100,
            'estado' => 1,
            
            'created_at' => date('2019-08-01 00:00:00'),
           	'updated_at' => date('2019-08-01 00:00:00')
        ]);
        
        DB::table('kardex_entrada_registro')->insert([
            'id' => 4 ,
            'kardex_entrada_id' => 1,
            'producto_id' => 1,
            'cantidad_inicial' => 1,
            'precio' => 112,
            'cantidad' => 100,
            'estado' => 1,
            
            'created_at' => date('2019-08-01 00:00:00'),
           	'updated_at' => date('2019-08-01 00:00:00')
		]);
    }
}