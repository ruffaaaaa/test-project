<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('no_equipment', function (Blueprint $table) {
        $table->increments('no_equipmentID');
        $table->string('equipmentID');
        $table->integer('total_no');
        $table->string('reservedetailsID');
        $table->timestamps();
        
    
        $table->foreign('reservedetailsID')
            ->references('reservedetailsID')
            ->on('reservation_details');
    });
}


};
