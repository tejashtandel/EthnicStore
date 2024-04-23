<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class refreshbarController extends Controller
{
    public function getbarchart1(Request $request)
    {
    
        // $product=DB::table('carts')
        // ->select(DB::raw("MONTHNAME(created_at) as create_month"),DB::raw("SUM(quantity) as qnt_count"))
        // ->groupBy('create_month')
        // ->orderBy(DB::raw("MONTHNAME(created_at)"))
        // ->where(DB::raw("YEAR(created_at)"),'=',$request->id)
        // ->get()
        // ->toArray();

        $count= DB::table('product_details')
        ->select("category.category_name", DB::raw("SUM(product_details.quantity) as qnt_count"))
        ->Join('category', 'product_details.catid', '=', 'category.id')
        ->groupBy('category.category_name')
        ->get()
        ->toArray();
       
     
        $count1=DB::table('carts')
        ->select("category.category_name",DB::raw("SUM(carts.quantity) as qnt_count2"))
        ->Join('products','carts.product_id','=','products.id')
        ->Join('subcategories','products.sub_cat_id','=','subcategories.id')
        ->Join('category','subcategories.catid','=','category.id')
        ->groupBy('category.category_name')
        ->where(DB::raw("YEAR(carts.created_at)"),'=',$request->id)
        ->get()
        ->toArray();
        // $count1=DB::table('carts')
        // ->Join('products', 'carts.product_id', '=', 'products.id')
        // ->join('product_details', 'product_details.productid', '=', 'products.id')
        // ->Join('category', 'product_details.catid', '=', 'category.id')
        // ->select("category.category_name as ct2", DB::raw("SUM(carts.quantity) as qnt_count2"))
        // ->where('carts.flag', 1)
        // ->where('carts.flagorder', 0)
  
        // ->groupBy('ct2')
        // ->get()
        // ->toArray();


        $dataPoints = [];
        foreach ($count as $ct) {
            $dataPoints[] = [
                "category_name" => $ct->category_name,
                "y" => floatval($ct->qnt_count)

            ];
        }



         $dataPoints1=[];
        foreach ($count1 as $ct) {
            $dataPoints1[] = [
                "category_name" => $ct->category_name,
                "y" => floatval($ct->qnt_count2)
            ];
        }
        return [
            "data" => json_encode($dataPoints),
            "data1" => json_encode($dataPoints1)
        ];
    }
}
