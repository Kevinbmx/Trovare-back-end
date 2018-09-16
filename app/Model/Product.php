<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Support\FilterPaginateOrder;
use App\model\Category;

class Product extends Model
{
    use FilterPaginateOrder;
    protected $table = 'product';
    protected $fillable = [
        'name', 'modelo', 'quantity', 'brand', 'price','category_id', 'peso','alto','ancho','fondo','parent_id','uniqueCode',
    ];
    protected $filter = [
        'id', 'name', 'modelo', 'quantity', 'brand', 'price','category_id', 'peso','alto','ancho','fondo','parent_id','uniqueCode','created_at'
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id');

    }
}
