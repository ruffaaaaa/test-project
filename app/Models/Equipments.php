<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipments extends Model
{
    protected $table = 'equipments';
    protected $primaryKey = 'equipmentID';
    protected $fillable = ['equipmentName'];

    public function noEquipments()
    {
        return $this->hasMany(NoEquipment::class, 'equipmentID', 'equipmentID');
    }
}
