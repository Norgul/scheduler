<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEqupmentMethodMethodColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment_method_method_column', function (Blueprint $table) {
            $table->integer('equipment_method_id')->unsigned();
            $table->integer('method_column_id')->unsigned();

            $table->foreign('equipment_method_id')->references('id')->on('equipment_methods')->onDelete('cascade');
            $table->foreign('method_column_id')->references('id')->on('method_columns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipment_method_method_column');
    }
}
