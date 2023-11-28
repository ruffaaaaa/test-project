<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportPersonnel extends Model
{
    
    protected $table = 'no_support_personnel';
    protected $primaryKey = 'no_support_personnelID';
    protected $fillable = ['personnelID', 'total_no', 'reservedetailsID'];

    // Define relationships with other models
    public function supportPersonnel()
    {
        return $this->belongsTo(Personnels::class, 'personnelID', 'personnelID');
    }
    public function reservationDetail()
    {
        return $this->belongsTo(ReservationDetails::class, 'reservedetailsID', 'reservedetailsID');
    }
    
}
