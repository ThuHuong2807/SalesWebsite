<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table ='product';
    protected $primaryKey='product_id';
    public function category()
    {
        return $this->belongsTo('App\models\category', 'category_id', 'category_id');
    }
    public function values()
    {
        return $this->belongsToMany('App\models\values', 'values_product', 'product_id','values_id');
    }
    
    public function variant()
    {
        return $this->hasMany('App\models\variant', 'product_id', 'product_id');
    }
    public function meta()
    {
        return $this->hasMany('App\models\meta', 'product_id', 'product_id');
    }
    
}
