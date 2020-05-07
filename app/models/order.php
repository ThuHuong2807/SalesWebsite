<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $table = 'order';
    public $timestamps = false;
    protected $primaryKey = 'order_id';
    
    public function attr()
    {
        return $this->hasMany('App\models\attr', 'order_id', 'order_id');
    }
    
}
