<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    protected  $table='member';
    protected $primaryKey='mem_id';
    public $timestamps=false;  //
}
