<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{
    protected $table = "vehicle";
    protected $primaryKey = "vehicle_no";
    public $timestamps = false;
}
