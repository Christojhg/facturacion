<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
			'id' => 1 ,
			'codigo' => '001',
			'descripcion' => 'GARANTIAS',
			'created_at' => date('2019-08-01 00:00:00'),
           	'updated_at' => date('2019-08-01 00:00:00')
		]);

		DB::table('categorias')->insert([
			'id' => 2 ,
			'codigo' => '002',
			'descripcion' => 'PRODUCTOS',
			'created_at' => date('2019-08-01 00:00:00'),
           	'updated_at' => date('2019-08-01 00:00:00')
		]);

		DB::table('categorias')->insert([
			'id' => 3 ,
			'codigo' => '003',
			'descripcion' => 'SERVICIOS',
			'created_at' => date('2019-08-01 00:00:00'),
           	'updated_at' => date('2019-08-01 00:00:00')
		]);


    }
}
