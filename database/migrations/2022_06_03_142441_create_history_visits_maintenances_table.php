<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryVisitsMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_visits_maintenances', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->text('description')->nullable();
            $table->integer('maintenance_id');
            $table->enum('status', ['done', 'not_done'])->default('not_done');
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
        Schema::dropIfExists('history_visits_maintenances');
    }
}
