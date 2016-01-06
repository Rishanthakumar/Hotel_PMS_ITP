<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    protected  $table='company';
    protected $primaryKey='cus_id';
    public $timestamps=false; //
}
