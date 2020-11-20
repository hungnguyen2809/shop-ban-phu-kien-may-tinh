<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblProductReview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productreview', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_product');
            $table->bigInteger('id_user');
            $table->text('content');
            $table->string('images', 2000);
            $table->integer('point');
            $table->boolean('status');
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
        Schema::dropIfExists('productreview');
    }
}
