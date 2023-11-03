<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationDetails extends Model
{
    protected $table = 'reservation_details';

    protected $primaryKey = 'reservedetailsID';

    protected $fillable = [
        'reservedetailsID',
        'facilityID',
        'event_name',
        'event_start_date',
        'event_end_date',
        'event_start_time',
        'event_end_time',
        'max_attendees',
        'preparation_start_date',
        'preparation_end_date',
        'preparation_start_time',
        'preparation_end_time',
        'cleanup_start_date',
        'cleanup_end_date',
        'cleanup_start_time',
        'cleanup_end_time',
    ];

    public function facility()
    {
        return $this->belongsTo(Facility::class, 'facilityID');
    }

    public function no_equipments()
    {
        return $this->belongsTo(NoEquipments::class, 'reservedetailsID', 'reservedetailsID');
    }

    public function selectedFacilities()
    {
        return $this->hasMany(SelectedFacilities::class, 'reservationdetailsID', 'reservationdetailsID');
    }

    public function reservationAttachments()
    {
        return $this->hasMany(ReservationAttachments::class, 'reservedetailsID', 'reservedetailsID');
    }
    
    public function reservee()
    {
        return $this->belongsTo(Reservee::class, 'reserveeID', 'reservedetailsID');
    }
}