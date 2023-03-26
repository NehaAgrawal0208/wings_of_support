<?php

use App\Http\Livewire\Admin\AdminAddServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminServiceCategoriesComponent;
use App\Http\Livewire\Customer\CustomerDashboardComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\Provider\ProviderDashboardComponent;
use App\Http\Livewire\ServiceCategoriesComponent;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',HomeComponent::class)->name('home');
Route::get('/service_categories',ServiceCategoriesComponent::class)->name('home.service_categories');

#for User
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function(){
    Route::get('/customer/dashboard',CustomerDashboardComponent::class)->name('customer.dashboard');
});

#for Service Provider
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','authprovider'])->group(function(){
    Route::get('/provider/dashboard',ProviderDashboardComponent::class)->name('provider.dashboard');
});

#for Admin
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','authadmin'])->group(function(){
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/service_categories',AdminServiceCategoriesComponent::class)->name('admin.service_categories');
    Route::get('/admin/service_category/add',AdminAddServiceCategoryComponent::class)->name('admin.add_service_category');
});
