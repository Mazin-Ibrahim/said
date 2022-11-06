<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenancesPaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenances_payment_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('maintenance_id');
            $table->enum('status', ['paid', 'not_paid']);
            $table->double('amount');
            $table->date('date');
            $table->text('description')->nullable();
            $table->string('reciver_name')->nullable();
            $table->string('recipient_name')->nullable();
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
        Schema::dropIfExists('maintenances_payment_details');
    }
}
