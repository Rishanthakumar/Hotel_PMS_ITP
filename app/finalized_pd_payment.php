<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class finalized_pd_payment extends Model
{
    protected $table = "finalized_pd_payment";
    protected $primaryKey = "fp_id";
    public $timestamps = false;
}
