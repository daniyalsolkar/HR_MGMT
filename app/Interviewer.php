<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interviewer extends Model
{
    //
      protected $guarded=['id'];
      protected $fillable=['name','email_id','experience','position_applied'];
}
