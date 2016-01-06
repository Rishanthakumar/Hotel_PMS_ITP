<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class individual extends Model
{
    protected  $table='individual';
    protected $primaryKey='cus_id'; //
    public $timestamps=false;

    protected $fillable = [
        'cus_id',
        'fname',
        'lname',
        'price',
        'NIC_passport',


    ];

}
