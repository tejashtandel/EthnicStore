<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\facades\DB;
use App\Models\product;
use carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $footer = DB::table('footers')->get();

        $banner = DB::table('banners')->get();
        $catagory = DB::table('category')->get();

        $product1 = DB::select('SELECT products.image,products.product_name,products.price,products.id FROM products 
    JOIN subcategories ON products.sub_cat_id=subcategories.id
    JOIN category ON subcategories.catid=category.id
    WHERE category.id="1" AND products.flag="1"');

        $product2 = DB::select('SELECT products.image,products.product_name,products.price,products.id FROM products 
JOIN subcategories ON products.sub_cat_id=subcategories.id
JOIN category ON subcategories.catid=category.id
WHERE category.id="2" AND products.flag="1"');

        $product3 = DB::select('SELECT products.image,products.product_name,products.price,products.id FROM products 
JOIN subcategories ON products.sub_cat_id=subcategories.id
JOIN category ON subcategories.catid=category.id
WHERE category.id="3" AND products.flag="1"');

        //$slideimage = DB::table('banners')->get('banner_image', 'description');, compact('slideimage')

        return view('User.pages.index', compact('banner', 'catagory', 'product1', 'product2', 'product3', 'footer'));
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function redirects()
    {
        if (Auth::user()->role == '1') {
            $data = product::select('id', 'created_at')
                ->get()->groupBy(function ($data) {
                    return Carbon::parse($data->created_at)->format('D');
                });
            $months = [];
            $monthcount = [];
            foreach ($data as $month => $values) {
                $months[] = $month;
                $monthcount[] = count($values);
            }
            $try =  Db::table('users')->get();
            $data = DB::table('products')->get();
            $feedbacks = DB::table('contacts')->get();
            $checkouts = Db::table('checkouts')->get();
            return view('Admin.pages.index', compact('data', 'months', 'monthcount', 'try', 'data', 'feedbacks', 'checkouts'));
        }
        return redirect()->route('home.index');
    }
}
