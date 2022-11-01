<?php

use App\Http\Livewire\Admin\Product\Category\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\Product\Category\AdminCategoryComponent;
use App\Http\Livewire\Admin\Product\Category\AdminDeleteCategoryComponent;
use App\Http\Livewire\Admin\Product\Category\AdminEditCategoryComponent;

use App\Http\Livewire\Admin\Pages\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\Pages\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\Pages\AdminHomeSliderComponent;

use App\Http\Livewire\Admin\Product\Products\AdminEditProductComponent;
use App\Http\Livewire\Admin\Product\Products\AdminProductComponent;


use App\Http\Livewire\Admin\Order\AdminOrderComponent;
use App\Http\Livewire\Admin\Order\AdminOrderDetailsComponent;

use App\Http\Livewire\FrontEnd\Home\HomeComponent;
use App\Http\Livewire\FrontEnd\Shop\Cart\CartComponent;
use App\Http\Livewire\user\UserDashboardComponent;

use App\Http\Livewire\FrontEnd\Blog\BlogComponent;
use App\Http\Livewire\FrontEnd\Shop\Shopping\CategoryComponent;
use App\Http\Livewire\FrontEnd\Shop\Checkout\CheckoutComponent;
use App\Http\Livewire\FrontEnd\Contact\ContactComponent;
use App\Http\Livewire\Frontend\Shop\CustomizeOrder\CustomizeOrderComponent;
use App\Http\Livewire\FrontEnd\Shop\DetailProduct\DetailsProductComponent;
use App\Http\Livewire\FrontEnd\Search\SearchComponent;
use App\Http\Livewire\FrontEnd\Shop\Shopping\ShopComponent;
use App\Http\Livewire\User\UserOrderDetailsComponent;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Analytics;
use App\Http\Livewire\Admin\Users\ListUsers;
use App\Http\Livewire\Admin\Profile\UpdateProfile;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Contactcontroller;
use App\Http\Livewire\Admin\Appointments\ListAppointments;
use App\Http\Livewire\Admin\Appointments\CreateAppointmentForm;
use App\Http\Livewire\Admin\Appointments\UpdateAppointmentForm;
use App\Http\Livewire\Admin\Messages\ListConversationAndMessages;
use App\Http\Livewire\Admin\Settings\UpdateSetting;



use App\Http\Livewire\FrontEnd\OurCmp\AboutusComponent;
use App\Http\Livewire\Admin\Pages\AdminEditFeedbacksComponent;
use App\Http\Livewire\Admin\Pages\AdminFeedbacksComponent;

use App\Http\Livewire\FrontEnd\OurCmp\PolicyComponent;
use App\Http\Livewire\FrontEnd\OurCmp\TermsComponent;
use App\Http\Livewire\FrontEnd\Blog\FeedbackComponent;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',HomeComponent::class);
Route::get('/cart',CartComponent::class)->name('product.cart');
Route::get('/checkout',CheckoutComponent::class)->name('checkout');
Route::get('/details_product/{slug}',DetailsProductComponent::class)->name('product.details');
Route::get('/search',SearchComponent::class)->name('search.product');
Route::get('/shop',ShopComponent::class)->name('shopping');
Route::get('/shop/{category_slug}',CategoryComponent::class)->name('product.category');


Route::get('/policy',PolicyComponent::class)->name('policy');
Route::get('/terms-condion',TermsComponent::class)->name('termsCod');
Route::get('/about-us',AboutusComponent::class)->name('about-us');


// Route::get('/shop/{category_slug}', 'StaticController@index')->where('slug', 'faq|contact|something');

Route::get('/blog',BlogComponent::class)->name('blog');
Route::get('/contact',ContactComponent::class)->name('contact');
Route::get('/order',CustomizeOrderComponent::class)->name('customize.order');
Route::get('/history',BlogComponent::class)->name('product.order');
Route::get('/feedback',FeedbackComponent::class)->name('feedbacks');
Route::post('/send-email',[Contactcontroller::class,'sendEmail'])->name('send.email');
// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['auth:sanctum','verified'])->group(function(){
    Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/user/orderdetails/{id}',UserOrderDetailsComponent::class)->name('user.orderdetails');
});

    // Admin add product
    Route::get('/admin/products',AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/products/edit/{product_slug}',AdminEditProductComponent::class)->name('admin.productsEdit');
 
    

    // Admin dashboard
    Route::get('/admin/dashboard',DashboardController::class)->name('admin.dashboard'); 
    Route::get('/admin/categories',AdminCategoryComponent::class)->name('admin.category');
    Route::get('/admin/category/add',AdminAddCategoryComponent::class)->name('admin.categoryAdd');
    Route::get('/admin/category/edit/{category_slug}',AdminEditCategoryComponent::class)->name('admin.categoryEdit');
    Route::get('/admin/category/delete/{category_id}',AdminDeleteCategoryComponent::class)->name('admin.categoryDelete');
    Route::get('/admin/slider',AdminHomeSliderComponent::class)->name('admin.slider');
    Route::get('/admin/slider/add',AdminAddHomeSliderComponent::class)->name('admin.addSlider');
    Route::get('/admin/slider/edit/{slider_id}',AdminEditHomeSliderComponent::class)->name('admin.editSlider');
    Route::get('/admin/order',AdminOrderComponent::class)->name('admin.order');
    Route::get('/admin/order/details/{id}',AdminOrderDetailsComponent::class)->name('admin.orderDetails');
    Route::get('/admin/feedback',AdminFeedbacksComponent::class)->name('admin.feedback');
    Route::get('/admin/feedback/edit/{feedback_id}',AdminEditFeedbacksComponent::class)->name('admin.editfeedback');
   
    // Route::get('dashboard', DashboardController::class)->name('dashboard');
    Route::get('users', ListUsers::class)->name('users');
    Route::get('appointments', ListAppointments::class)->name('appointments');
    Route::get('appointments/create', CreateAppointmentForm::class)->name('appointments.create');
    Route::get('appointments/{appointment}/edit', UpdateAppointmentForm::class)->name('appointments.edit');
    Route::get('profile', UpdateProfile::class)->name('profile.edit');
    Route::get('analytics', Analytics::class)->name('analytics');
    Route::get('settings', UpdateSetting::class)->name('settings');
    Route::get('messages', ListConversationAndMessages::class)->name('messages');
   