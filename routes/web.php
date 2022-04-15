<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\CoupunController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MoyasarController;
use App\Http\Controllers\ShopController;
use App\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/', [MainController::class,'index'])->name('main.index');
Route::get('/shop', [ShopController::class,'index'])->name('shop.index');
Route::get('/shop/{product}', [ShopController::class,'show'])->name('shop.show');
//cart route
Route::get('/cart', [CartController::class,'index'])->name('cart.index');
Route::post('/cart', [CartController::class,'store'])->name('cart.store');
Route::get('/cart/clear', [CartController::class,'clear'])->name('cart.clear');
Route::post('/cart/destroy/{id}', [CartController::class,'destroy'])->name('cart.destroy');

Route::patch('/cart/update/{id}', [CartController::class,'update'])->name('cart.update');

Route::post('/cart/saveditems', [CartController::class,'savedItems'])->name('cart.saveditems');
Route::get('/cart/clearfromsavedlater', [CartController::class,'clearfromsavedlater'])->name('cart.clearfromsavedlater');

Route::get('/checkout', [CheckOutController::class,'index'])->name('checkout.index');


Route::get('moyasar',[MoyasarController::class,'index'])->name('moyasar.index');
Route::post('moyasar',[MoyasarController::class,'pay'])->name('moyasar.pay');
Route::get('moyasar/payment',[MoyasarController::class,'payment'])->name('moyasar.payment');
Route::get('moyasar/thanks',[MoyasarController::class,'thanks'])->name('moyasar.thanks');

Route::delete('/coupun', [CoupunController::class,'destroy'])->name('coupun.destroy');
Route::post('/coupun', [CoupunController::class,'store'])->name('coupun.store');
Route::get('payobj',function()
{
//     $paymentService = new \Moyasar\Providers\PaymentService();
//     // $payment = $paymentService->fetch('d732d272-9c3b-4ff2-9f00-8eacd79165b7');
//     $allpayment = $paymentService->All();
//     // d732d272-9c3b-4ff2-9f00-8eacd79165b7
//    return Response()->json($allpayment);
//    dd($payment);

    $pro = Product::find(1);
    foreach ($pro->categories as $cat) 
    {
        // echo $cat->category_name . "<br>";
        echo $cat->pivot->created_at;
    }
})->name('payobj');

// Route::view('/cart','pages/cart')->name('cart');
Route::post('/cart/{cart}',[CartController::class,'saveForLater'])->name('cart.saveforlater');
Route::view('/about','pages/about')->name('about');
Route::view('/blog','pages/blog')->name('blog');
// Route::view('/checkout','pages/checkout');
Route::view('/thankyou','pages/thankyou');




Route::get('/monti',function(){
    Auth::logout();
})->name('monti');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
