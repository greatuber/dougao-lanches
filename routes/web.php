<?php

use App\Http\Controllers\AdressController;
use App\Http\Controllers\CartModelController;
use App\Http\Controllers\CartOrderController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderProductController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\bomboniereController;
use App\Http\Controllers\deliveredController;
use App\Http\Controllers\deliveryController;
use App\Http\Controllers\pdfController;
use App\Http\Controllers\productionController;
use App\Http\Controllers\statusController;
use App\Http\Controllers\statusRefusedController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//    crud
// Route::get('/produts',ProjectCreate::class);

Route::get('/create',[CreateController::class,'index'])->name('create.product');
Route::post('/store',[CreateController::class, 'store'])->name('store.product');
Route::delete('/delete/{id}',[CreateController::class, 'delete'])->name('delete.product');
Route::put('/update/{id}',[CreateController::class, 'update'])->name('update.product');
                
Route::get('/showbeer',[ShowController::class, 'show'])->name('showbeer');
Route::get('/showcombo',[ShowController::class, 'shows'])->name('showcombo');
Route::get('/showbomboniere',[bomboniereController::class, 'show'])->name('show.bomboniere');

// view client

Route::get('/dashboard',[ClientController::class, 'index'])->middleware('auth')->name('client.show');
Route::get('/beer',[ShowController::class,'index'])->name('users.beer');
Route::get('/combo',[ShowController::class, 'combo'])->name('user.combo');
Route::get('/bomboniere',[bomboniereController::class, 'index'])->name('user.bomboniere');

        // cart

Route::post('/cartstore/{id}',[OrderProductController::class, 'store'])->name('store.cart');
Route::post('/cartberr/{id}',[OrderProductController::class, 'storebeer'])->name('storebeer');
Route::get('/cartshow', [OrderProductController::class, 'show'])->name('cart.show');
Route::post('/delete/{id}',[OrderProductController::class, 'delete'])->name('cart.delete');

   //adress

Route::post('/adress',[AdressController::class, 'create'])->name('adress.create');

// order

Route::get('/showorder', [adminController::class, 'index'])->name('order.show'); 
Route::post('/adminCreateCart',[adminController::class, 'store'])->name('admin.create');

// update in status

Route::post('/updateStatus/{id}', [adminController::class, 'update'])->name('update.status');

//   rota de status dos pedidos
Route::post('/statusrefused,{id}',[statusRefusedController::class, 'update'])->name('refused.status');
Route::get('/statusAceito', [statusController::class, 'index'])->name('status.aceito');
Route::post('/updateProduct,{id}', [statusController::class, 'update'])->name('status.product');

Route::get('/production', [productionController::class, 'index'])->name('production.index');
Route::post('/updateDelivery,{id}', [productionController::class, 'update'])->name('status.delivery');

Route::get('/delivery', [deliveryController::class, 'index'])->name('status.fordelivery');
Route::post('/delivered,{id}',[deliveryController::class, 'update'])->name('status.fordelivered');

Route::get('/delivereds',[deliveredController::class, 'index'])->name('status.delivered');

    //   controller que vai gerar pdf para impressão

Route::post('/pdf,{id}',[pdfController::class, 'index'])->name('pdf.index');
 
        // rota que imprimir de fato
Route::post('/pdfimprimi,{id}',[pdfController::class, 'create'])->name('pdfimprimi');
        
require __DIR__.'/auth.php';
