<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;

class ProductController extends Controller
{
    public function index(){
        return response()
        ->json([
            // 'model' => Product::filterPaginateOrder()
            'model'=>Product::with('categories')->filterPaginateOrder()
        ]);
        $product = Product::find(1);
        
        //     $product = Product::with('categories')->filterPaginateOrder();
        // return $product;
        // dd( Product::all());
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',   
            'modelo' => 'required',
            'quantity' => 'required|Integer|min:0',
            'brand' => 'required',
            'price' => 'required|numeric',
            'category_id' =>'required',
            'peso' => 'required',
            'alto' => 'required',
            'ancho'=> 'required',
            'fondo'=> 'required',
            // 'parent_id'=> 'required',
            // 'uniqueCode'=> 'required',
        ]);

        $product = Product::create($request->all());

        return response()
            ->json([
                'saved' => true
            ]);
    }

    public function update(Request $request, Product $product)
    {
      
    }

    public function destroy(Product $product )
    {  
       
    }
  
}
