<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyVentasRegistroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ventas_registro', function (Blueprint $table) {

            // $table->unsignedBigInteger('id_vendedor')->nullable();
            // $table->foreign('id_vendedor')->references('id')->on('personal_ventas')->onDelete('cascade');

            $table->unsignedBigInteger('id_facturacion')->nullable();
            $table->foreign('id_facturacion')->references('id')->on('facturacion')->onDelete('cascade');
            

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
