<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    public function attribute()
    {
        return $this->belongsToMany('App\Model\Attribute');
    }

    public function value()
    {
        return $this->belongsToMany('App\Model\Value');
    }

    public function product()
    {
        return $this->belongsToMany('App\Model\Product');
    }


}
