<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservation_details', function (Blueprint $table) {
            $table->string('reservedetailsID', 255);
            $table->bigInteger('facilityID')->unsigned()->index();
            $table->string('event_name', 255);
            $table->date('start_date');
            $table->date('end_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->bigInteger('max_attendees');
            $table->date('preparation_start_date');
            $table->date('preparation_end_date');
            $table->time('preparation_start_time');
            $table->time('preparation_end_time');
            $table->date('cleanup_start_date');
            $table->date('cleanup_end_date');
            $table->time('cleanup_start_time');
            $table->time('cleanup_end_time');
            $table->primary('reservedetailsID');
            $table->foreign('facilityID')->references('facilityID')->on('facilities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation');
    }
};
