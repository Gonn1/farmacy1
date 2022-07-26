<?php

namespace App\Http\Controllers;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function getSales(Request $request)
    {
        $sale = Sale::All();

        return $sale;

    }

    public function storeSale(Request $request)
    {
        $sale = new Sale;
        
        $sale->seller_id = $request->seller_id;
        $sale->product_id = $request->product_id;
        $sale->total = $request->total;
        $sale->amount = $request->amount;
        $sale->save();

        return [
            'successfully' => $sale
        ];
    }
}