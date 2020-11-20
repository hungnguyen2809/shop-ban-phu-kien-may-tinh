<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDetailswh extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailswh', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_rw');
            $table->bigInteger('id_product');
            $table->integer('quantity');
            $table->decimal('price');
            $table->string('service_code');
            $table->integer('warranty_preiod');
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
        Schema::dropIfExists('detailswh');
    }
}
