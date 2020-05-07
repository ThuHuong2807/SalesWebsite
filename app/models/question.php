<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    protected $table ='user_question';
    protected $primaryKey='user_question_id';
    public $timestamp=true;
}
