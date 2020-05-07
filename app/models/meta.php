<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class meta extends Model
{
    protected $table = 'product_meta';
    public $timestamps = true;
    protected $primaryKey = 'product_meta_id';
}
