<?php

use App\Http\Controllers\admin\invoicesController;
use App\Http\Controllers\admin\PropretyController;
use App\Http\Controllers\admin\rentPropertyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\tenantController;
use App\Models\Property;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');


/*** Properties ***/
Route::get('/properties' , [PropretyController::class , 'index'])->name('properties_index');
Route::get('/properties/add' , [PropretyController::class , 'index_add'])->name('property_add');
Route::post('/properties/add' , [PropretyController::class , 'store'])->name('property.store');
Route::get('/properties/edit/{id}' , [PropretyController::class ,'index_edit']);
Route::post('/propetries/edit' , [PropretyController::class , 'update' ])->name('property.edit');


/*** Tenants ***/
Route::get('/tenants' , [tenantController::class , 'index'])->name('tenants_index');
Route::get('/tenants/add' , [tenantController::class , 'index_add'])->name('tenant_add');
Route::post('/tenants/add' , [tenantController::class , 'store'])->name('tenant.store');
Route::get('/tenants/edit/{id}' , [tenantController::class , 'index_edit'])->name('index_edit');
Route::post('/tenant/edit' , [tenantController::class , 'update'])->name('tenant.edit');
Route::get('/tenant/delete/{id}' , [tenantController::class , 'destroy'])->name('tenant.delete');



/*** Rent Properties  ***/
Route::get('/rented_properties' , [rentPropertyController::class , 'index'])->name('rented_properties');
Route::get('/rent_property' , [rentPropertyController::class , 'rent_index']);
Route::post('/rent_property' , [rentPropertyController::class , 'store'])->name('rent_property');
Route::get('/rented_property/{id}', [rentPropertyController::class , 'property_index']);
Route::get('/getTenant/{id}' , [rentPropertyController::class , 'getTenant']);
Route::get('/getProperty/{id}' , [rentPropertyController::class , 'getProperty']);



/** Generate Invoices */
Route::get('/generate_invoices' , [invoicesController::class , 'index'])->name('invoices_index');
Route::get('/generate_invoices/{id}' , [invoicesController::class , 'get_contract'])->name('get_contract');
Route::post('/generate_pdf' , [invoicesController::class , 'generate_pdf'])->name('generate_pdf');


