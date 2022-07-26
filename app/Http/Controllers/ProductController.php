<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts(Request $request)
    {
        $prod = Product::All();

        return [
            'here you go' => $prod
        ];
    }

    public function getProduct(Request $request, $id)
    {
        $prod = Product::findOrFail($id);

        return [
            'here you go' => $prod
        ];
    }

    public function storeProduct(Request $request)
     {
         $prod = new Product();
         
         $prod->user_id = auth()->user()->id; 
         $prod->name = $request->name;
         $prod->price = $request->price;
         $prod->amount = $request->amount;
         $prod->barcode = $request->barcode;
         $prod->save();

         return [
             'successfully' => $prod
         ];
     }

     public function updateProduct(Request $request, $id)
     {
         $prod = Product::findOrFail($id);

         $prod->user_id = auth()->user()->id; 
         $prod->name = $request->name;
         $prod->price = $request->price;
         $prod->amount = $request->amount;
         $prod->barcode = $request->barcode;
         $prod->save();

         return [
             'successfully' => $prod
         ];
     }
}
