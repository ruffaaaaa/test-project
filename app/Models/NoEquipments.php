<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoEquipments extends Model
{
    protected $table = 'no_equipment'; // Specify the table name

    protected $primaryKey = 'no_equipmentID'; // Specify the primary key 
    protected $fillable = ['equipmentID', 'total_no', 'reservedetailsID'];


    // Define relationships if you have any, for example:
    
    // A NoEquipment belongs to an Equipment
    public function equipment()
    {
        return $this->belongsTo(Equipment::class, 'equipmentID', 'equipmentID');
    }

    public function reservationDetail()
    {
        return $this->belongsTo(ReservationDetails::class, 'reservedetailsID', 'reservedetailsID');
    }
}
