<?php

use App\Http\Controllers\SearchController;
use App\Http\Livewire\AboutUsComponent;
use App\Http\Livewire\Admin\AdminAddServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminAddServiceComponent;
use App\Http\Livewire\Admin\AdminBookServicesComponent;
use App\Http\Livewire\Admin\AdminContactComponent;
use App\Http\Livewire\Admin\AdminCustomersComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminEditServiceComponent;
use App\Http\Livewire\Admin\AdminFeedbackComponent;
use App\Http\Livewire\Admin\AdminServiceCategoriesComponent;
use App\Http\Livewire\Admin\AdminServiceProvidersComponent;
use App\Http\Livewire\Admin\AdminServicesByCategoryComponent;
use App\Http\Livewire\Admin\AdminServicesComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\Customer\CustomerBookServiceComponent;
use App\Http\Livewire\Customer\CustomerDashboardComponent;
use App\Http\Livewire\Customer\CustomerProfileComponent;
use App\Http\Livewire\Customer\EditCustomerProfileComponent;
use App\Http\Livewire\FeedbackComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\Provider\EditProviderProfileComponent;
use App\Http\Livewire\Provider\ProviderBookServicesComponent;
use App\Http\Livewire\Provider\ProviderDashboardComponent;
use App\Http\Livewire\Provider\ProviderProfileComponent;
use App\Http\Livewire\ServiceCategoriesComponent;
use App\Http\Livewire\ServiceDetailsComponent;
use App\Http\Livewire\ServiceProvidersComponent;
use App\Http\Livewire\ServicesByCategoryComponent;
use App\Models\BookService;
use App\Models\ServiceProvider;
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
Route::get('/home',[HomeComponent::class,'redirect'])->middleware('auth','verified');
Route::get('/service_categories',ServiceCategoriesComponent::class)->name('home.service_categories');
Route::get('/{category_slug}/services',ServicesByCategoryComponent::class)->name('home.services_by_category');
Route::get('/service/{service_slug}',ServiceDetailsComponent::class)->name('home.service_details');
Route::get('/service_provider',ServiceProvidersComponent::class)->name('home.service_providers');

Route::get('/autocomplete',[SearchController::class,'autocomplete'])->name('autocomplete');
Route::post('/search',[SearchController::class,'searchService'])->name('searchService');

Route::get('/contact_us',ContactComponent::class)->name('home.contact');
Route::get('/about_us',AboutUsComponent::class)->name('home.about_us');
Route::get('/feedback',FeedbackComponent::class)->name('home.feedback');

Route::post('/stripe-webhook',[CustomerBookServiceComponent::class,'stripeWebhook'])->name('stripe-webhook');

#for User
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function(){
    Route::get('/customer/dashboard',CustomerDashboardComponent::class)->name('customer.dashboard');
    Route::get('/customer/profile',CustomerProfileComponent::class)->name('customer.profile');
    Route::get('/customer/profile/edit',EditCustomerProfileComponent::class)->name('customer.edit_profile');
    Route::get('/customer/book_service',CustomerBookServiceComponent::class)->name('customer.book_service');
});

#for Service Provider
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','authprovider'])->group(function(){
    Route::get('/provider/dashboard',ProviderDashboardComponent::class)->name('provider.dashboard');
    Route::get('/provider/profile',ProviderProfileComponent::class)->name('provider.profile');
    Route::get('/provider/profile/edit',EditProviderProfileComponent::class)->name('provider.edit_profile');
    Route::get('/provider/book_services',ProviderBookServicesComponent::class)->name('provider.book_services');
});

#for Admin
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified','authadmin'])->group(function(){
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/service_categories',AdminServiceCategoriesComponent::class)->name('admin.service_categories');
    Route::get('/admin/service_category/add',AdminAddServiceCategoryComponent::class)->name('admin.add_service_category');
    Route::get('/admin/service_category/edit/{category_id}',AdminEditServiceCategoryComponent::class)->name('admin.edit_service_category');
    Route::get('/admin/all_services',AdminServicesComponent::class)->name('admin.all_services');
    Route::get('/admin/{category_slug}/services',AdminServicesByCategoryComponent::class)->name('admin.services_by_category');
    Route::get('/admin/service/add',AdminAddServiceComponent::class)->name('admin.add_service');
    Route::get('/admin/service/edit/{service_slug}',AdminEditServiceComponent::class)->name('admin.edit_service');
    Route::get('/admin/service_provider',AdminServiceProvidersComponent::class)->name('admin.service_providers');
    Route::get('/admin/customers',AdminCustomersComponent::class)->name('admin.customers');
    Route::get('/admin/contacts',AdminContactComponent::class)->name('admin.contacts');
    Route::get('/admin/feedbacks',AdminFeedbackComponent::class)->name('admin.feedback');
    Route::get('/admin/book_services',AdminBookServicesComponent::class)->name('admin.book_services');

    Route::get('admin/contacts/pdf',[AdminContactComponent::class,'createPDF'])->name('admin.contacts_pdf');
    Route::get('admin/feedbacks/pdf',[AdminFeedbackComponent::class,'createPDF'])->name('admin.feedback_pdf');
    Route::get('admin/service_providers/pdf',[AdminServiceProvidersComponent::class,'createPDF'])->name('admin.service_provider_pdf');
    Route::get('admin/customers/pdf',[AdminCustomersComponent::class,'createPDF'])->name('admin.customer_pdf');
});
