<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
  
    protected $fillable = ['name', 'parent_id'];

    protected $hidden = ['display_order','created_at', 'updated_at'];

    public function parent() {
        return $this->hasOne('App\model\Category', 'id', 'parent_id')->orderBy('display_order');
    }
    
    public function children() {
        return $this->hasMany('App\model\Category', 'parent_id', 'id')->orderBy('display_order');
    }
    
    public static function tree() {
        return static::with(implode('.', array_fill(0, 100, 'children')))->where('parent_id', '=', '0')->orderBy('display_order')->get();
    }


    public function products(){
        return $this->hasOne('App\model\Product');
    }
}
