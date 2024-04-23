<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function filterbottom(Request $request)
    {
        // dd(
        //     $request->all()
        // );
        // exit();

        $subcat = $request->subcat;
        $size = $request->size;
        $price = $request->price;

        // dd($size);
        // exit();




        $products = DB::table('products')
            ->join('subcategories', 'products.sub_cat_id', '=', 'subcategories.id')
            ->join('product_details', 'products.id', '=', 'product_details.productid')

            ->join('category', 'category.id', '=', 'subcategories.catid')
            ->where('category.id',2)
            ->where('products.flag',1);

        // dd($products);
        // exit();

        if (isset($subcat)) {
            $subcat_filter = implode(',', $subcat);
            $products = $products->whereIn('subcategories.subcategoryname', $subcat)->where('category.id', 2);
        }

        if (isset($size)) {
            $size_filter = implode(',', $size);
            $products = $products->whereIn('product_details.size', $size)->where('category.id', 2);
        }
        if (isset($price)) {


            for ($i = 0; $i < count($price); $i++) {
               
            
                    $products = $products->whereBetween('products.price', [$price[$i][0],$price[$i][1]])->where('category.id', 2);
            }
            //   $price_filter = implode(',', $price);
        
        }

        $products = $products->select('products.id as pid', 'products.product_name', 'products.price', 'products.image')->get();
        //    dd($products);
        //     exit();

        if (count($products) > 0) {

            return response()->json([
                'success' => true,
                'products' => $products,
                'msg' => 'success'
            ]);
        } else {
            return response()->json([
                'products' => $products,
                'msg' => 'no record found'
            ]);
        }
    }
    public function filtertop(Request $request)
    {
        // dd(
        //     $request->all()
        // );
        // exit();

        $subcat = $request->subcat;
        $size = $request->size;
        $price = $request->price;

      
        // dd($price);
        // exit();
    



        $products = DB::table('products')
            ->join('subcategories', 'products.sub_cat_id', '=', 'subcategories.id')
            ->join('product_details', 'products.id', '=', 'product_details.productid')

            ->join('category', 'category.id', '=', 'subcategories.catid')
            ->where('category.id',1);

        // dd($products);
        // exit();




        // if (isset($cat[0])) {
        //     $cat_filter = implode(',', $cat);
        //     $products = $products->where('products.category_id', $cat);
        // }

        if (isset($subcat[0])) {
            $subcat_filter = implode(',', $subcat);
            $products = $products->whereIn('subcategories.subcategoryname', $subcat)->where('category.id', 1);
        }

        if (isset($size[0])) {
            $size_filter = implode(',', $size);
            $products = $products->whereIn('product_details.size', $size)->where('category.id', 1);
        }
        if (isset($price)) {


            for ($i = 0; $i < count($price); $i++) {
               
            
                    $products = $products->whereBetween('products.price', [$price[$i][0],$price[$i][1]])->where('category.id', 1);
            }
            //   $price_filter = implode(',', $price);
        
        }

        $products = $products->select('products.id as pid', 'products.product_name', 'products.price', 'products.image')->get();

        // $products=DB::table('products')->select('*')->where('price','<',500)->get();
        //    dd($products);
        //     exit();

        if (count($products) > 0) {

            return response()->json([
                'success' => true,
                'products' => $products,
                'msg' => 'success'
            ]);
        } else {
            return response()->json([
                'products' => $products,
                'msg' => 'no record found'
            ]);
        }
    }
    public function filterethic(Request $request)
    {
        // dd(
        //     $request->all()
        // );
        // exit();

        $subcat = $request->subcat;
        $size = $request->size;
        $price = $request->price;

        // dd($size);
        // exit();




        $products = DB::table('products')
            ->join('subcategories', 'products.sub_cat_id', '=', 'subcategories.id')
            ->join('product_details', 'products.id', '=', 'product_details.productid')

            ->join('category', 'category.id', '=', 'subcategories.catid')
            ->where('category.id',3);

        // dd($products);
        // exit();




        // if (isset($cat[0])) {
        //     $cat_filter = implode(',', $cat);
        //     $products = $products->where('products.category_id', $cat);
        // }

        if (isset($subcat[0])) {
            $subcat_filter = implode(',', $subcat);
            $products = $products->whereIn('subcategories.subcategoryname', $subcat)->where('category.id', 3);
        }

        if (isset($size[0])) {
            $size_filter = implode(',', $size);
            $products = $products->whereIn('product_details.size', $size)->where('category.id', 3);
        }
        if (isset($price)) {


            for ($i = 0; $i < count($price); $i++) {
               
            
                    $products = $products->whereBetween('products.price', [$price[$i][0],$price[$i][1]])->where('category.id', 3);
            }
            //   $price_filter = implode(',', $price);
        
        }


        $products = $products->select('products.id as pid', 'products.product_name', 'products.price', 'products.image')->get();
        //    dd($products);
        //     exit();

        if (count($products) > 0) {

            return response()->json([
                'success' => true,
                'products' => $products,
                'msg' => 'success'
            ]);
        } else {
            return response()->json([
                
                'products' => $products,
                'msg' => 'no record found'
            ]);
        }
    }
}
