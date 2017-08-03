<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Interviewer extends Model
{
    //
    use CrudTrait;
      protected $guarded=['id'];
      protected $fillable=['name','email_id','experience','position_applied'];
}
