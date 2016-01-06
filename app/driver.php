<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class driver extends Model
{
    protected $table = "driver";
    protected $primaryKey = "driver_id";
    public $timestamps = false;
}
