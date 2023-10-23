<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personnels extends Model
{
    protected $table = 'support_personnels';
    protected $primaryKey = 'personnelID';
    protected $fillable = ['personnelName'];
}
