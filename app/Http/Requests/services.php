<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class services extends Model
{
    protected $table = 'services';
    protected $primaryKey = 'service_id';
    public $timestamps = false;
}
