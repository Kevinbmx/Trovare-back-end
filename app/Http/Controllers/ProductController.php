<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){
        return response()
        ->json([
            // 'model' => Product::filterPaginateOrder()
            'model'=>Product::where('user_id', auth()->id())->with('categories')->filterPaginateOrder()
        ]);
        // return Product::where('user_id', auth()->id())->with('categories')->filterPaginateOrder();
        // return Product::with('users')->get();
        //  $id = $this->Auth::user();
        //  return $id;
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
            // 'hasChildren' => 'required'
        ]);
            // return $request;
        $uuid = Uuid::generate(1);
        $IdUser = auth()->id();
        $product = Product::create([
            'name' => $request->name,
            'modelo' => $request->modelo,
            'quantity' => $request->quantity,
            'brand' => $request->brand,
            'price' => $request->price,
            'category_id' =>$request->category_id,
            'peso' => $request->peso,
            'alto' => $request->alto,
            'ancho'=> $request->ancho,
            'fondo'=> $request->fondo,
            'parent_id'=> $request->parent_id,
            // 'hasChildren' => $request->hasChildren,
            'uniqueCode'=>$uuid,
            'statusProduct_id'=>$request->statusProduct_id,
            'user_id'=> $IdUser,
            'description'=>'tiene esto con esto'
        ]);
        $productObj = Product::find($product->id);
      
        return response()
            ->json([
                'response' => 'success',
                'saved' => true,
                'objProduct'=>$productObj,
            ]);
        // $allproduct= $this->index();
        // return response($allproduct, 201);
    }

    public function update(Request $request, Product $product)
    {
      
    }

    public function destroy(Product $product )
    {  
       
    }
  
}
