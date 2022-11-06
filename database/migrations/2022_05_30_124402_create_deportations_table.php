<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeportationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deportations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')->nullable();
            $table->text('description');
            $table->string('product_name');
            $table->string('location_name')->nullable();
            $table->string('location_address')->nullable();
            $table->string('deported_name');
            $table->double('value');
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
        Schema::dropIfExists('deportations');
    }
}
