<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InterViewerRound2 extends Model
{
	protected $table='interviewroundtwo';
    protected $fillable=['id','email_id','communication','program_logic','puzzle','data_structure','total','status'];
}
