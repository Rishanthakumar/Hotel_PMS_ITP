<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pending_pd_payment extends Model
{
    protected $table = "pending_pd_payment";
    protected $primaryKey = "pp_id";
    public $timestamps = false;
}
