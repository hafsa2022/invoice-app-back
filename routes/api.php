<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceItemController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CarController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(UserController::class)->group(function () {


        Route::post('login','getUser');

        Route::post('updateinfo','updateInfo');

});

Route::controller(InvoiceController::class)->group(function () {

        Route::get('getinvoices/{userId}','getInvoices');

        Route::post('addinvoice','addInvoice');

        Route::delete('deleteinvoice/{id}','deleteInvoice');

        Route::get('editinvoice/{id}','editInvoice');

        Route::post('updateinvoice','updateInvoice');



});

Route::controller(InvoiceItemController::class)->group(function () {

        Route::delete('deleteinvoiceitem/{id}','deleteInvoiceItem');

});


Route::controller(ClientController::class)->group(function () {

        Route::get('getclients','getClients');

});

Route::controller(CarController::class)->group(function () {

        Route::get('getcars','getCars');

});


Route::get('/upload-invoice/{id}', [PdfController::class,'generatePdf']);


