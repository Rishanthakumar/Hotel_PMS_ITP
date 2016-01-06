<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class duplicate extends Model
{
    protected  $table='duplicate';
    protected $primaryKey='cus_id';
    public $timestamps=false;
}
