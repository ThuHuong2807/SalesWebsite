<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $table = 'customer';
    public $timestamps = true;
    protected $primaryKey = 'customer_id';
    public function order()
    {
        return $this->hasMany('App\models\order', 'customer_id', 'customer_id');
    }
}
