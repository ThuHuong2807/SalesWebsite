<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class attribute extends Model
{
    protected $table ='attribute';
    public $timestamp=true;
    protected $primaryKey='attribute_id';
    
    public function values()
    {
        return $this->hasMany('App\models\values', 'attr_id', 'attribute_id');
    }
    
}
