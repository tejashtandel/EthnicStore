<?php

namespace App\Http\Controllers;

use App\Models\cart;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class BrowsersController extends Controller
{
    public function index()
    {
        $browsers = DB::table('carts')
            ->select(DB::raw("MONTHNAME(created_at) as create_month"), DB::raw("COUNT(quantity) as count"))
            ->groupBy('create_month')
            ->where('carts.flagorder', 0)
            ->get()
            ->toArray();

        $dataPoints = [];

        foreach ($browsers as $browser) {

            $dataPoints[] = [
                "created_at" => $browser->create_month,
                "y" => intval($browser->count)
            ];
        }
        return view("donut-chart", [
            "data" => json_encode($dataPoints)
        ]);
    }
    public function getdata1(Request $request)
    {
        $browsers = DB::table('carts')
            ->select(DB::raw("MONTHNAME(created_at) as create_month"), DB::raw("COUNT(quantity) as count"))
            ->groupBy('create_month')
            ->where('carts.flagorder', 0)

            ->get()
            ->toArray();

        $dataPoints = [];
        foreach ($browsers as $browser) {
            $dataPoints[] = [
                "created_at" => $browser->create_month,
                "y" => intval($browser->count)
            ];
        }
        return [
            "data" => json_encode($dataPoints)
        ];
    }
    public function ajaxchart1()
    {

        return view("Admin.pages.index");
    }


    public function getdata3()
    {

        $browsers = DB::table('subcategories')
            ->select("subcategoryname", DB::raw("COUNT(products.id) as product_count"))
            ->Join('products', 'products.sub_cat_id', '=', 'subcategories.id')
            ->groupBy('subcategories.subcategoryname')
            ->where('products.flag', 1)
            ->get()
            ->toArray();

        $dataPoints = [];

        foreach ($browsers as $browser) {

            $dataPoints[] = [
                "subcategoryname" => $browser->subcategoryname,
                "y" => $browser->product_count
            ];
        }

        return [
            "data" => json_encode($dataPoints)
        ];
    }
    public function ajaxchart2()
    {

        return view("Admin.pages.index");
    }




    public function getdata2()
    {
        $count = DB::table('product_details')
            ->select("category.category_name", DB::raw("SUM(product_details.quantity) as qnt_count"))
            ->Join('category', 'product_details.catid', '=', 'category.id')
            ->groupBy('category.category_name')
            ->get()
            ->toArray();



        $count1 = DB::table('carts')
            ->Join('products', 'carts.product_id', '=', 'products.id')
            ->join('product_details', 'product_details.productid', '=', 'products.id')
            ->Join('category', 'product_details.catid', '=', 'category.id')
            ->select("category.category_name as ct2", DB::raw("SUM(carts.quantity) as qnt_count2"))
            ->where('carts.flag', 1)
            ->where('carts.flagorder', 0)

            ->groupBy('ct2')
            ->get()
            ->toArray();

        // dd($count1);
        // exit();


        $dataPoints = [];
        foreach ($count as $ct) {
            $dataPoints[] = [
                "category_name" => $ct->category_name,
                "y" => floatval($ct->qnt_count)

            ];
        }

        $dataPoints1 = [];
        foreach ($count1 as $ct) {
            $dataPoints1[] = [
                "category_name" => $ct->ct2,
                "y" => floatval($ct->qnt_count2)
            ];
        }
        return [
            "data" => json_encode($dataPoints),
            "data1" => json_encode($dataPoints1)
        ];
    }
}
