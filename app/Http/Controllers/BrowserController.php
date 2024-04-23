<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;
use Illuminate\Support\Facades\DB;

class BrowserController extends Controller
{
    public function index()
    {
        $browsers = DB::table('category')
            ->join('subcategories', 'subcategories.catid', '=', 'category.id')
            ->join('products', 'products.sub_cat_id', '=', 'subcategories.id')
            ->select(
                'category.category_name as name',
                DB::raw("(COUNT(products.id)) as count")
            )
            ->where('category.flag', 1)
            ->where('products.flag', 1)
            ->where('subcategories.flag',1)
            ->groupBy('category.id', 'category.category_name')
            ->get()
            ->toArray();

        $dataPoints = [];

        foreach ($browsers as $browser) {

            $dataPoints[] = [
                "category_name" => $browser->name,
                "y" => $browser->count
            ];
        }
        return view("pie-chart", [
            "data" => json_encode($dataPoints)
        ]);
    }
    public function getdata()
    {

        $browsers = DB::table('category')
            ->select("category_name", DB::raw("COUNT(products.id) as count"))
            ->Join('subcategories', 'subcategories.catid', '=', 'category.id')
            ->Join('products', 'products.sub_cat_id', '=', 'subcategories.id')
            ->groupBy('category.category_name')
            ->where('category.flag', 1)
            ->where('products.flag', 1)
            ->where('subcategories.flag',1)
            ->get()
            ->toArray();


        $dataPoints = [];

        foreach ($browsers as $browser) {

            $dataPoints[] = [
                "category_name" => $browser->category_name,
                "y" => $browser->count
            ];
        }

        return [
            "data" => json_encode($dataPoints)
        ];
    }
    public function ajaxchart()
    {

        return view("Admin.pages.index");
    }
}
