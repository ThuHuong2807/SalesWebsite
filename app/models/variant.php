<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class variant extends Model
{
    protected $table ='variant';
    public $timestamp=true;
    protected $primaryKey='variant_id';
    public function values()
    {
        return $this->belongsToMany('App\models\values', 'variant_values', 'variant_id', 'values_id');
    }
}
