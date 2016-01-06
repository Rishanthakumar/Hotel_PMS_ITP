<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class changes_log extends Model
{
    protected  $table='changes_log';
    protected $primaryKey='log_id';
    public $timestamps=false;
}
