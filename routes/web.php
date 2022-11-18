    <?php

   
    use App\Http\Livewire\Admin\Product\Category\AdminCategoryComponent;
    use App\Http\Livewire\Admin\Product\Category\AdminEditCategoryComponent;


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
    use App\Http\Livewire\Admin\Product\Products\Wefted\AdminEditWefted;
    use App\Http\Livewire\Admin\Product\Products\Closure\AdminClosure;
    use App\Http\Livewire\Admin\Product\Products\Closure\AdminEditClosure;
    use App\Http\Livewire\Admin\Product\Products\Frontal\AdminEditFrontal;
    use App\Http\Livewire\Admin\Product\Products\Frontal\AdminFrontal;
    use App\Http\Livewire\Admin\Product\Products\Wefted\AdminWefted;
    use App\Http\Livewire\Admin\Product\Products\Wig\AdminEditWig;
    use App\Http\Livewire\Admin\Product\Products\Wig\AdminWig;
    use App\Http\Livewire\Admin\Subcategory\Adminlenght;
    use App\Http\Livewire\Admin\Subcategory\Adminpattern;
    use App\Http\Livewire\Admin\Subcategory\Adminsize;
    use App\Http\Livewire\Admin\Subcategory\Aminsubcategory;
    use App\Http\Livewire\FrontEnd\OurCmp\PolicyComponent;
    use App\Http\Livewire\FrontEnd\OurCmp\TermsComponent;
    use App\Http\Livewire\FrontEnd\Blog\FeedbackComponent;
    use App\Http\Livewire\Frontend\Shop\Allproducts\Allproducts;
use App\Http\Livewire\Frontend\Shop\CustomizeOrderComponent;
use App\Http\Livewire\Frontend\Shop\Shopping\ShopPatternComponent;

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

    Route::get('/', HomeComponent::class);
    Route::get('/cart', CartComponent::class)->name('product.cart');
    Route::get('/checkout', CheckoutComponent::class)->name('checkout');
    Route::get('/details_product/{slug}', DetailsProductComponent::class)->name('product.details');
    Route::get('/search', SearchComponent::class)->name('search.product');
    Route::get('/shop', ShopComponent::class)->name('shopping');
    Route::get('/shop/category/{category_slug}', CategoryComponent::class)->name('product.category');
    Route::get('/shop/pattern/{pattern_id}', ShopPatternComponent::class)->name('product.shopbypattern');

    Route::get('/policy', PolicyComponent::class)->name('policy');
    Route::get('/terms-conditions', TermsComponent::class)->name('termsCod');
    Route::get('/about-us', AboutusComponent::class)->name('about-us');


    // Route::get('/shop/{category_slug}', 'StaticController@index')->where('slug', 'faq|contact|something');

    Route::get('/blog', BlogComponent::class)->name('blog');
    Route::get('/contact', ContactComponent::class)->name('contact');
    Route::get('/customize/order',CustomizeOrderComponent::class)->name('customize.order');
    Route::get('/allproducts',Allproducts::class)->name('allproducts');
    Route::get('/history', BlogComponent::class)->name('product.order');
    Route::get('/feedback', FeedbackComponent::class)->name('feedbacks');
    Route::post('/send-email', [Contactcontroller::class, 'sendEmail'])->name('send.email');
    // Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
        Route::get('/user/orderdetails/{id}', UserOrderDetailsComponent::class)->name('user.orderdetails');
    });

// Admin dashboard
    Route::get('/admin/dashboard', DashboardController::class)->name('admin.dashboard');
// Admin CRUD category
    Route::get('/admin/categories', AdminCategoryComponent::class)->name('admin.category');
    Route::get('/admin/categories/edit/{category_slug}', AdminEditCategoryComponent::class)->name('admin.categoryEdit');
// Admin check Order
    Route::get('/admin/order', AdminOrderComponent::class)->name('admin.order');
    Route::get('/admin/order/details/{id}', AdminOrderDetailsComponent::class)->name('admin.orderDetails');
// Admin product
    Route::get('/admin/products', AdminProductComponent::class)->name('admin.products');
// Admin add and edit size and lenght
    Route::get('/admin/subcategory', Aminsubcategory::class)->name('admin.subcategory');
    Route::get('/admin/subcategory/size', Adminsize::class)->name('admin.size');
    Route::get('/admin/subcategory/lenght', Adminlenght::class)->name('admin.lenght');
    Route::get('/admin/subcategory/pattern', Adminpattern::class)->name('admin.pattern');
    
// admin add and edit wefted hair
    Route::get('/admin/products/weftedhair', AdminWefted::class)->name('admin.wefted');
    Route::get('/admin/products/weftedhair/edit/{product_slug}', AdminEditWefted::class)->name('admin.editwefted');
// Admin add and edit clsoure
    Route::get('/admin/products/closure', AdminClosure::class)->name('admin.closure');
    Route::get('/admin/products/closure/edit/{product_slug}', AdminEditClosure::class)->name('admin.editclosure');
// Admin add and edit wig
    Route::get('/admin/products/wig', AdminWig::class)->name('admin.wig');
    Route::get('/admin/products/wig/edit/{product_slug}', AdminEditWig::class)->name('admin.editwig');
// Admin add and edit frontal
    Route::get('/admin/products/frontal', AdminFrontal::class)->name('admin.frontal');
    Route::get('/admin/products/frontal/edit/{product_slug}',AdminEditFrontal::class)->name('admin.editfrontal');
// Admin CRUD Feedbacks
    Route::get('/admin/feedback', AdminFeedbacksComponent::class)->name('admin.feedback');
    Route::get('/admin/feedback/edit/{feedback_id}', AdminEditFeedbacksComponent::class)->name('admin.editfeedback');
// Admin CRUD Slide 
    Route::get('/admin', AdminHomeSliderComponent::class)->name('admin.slider');
    Route::get('/admin/slider/edit/{slider_id}', AdminEditHomeSliderComponent::class)->name('admin.editSlider');
//  Admin CRUD User  
    Route::get('users', ListUsers::class)->name('users');
    Route::get('appointments', ListAppointments::class)->name('appointments');
    Route::get('appointments/create', CreateAppointmentForm::class)->name('appointments.create');
    Route::get('appointments/{appointment}/edit', UpdateAppointmentForm::class)->name('appointments.edit');
    Route::get('profile', UpdateProfile::class)->name('profile.edit');
    Route::get('analytics', Analytics::class)->name('analytics');
    Route::get('settings', UpdateSetting::class)->name('settings');
    Route::get('messages', ListConversationAndMessages::class)->name('messages');
