<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle_Packages extends Model
{
    protected $table = "vehicle_packages";
    protected $primaryKey = "package_ID";
    public $timestamps = false;
}
