<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyFacturacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('facturacion', function (Blueprint $table) {

            $table->string('orden_compra')->nullable();
            $table->string('guia_remision')->nullable();

            $table->unsignedBigInteger('id_cotizador')->nullable();
            $table->foreign('id_cotizador')->references('id')->on('cotizacion')->onDelete('cascade');

            // Facturador Independiente
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');

            $table->unsignedBigInteger('moneda_id')->nullable();
            $table->foreign('moneda_id')->references('id')->on('monedas')->onDelete('cascade');

            $table->unsignedBigInteger('forma_pago_id')->nullable();
            $table->foreign('forma_pago_id')->references('id')->on('forma_pago')->onDelete('cascade');

            $table->string('fecha_emision')->nullable();
            $table->string('fecha_vencimiento')->nullable();

            $table->string('estado');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
