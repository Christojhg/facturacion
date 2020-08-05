<?php

use Illuminate\Database\Seeder;

class ProductosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('productos')->insert([
            'id' => 1 ,
            'codigo_producto' => 'BRTH-000001',
            'codigo_original' => '4WE6J62 EG24N9K4',
            'nombre' =>'VALVULA DIRECCIONAL DOBLE BOBINA' ,
            'utilidad' => '69',
            'descuento1' => "0",
            'descuento2' => "0",
            'descuento_maximo' => "0",
            'descripcion' => '0',
            'origen' => "Importado",
            'garantia' => '12 meses',
            'peso' => '0 kl',
            'stock_minimo' => '2',
            'stock_maximo' => '5',
            'foto' => 'defecto.png',
            'categoria_id' =>"2" ,
            'familia_id' => '1',
            'marca_id' => "1" ,
            'unidad_medida_id' => "1",
            'estado_id' => "1",
            'estado_anular'=>'1',
            'created_at' => '2020-08-01 11:36:57',
            'updated_at' => "2020-08-01 11:36:58" ,
        ]);

        DB::table('productos')->insert([
            'id' => 2 ,
            'codigo_producto' => 'BRTH-000002',
            'codigo_original' => '4WE6G62 EG24N9K4',
            'nombre' =>'VALVULA DIRECCIONAL DOBLE BOBINA' ,
            'utilidad' => '69',
            'descuento1' => "0",
            'descuento2' => "0",
            'descuento_maximo' => "0",
            'descripcion' => '0',
            'origen' => "Importado",
            'garantia' => '12 meses',
            'peso' => '0 kl',
            'stock_minimo' => '2',
            'stock_maximo' => '2',
            'foto' => 'defecto.png',
            'categoria_id' =>"2" ,
            'familia_id' => '1',
            'marca_id' => "1" ,
            'unidad_medida_id' => "1",
            'estado_id' => "1",
            'estado_anular'=>'1',
            'created_at' => '2020-08-01 11:36:57',
            'updated_at' => "2020-08-01 11:36:58" ,
        ]);

        DB::table('productos')->insert([
            'id' => 3 ,
            'codigo_producto' => 'BRTH-000003',
            'codigo_original' => '4WE6D62 EG24N9K4',
            'nombre' =>'VALVULA DIRECCIONAL SIMPLE BOBINA' ,
            'utilidad' => '69',
            'descuento1' => "0",
            'descuento2' => "0",
            'descuento_maximo' => "0",
            'descripcion' => '0',
            'origen' => "Importado",
            'garantia' => '12 meses',
            'peso' => '0 kl',
            'stock_minimo' => '2',
            'stock_maximo' => '6',
            'foto' => 'defecto.png',
            'categoria_id' =>"2" ,
            'familia_id' => '1',
            'marca_id' => "1" ,
            'unidad_medida_id' => "1",
            'estado_id' => "1",
            'estado_anular'=>'1',
            'created_at' => '2020-08-01 11:36:57',
            'updated_at' => "2020-08-01 11:36:58" ,
        ]);

        DB::table('productos')->insert([
            'id' => 4 ,
            'codigo_producto' => 'BRTH-000004',
            'codigo_original' => 'A10VO45DFR1 31R-PSC62K02',
            'nombre' =>'BOMBAS HIDRAULICAS DE PISTONES' ,
            'utilidad' => '37',
            'descuento1' => "0",
            'descuento2' => "0",
            'descuento_maximo' => "0",
            'descripcion' => '0',
            'origen' => "Importado",
            'garantia' => '12 meses',
            'peso' => '0 kl',
            'stock_minimo' => '1',
            'stock_maximo' => '2',
            'foto' => 'defecto.png',
            'categoria_id' =>"2" ,
            'familia_id' => '2',
            'marca_id' => "1" ,
            'unidad_medida_id' => "1",
            'estado_id' => "1",
            'estado_anular'=>'1',
            'created_at' => '2020-08-01 11:36:57',
            'updated_at' => "2020-08-01 11:36:58" ,
        ]);

        DB::table('productos')->insert([
            'id' => 5 ,
            'codigo_producto' => 'BRTH-000005',
            'codigo_original' => 'A10VO28DFR1 31R-PSC62K02',
            'nombre' =>'BOMBAS HIDRAULICAS DE PISTONES' ,
            'utilidad' => '37',
            'descuento1' => "0",
            'descuento2' => "0",
            'descuento_maximo' => "0",
            'descripcion' => '0',
            'origen' => "Importado",
            'garantia' => '12 meses',
            'peso' => '0 kl',
            'stock_minimo' => '1',
            'stock_maximo' => '2',
            'foto' => 'defecto.png',
            'categoria_id' =>"2" ,
            'familia_id' => '2',
            'marca_id' => "1" ,
            'unidad_medida_id' => "1",
            'estado_id' => "1",
            'estado_anular'=>'1',
            'created_at' => '2020-08-01 11:36:57',
            'updated_at' => "2020-08-01 11:36:58" ,
        ]);

        DB::table('productos')->insert([
            'id' => 6 ,
            'codigo_producto' => 'VIEA-000001',
            'codigo_original' => 'V10 1P6P 1C 20',
            'nombre' =>'BOMBAS SIMPLE DE PALETAS ' ,
            'utilidad' => '6',
            'descuento1' => "0",
            'descuento2' => "0",
            'descuento_maximo' => "0",
            'descripcion' => '0',
            'origen' => "Importado",
            'garantia' => '12 meses',
            'peso' => '0 kl',
            'stock_minimo' => '1',
            'stock_maximo' => '2',
            'foto' => 'defecto.png',
            'categoria_id' =>"2" ,
            'familia_id' => '3',
            'marca_id' => "2" ,
            'unidad_medida_id' => "1",
            'estado_id' => "1",
            'estado_anular'=>'1',
            'created_at' => '2020-08-01 11:36:57',
            'updated_at' => "2020-08-01 11:36:58" ,
        ]);

        DB::table('productos')->insert([
            'id' => 7 ,
            'codigo_producto' => 'VIEA-000002',
            'codigo_original' => 'V20 1P11P 1C 11',
            'nombre' =>'BOMBAS SIMPLE DE PALETAS ' ,
            'utilidad' => '56',
            'descuento1' => "0",
            'descuento2' => "0",
            'descuento_maximo' => "0",
            'descripcion' => '0',
            'origen' => "Importado",
            'garantia' => '12 meses',
            'peso' => '0 kl',
            'stock_minimo' => '1',
            'stock_maximo' => '2',
            'foto' => 'defecto.png',
            'categoria_id' =>"2" ,
            'familia_id' => '3',
            'marca_id' => "2" ,
            'unidad_medida_id' => "1",
            'estado_id' => "1",
            'estado_anular'=>'1',
            'created_at' => '2020-08-01 11:36:57',
            'updated_at' => "2020-08-01 11:36:58" ,
        ]);

        DB::table('productos')->insert([
            'id' => 8 ,
            'codigo_producto' => 'VIEA-000003',
            'codigo_original' => 'V20 1P13P 1C 11',
            'nombre' =>'BOMBAS SIMPLE DE PALETAS ' ,
            'utilidad' => '56',
            'descuento1' => "0",
            'descuento2' => "0",
            'descuento_maximo' => "0",
            'descripcion' => '0',
            'origen' => "Importado",
            'garantia' => '12 meses',
            'peso' => '0 kl',
            'stock_minimo' => '1',
            'stock_maximo' => '2',
            'foto' => 'defecto.png',
            'categoria_id' =>"2" ,
            'familia_id' => '3',
            'marca_id' => "2" ,
            'unidad_medida_id' => "1",
            'estado_id' => "1",
            'estado_anular'=>'1',
            'created_at' => '2020-08-01 11:36:57',
            'updated_at' => "2020-08-01 11:36:58" ,
        ]);

        DB::table('productos')->insert([
            'id' => 9 ,
            'codigo_producto' => 'VIEA-000004',
            'codigo_original' => 'DG4V32CMUD660',
            'nombre' =>'VALVULAS DIRECCIONAL VICKERS' ,
            'utilidad' => '71',
            'descuento1' => "0",
            'descuento2' => "0",
            'descuento_maximo' => "0",
            'descripcion' => '0',
            'origen' => "Importado",
            'garantia' => '12 meses',
            'peso' => '0 kl',
            'stock_minimo' => '1',
            'stock_maximo' => '6',
            'foto' => 'defecto.png',
            'categoria_id' =>"2" ,
            'familia_id' => '1',
            'marca_id' => "2" ,
            'unidad_medida_id' => "1",
            'estado_id' => "1",
            'estado_anular'=>'1',
            'created_at' => '2020-08-01 11:36:57',
            'updated_at' => "2020-08-01 11:36:58" ,
        ]);

        DB::table('productos')->insert([
            'id' => 10 ,
            'codigo_producto' => 'VIEA-000005',
            'codigo_original' => 'DGMC23AT GWBTGW 41',
            'nombre' =>'VALVULAS DIRECCIONAL VICKERS' ,
            'utilidad' => '58',
            'descuento1' => "0",
            'descuento2' => "0",
            'descuento_maximo' => "0",
            'descripcion' => '0',
            'origen' => "Importado",
            'garantia' => '12 meses',
            'peso' => '0 kl',
            'stock_minimo' => '1',
            'stock_maximo' => '3',
            'foto' => 'defecto.png',
            'categoria_id' =>"2" ,
            'familia_id' => '1',
            'marca_id' => "2" ,
            'unidad_medida_id' => "1",
            'estado_id' => "1",
            'estado_anular'=>'1',
            'created_at' => '2020-08-01 11:36:57',
            'updated_at' => "2020-08-01 11:36:58" ,
        ]);

        DB::table('productos')->insert([
            'id' => 11 ,
            'codigo_producto' => 'HEN-000001',
            'codigo_original' => ' KCB33.3',
            'nombre' =>'ELECTROBOMBA' ,
            'utilidad' => '48',
            'descuento1' => "0",
            'descuento2' => "0",
            'descuento_maximo' => "0",
            'descripcion' => '0',
            'origen' => "Importado",
            'garantia' => '12 meses',
            'peso' => '0 kl',
            'stock_minimo' => '1',
            'stock_maximo' => '3',
            'foto' => 'defecto.png',
            'categoria_id' =>"2" ,
            'familia_id' => '4',
            'marca_id' => "4" ,
            'unidad_medida_id' => "1",
            'estado_id' => "1",
            'estado_anular'=>'1',
            'created_at' => '2020-08-01 11:36:57',
            'updated_at' => "2020-08-01 11:36:58" ,
        ]);

        DB::table('productos')->insert([
            'id' => 12 ,
            'codigo_producto' => 'HK-000001',
            'codigo_original' => 'CB-B25',
            'nombre' =>'BOMBA DE ENGRANAJE' ,
            'utilidad' => '7',
            'descuento1' => "0",
            'descuento2' => "0",
            'descuento_maximo' => "0",
            'descripcion' => '0',
            'origen' => "Importado",
            'garantia' => '12 meses',
            'peso' => '0 kl',
            'stock_minimo' => '1',
            'stock_maximo' => '4',
            'foto' => 'defecto.png',
            'categoria_id' =>"2" ,
            'familia_id' => '4',
            'marca_id' => "3" ,
            'unidad_medida_id' => "1",
            'estado_id' => "1",
            'estado_anular'=>'1',
            'created_at' => '2020-08-01 11:36:57',
            'updated_at' => "2020-08-01 11:36:58" ,
        ]);

        DB::table('productos')->insert([
            'id' => 13 ,
            'codigo_producto' => 'HK-000002',
            'codigo_original' => 'CB-B125',
            'nombre' =>'BOMBA DE ENGRANAJE' ,
            'utilidad' => '82',
            'descuento1' => "0",
            'descuento2' => "0",
            'descuento_maximo' => "0",
            'descripcion' => '0',
            'origen' => "Importado",
            'garantia' => '12 meses',
            'peso' => '0 kl',
            'stock_minimo' => '1',
            'stock_maximo' => '2',
            'foto' => 'defecto.png',
            'categoria_id' =>"2" ,
            'familia_id' => '4',
            'marca_id' => "3" ,
            'unidad_medida_id' => "1",
            'estado_id' => "1",
            'estado_anular'=>'1',
            'created_at' => '2020-08-01 11:36:57',
            'updated_at' => "2020-08-01 11:36:58" ,
        ]);

        DB::table('productos')->insert([
            'id' => 14 ,
            'codigo_producto' => 'HEN-000001',
            'codigo_original' => 'RY50-32-160',
            'nombre' =>'BOMBA CENTRIFUGA' ,
            'utilidad' => '52',
            'descuento1' => "0",
            'descuento2' => "0",
            'descuento_maximo' => "0",
            'descripcion' => '0',
            'origen' => "Importado",
            'garantia' => '12 meses',
            'peso' => '0 kl',
            'stock_minimo' => '1',
            'stock_maximo' => '2',
            'foto' => 'defecto.png',
            'categoria_id' =>"2" ,
            'familia_id' => '4',
            'marca_id' => "4" ,
            'unidad_medida_id' => "1",
            'estado_id' => "1",
            'estado_anular'=>'1',
            'created_at' => '2020-08-01 11:36:57',
            'updated_at' => "2020-08-01 11:36:58" ,
        ]);

        DB::table('productos')->insert([
            'id' => 15 ,
            'codigo_producto' => 'HEN-000002',
            'codigo_original' => 'YCB20-0.6G',
            'nombre' =>'BOMBA DE ENGRANAJE' ,
            'utilidad' => '44',
            'descuento1' => "0",
            'descuento2' => "0",
            'descuento_maximo' => "0",
            'descripcion' => '0',
            'origen' => "Importado",
            'garantia' => '12 meses',
            'peso' => '0 kl',
            'stock_minimo' => '1',
            'stock_maximo' => '3',
            'foto' => 'defecto.png',
            'categoria_id' =>"2" ,
            'familia_id' => '4',
            'marca_id' => "4" ,
            'unidad_medida_id' => "1",
            'estado_id' => "1",
            'estado_anular'=>'1',
            'created_at' => '2020-08-01 11:36:57',
            'updated_at' => "2020-08-01 11:36:58" ,
        ]);
    }
}