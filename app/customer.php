<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected  $table='customer';
    protected $primaryKey='cus_id';
    public $timestamps=false;

}
