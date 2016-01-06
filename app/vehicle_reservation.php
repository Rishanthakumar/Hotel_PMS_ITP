<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicle_reservation extends Model
{
    protected $table = "vehicle_reservation";
    protected $primaryKey = "vr_id";
    public $timestamps = false;

}
