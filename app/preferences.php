<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class preferences extends Model
{

    protected  $table='preference';
    protected $primaryKey='pr_id';
    public $timestamps=false;

}
