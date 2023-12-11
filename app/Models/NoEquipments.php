<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoEquipments extends Model
{
    protected $table = 'no_equipment';

    protected $primaryKey = 'no_equipmentID';
    protected $fillable = ['equipmentID', 'total_no', 'reservedetailsID'];


    public function equipment()
    {
        return $this->belongsTo(Equipments::class, 'equipmentID', 'equipmentID');
    }

    public function reservationDetail()
    {
        return $this->belongsTo(ReservationDetails::class, 'reservedetailsID', 'reservedetailsID');
    }
}
