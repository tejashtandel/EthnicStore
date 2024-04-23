<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use Illuminate\Support\facades\DB;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\bannerController;
use App\Http\Controllers\footerController;
use App\Http\Controllers\productController;
use App\Http\Controllers\brandController;
use App\Http\Controllers\productdetailController;
use App\Http\Controllers\subcategoryController;
use App\Http\Controllers\headersController;
use App\Http\Controllers\aboutsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\reportController;
use App\Http\Controllers\userdetailController;
use App\Http\Controllers\userinfoController;
use App\Http\Controllers\stockController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\bottomController;
use App\Http\Controllers\ethicController;
use App\Http\Controllers\productReportController;
use App\Http\Controllers\topController;
use App\Http\Controllers\contcatController;
use App\Http\Controllers\buynowController;
use App\Http\Controllers\feedbackController;
use App\Http\Controllers\feedbackreportController;
use App\Http\Controllers\orderreportController;
use App\Http\Controllers\UserreportController;
use App\Http\Controllers\BrowserController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\BrowsersController;
use App\Http\Controllers\BrowserControllerbar;
use App\Http\Controllers\refreshbarController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\GooglePieController;
use App\Models\product;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return redirect()->route('home.index');
});
Route::get('bill', function () {
    return view('User.pages/billingpage');
});



Route::get('about', function () {

    $footer = DB::table('footers')->get();
    $about = DB::table('abouts')->where('flag', 1)->limit(1)->get();

    return view('User.pages/about', compact('footer', 'about'));
});

Route::get('cart', function () {
    return view('User.pages/cart1');
});

Route::get('checkout', function () {
    return view('User.pages/checkout');
});

Route::get('termsandcondition', function () {

    $footer = DB::table('footers')->get();
    return view('User.pages/terms&condition', compact('footer'));
});

Route::get('login', [LoginController::class, 'login'])->name('login');

Route::resource('home', HomeController::class);


//for footer 
Route::get('head', function () {
    $header = DB::table('headers')->get();



    return view('User.include.header', compact('header'));
});

Auth::routes();
Route::get('redirect', [App\Http\Controllers\HomeController::class, 'redirects'])->name('redirect');


Route::get('prod/{id}', function ($id) {


    $details = DB::table('products')
        ->join('product_details', 'products.id', '=', 'product_details.productid')
        ->join('brands', 'product_details.brandid', '=', 'brands.id')
        ->where('products.id', $id)
        ->get(['products.id as pID', 'products.*', 'product_details.*', 'brands.*']);

    $product1 = DB::select('SELECT products.image,products.product_name,products.price,products.id FROM products 
JOIN subcategories ON products.sub_cat_id=subcategories.id
JOIN category ON subcategories.catid=category.id
WHERE category.id="4"');


    $footer = DB::table('footers')->get();
    return view('User.pages.product', compact('details', 'product1', 'footer'));
});

// Route::resource('userdetails', userinfoController::class);


Route::resource('userdetails', userdetailController::class);
Route::resource('userdetails/{userdetail}/$id', userdetailController::class);

Route::resource('cart', cartController::class);
Route::get('cartd', [cartController::class, 'destroy'])->name('cartd');
Route::post('cartu', [cartController::class, 'update'])->name('cartu');

Route::resource('bottom', bottomController::class);
Route::resource('ethic', ethicController::class);
Route::resource('top', topController::class);
Route::resource('contact', contcatController::class);
Route::resource('bill', buynowController::class);
Route::resource('order', orderController::class);

Route::get('carttry', [cartController::class, 'try'])->name('carttry');
Route::get('filterbottom', [FilterController::class, 'filterbottom'])->name('filterbottom');
Route::get('filtertop', [FilterController::class, 'filtertop'])->name('filtertop');
Route::get('filterethic', [FilterController::class, 'filterethic'])->name('filterethic');




Route::get('try', function () {
    $header = DB::table('headers')->get();


    $product2 = DB::select('SELECT products.image,products.product_name,products.price,products.id,subcategories.subcategoryname  FROM products 
        JOIN subcategories ON products.sub_cat_id=subcategories.id
        JOIN category ON subcategories.catid=category.id
        WHERE category.id="17"');

    return view('User.pages.new', compact('header', 'product2'));
});


///------------------------------------------------------------------------------------------------------/////
///------------------------------------------------------------------------------------------------------/////
///------------------------------------------------------------------------------------------------------/////
////For Admin Routes


Route::get('index', function () {

    if (Auth::check()) {

        if (Auth::user()->role == '1') {


            $try =  Db::table('users')->get();

            $data = DB::table('products')->get();
            $feedbacks = DB::table('contacts')->get();
            $checkouts = Db::table('checkouts')->get();


            return view('Admin.pages/index', compact('try', 'data', 'feedbacks', 'checkouts'));
        } else {
            return "You are Not  A Admin";
        }
    }
});
// Route::get('category', function () {
//     return view('pages/category');
// });


//Route::get('category', [categoryController::class, 'index']); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');


Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
//for category
// Route::POST('index','App\Http\Controllers\categoryController@index');
//Route::get('demo', 'App\Http\Controllers\categoryController@create');
//Route::POST('store', 'App\Http\Controllers\categoryController@store');
Route::resource('category', categoryController::class);

//for sub category
Route::resource('subcategory', subcategoryController::class);
//Route::get('sub_cate_create', 'App\Http\Controllers\subcategoryController@create');
//Route::post('sub_cate_store', 'App\Http\Controllers\subcategoryController@store');

//Authentication
Auth::routes();

//for banners
Route::resource('banners', bannerController::class);
// Route::get('banner_create', 'App\Http\Controllers\bannerController@create');
// Route::post('banner_store', 'App\Http\Controllers\bannerController@store');


//for footer
Route::resource('footers', footerController::class);
//Route::get('footer_create','App\Http\Controllers\footerController@create');
//Route::post('footer_store','App\Http\Controllers\footerController@store');
Route::resource('header', headersController::class);
// Route::get('headers', [headersController::class, 'index']);
// Route::get('head_create', 'App\Http\Controllers\headersController@create');
// Route::post('head_store', 'App\Http\Controllers\headersController@store');
// Route::put('head_edit', 'App\Http\Controllers\headerController@update');

//for products

//Route::get('create_product', 'App\Http\Controllers\ProductController@create');
//Route::post('product_store', 'App\Http\Controllers\productController@store');
Route::resource('products', productController::class);

//for Brands
//Route::get('brand', [brandController::class, 'index']);
//Route::get('brand_create', 'App\Http\Controllers\brandController@create');
//Route::post('brand_store', 'App\Http\Controllers\brandController@store');
Route::resource('brand', brandController::class);


//for Product Details
//Route::get('product_detail', [productdetailController::class, 'index']);
//Route::get('product_detail_create', 'App\Http\Controllers\productdetailController@create');
//Route::post('product_detail_store', 'App\Http\Controllers\productdetailController@store');
Route::resource('product_detail', productdetailController::class);

//For About Us
Route::resource('abouts', aboutsController::class);
//For User Details
Route::resource('users', userdetailController::class);
Route::get('/edit1/{id}', [userdetailController::class, 'edit'])->name('edit');
Route::get('/update1/{id}', [userdetailController::class, 'update1'])->name('update1');
//For Stocks
Route::resource('stocks', stockController::class);
//For Reports
Route::resource('report', reportController::class);
Route::resource('proreport', productReportController::class);
Route::get('search', [productreportController::class, 'search'])->name('search');

//For Charts
Route::resource('charts', GooglePieController::class);
Route::resource('chart', AdminController::class);

Route::get('ajaxchart', [BrowserController::class, 'ajaxchart']);
Route::get('getdata', [BrowserController::class, 'getdata']);

Route::get('/ajaxchart1', [BrowsersController::class, 'ajaxchart1'])->name('ajaxchart1');
Route::get('/getdata1', [BrowsersController::class, 'getdata1'])->name('getdata1');
Route::get('/getdata2', [BrowsersController::class, 'getdata2'])->name('getdata2');
Route::get('/getdata3', [BrowsersController::class, 'getdata3'])->name('getdata3');

//For Feedback
Route::resource('feedback', feedbackController::class);

//For User Report
Route::resource('userreport', UserreportController::class);
Route::get('searchu', [UserreportController::class, 'searchu'])->name('searchu');

//For Feedback Report
Route::resource('feedbackreport', feedbackreportController::class);
Route::get('searchf', [feedbackreportController::class, 'searchf'])->name('searchf');


//For Order Report
Route::resource('orderreport', orderreportController::class);
Route::get('searcho', [orderreportController::class, 'searcho'])->name('searcho');

//Refresh bar charts
Route::get('getbarchart1', [refreshbarController::class, 'getbarchart1'])->name('getbarchart1');
