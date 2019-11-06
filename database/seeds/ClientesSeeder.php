<?php
use App\Cliente;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*factory(Cliente::class, 10)->create();*/
        DB::table('clientes')->insert([
			'id' => 1 ,
			'nombre' => 'Mariano Pendeivis',
			'direccion' =>"Av. arequipa 367" ,
			'email' => 'marianito@hotmail.com',
			'telefono' => "8909711" ,
			'celular' => "353713666",
			'empresa' => "Peyton S.A.C" ,
			'documento_identificacion' => 'Pasaporte',
			'numero_documento' => "78175846",
			'created_at' => '2019-10-30 11:36:57',
			'updated_at' => "2019-10-30 11:36:57" ,
		]);
		DB::table('clientes')->insert([
			'id' => 2 ,
			'nombre' => 'Mario bross',
			'direccion' =>"Av. Peru 3647" ,
			'email' => 'bross@hotmail.com',
			'telefono' => "95623" ,
			'celular' => "9512354525",
			'empresa' => "Perifericos S.A.C" ,
			'documento_identificacion' => 'DNI',
			'numero_documento' => "72586522",
			'created_at' => '2019-10-30 11:36:57',
			'updated_at' => "2019-10-30 11:36:57" ,
		]);
		DB::table('clientes')->insert([
			'id' => 3 ,
			'nombre' => 'Cristofer Pendeivis',
			'direccion' =>"Av. Las Rosas 888" ,
			'email' => 'Cristofer@hotmail.com',
			'telefono' => "43432423" ,
			'celular' => "55435234",
			'empresa' => "Glotia S.A.C" ,
			'documento_identificacion' => 'DNI',
			'numero_documento' => "7817582346",
			'created_at' => '2019-10-30 11:36:57',
			'updated_at' => "2019-10-30 11:36:57" ,
		]);
		DB::table('clientes')->insert([
			'id' => 4 ,
			'nombre' => 'Papa Fransisco ',
			'direccion' =>"Av. Romas 367" ,
			'email' => 'papita_lays@hotmail.com',
			'telefono' => "546456" ,
			'celular' => "786789657",
			'empresa' => "San Luis S.A.C" ,
			'documento_identificacion' => 'Pasaporte',
			'numero_documento' => "2223243443",
			'created_at' => '2019-10-30 11:36:57',
			'updated_at' => "2019-10-30 11:36:57" ,
		]);
		DB::table('clientes')->insert([
			'id' => 5 ,
			'nombre' => 'Julio Flores ',
			'direccion' =>"Av. Molina xD 367" ,
			'email' => 'Flores@hotmail.com',
			'telefono' => "546564" ,
			'celular' => "767453453",
			'empresa' => "Floreria Julio S.A.C" ,
			'documento_identificacion' => 'DNI',
			'numero_documento' => "45654654",
			'created_at' => '2019-10-30 11:36:57',
			'updated_at' => "2019-10-30 11:36:57" ,
		]);
		DB::table('clientes')->insert([
			'id' => 6 ,
			'nombre' => 'Susy Dias',
			'direccion' =>"Av. locas 555" ,
			'email' => 'loquita_maz_naa@hotmail.com',
			'telefono' => "5656" ,
			'celular' => "7865754645",
			'empresa' => "Cucardas S.A.C" ,
			'documento_identificacion' => 'Pasaporte',
			'numero_documento' => "54646456",
			'created_at' => '2019-10-30 11:36:57',
			'updated_at' => "2019-10-30 11:36:57" ,
		]);
		DB::table('clientes')->insert([
			'id' => 7 ,
			'nombre' => 'LGsus de Nazaret',
			'direccion' =>"Av. Belen 367" ,
			'email' => 'Campanas_de_belen@hotmail.com',
			'telefono' => "345646547" ,
			'celular' => "57567546535",
			'empresa' => "LG S.A.C" ,
			'documento_identificacion' => 'DNI',
			'numero_documento' => "787687",
			'created_at' => '2019-10-30 11:36:57',
			'updated_at' => "2019-10-30 11:36:57" ,
		]);
		DB::table('clientes')->insert([
			'id' => 8 ,
			'nombre' => 'Mario hart',
			'direccion' =>"Av. Comas xD 367" ,
			'email' => 'hart@hotmail.com',
			'telefono' => "56756753" ,
			'celular' => "1123213445",
			'empresa' => "Regueton S.A.C" ,
			'documento_identificacion' => 'DNI',
			'numero_documento' => "543453434",
			'created_at' => '2019-10-30 11:36:57',
			'updated_at' => "2019-10-30 11:36:57" ,
		]);
		DB::table('clientes')->insert([
			'id' => 9 ,
			'nombre' => 'Paloma fiusa',
			'direccion' =>"Av. Nido 555" ,
			'email' => 'Axe_baia@hotmail.com',
			'telefono' => "567345345" ,
			'celular' => "6555345",
			'empresa' => "Maiz S.A.C" ,
			'documento_identificacion' => 'DNI',
			'numero_documento' => "546456456",
			'created_at' => '2019-10-30 11:36:57',
			'updated_at' => "2019-10-30 11:36:57" ,
		]);
		DB::table('clientes')->insert([
			'id' => 10 ,
			'nombre' => 'Batman de la noche',
			'direccion' =>"Av. Gotica 367" ,
			'email' => 'BAti_correo@hotmail.com',
			'telefono' => "45654654" ,
			'celular' => "78565324",
			'empresa' => "Mursielagos S.A.C" ,
			'documento_identificacion' => 'Pasaporte',
			'numero_documento' => "6575435",
			'created_at' => '2019-10-30 11:36:57',
			'updated_at' => "2019-10-30 11:36:57" ,
		]);
/*hola peee xD*/
    }
}