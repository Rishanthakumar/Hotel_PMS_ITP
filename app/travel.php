<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class travel extends Model
{
    protected  $table='travel_agent';
    protected $primaryKey='cus_id';
    public $timestamps=false;  //
}
