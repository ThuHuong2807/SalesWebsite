<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class registered extends Model
{
    protected $table ='users_registered';
    protected $primaryKey='users_registered_id';
    public $timestamp=true;
}
