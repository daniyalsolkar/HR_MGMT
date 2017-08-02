<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InterViewerRound1 extends Model
{
    //
    protected $fillable=['id','email_id','Section_1_marks','Section_2_marks','Section_3_marks','Total',
                         'Status'];
}
