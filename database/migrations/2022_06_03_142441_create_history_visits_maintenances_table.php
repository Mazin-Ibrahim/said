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
            $table->foreignId('maintenance_id');
            $table->enum('status', ['paid', 'not_paid'])->nullable();
            $table->double('amount')->nullable();
            $table->date('date')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('worker_id')->nullable();
            $table->string('worker_name')->nullable();
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
