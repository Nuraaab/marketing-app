<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\WhyChoosUsController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ContactInfoController;
use App\Http\Controllers\CompanyFeatureController;
use App\Http\Controllers\Front\FrontAboutController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\CommentController;
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

Route::controller(AdminController::class)->group(function (){
    Route::get('/static_section', 'staticSection')->name('static_section');
    Route::get('/feature_section', 'featureSection')->name('feature_section');
    Route::post('/update_static_section/{id}', 'updateStaticSection')->name('update_static_section');
    Route::post('/create_static_section', 'createStaticSection')->name('create_static_section');
    Route::post('/upload_logo', 'uploadLogo')->name('upload_logo');
    Route::post('/create_top_section', 'createTopSection')->name('create_top_section');
    Route::post('/update_top_section/{id}', 'updateTopSection')->name('update_top_section');
    Route::get('/admins','showLoginForm')->name('admin');
    Route::get('/dashboard','dashboard')->name('dashboard');
});
Route::post('/create_top_data', [AdminController::class, 'createTopData'])->name('create_top_data');
Route::post('/create_feature', [FeatureController::class, 'createFeature'])->name('create_feature');

Route::controller(AboutController::class)->group(function (){
    Route::get('/about_section', 'aboutSection')->name('about_section');
    Route::post('/create_about', 'createAbout')->name('create_about');

});
Route::controller(FrontAboutController::class)->group(function(){
    Route::get('/about', 'getAbout')->name('about');
});
Route::controller(FrontController::class)->group(function(){
    Route::get('/service', 'getService')->name('service');
    Route::get('/contact', 'getContact')->name('contact');
    Route::get('/project', 'getProject')->name('project');
    Route::get('/news', 'getNews')->name('news');
    Route::get('/project_details/{id}', 'projectDetails')->name('project_details');
    Route::get('/news_details/{id}', 'newsDetails')->name('news_details');
    Route::get('/service_details/{id}', 'serviceDetails')->name('service_details');
    Route::get('/team_details/{id}', 'teamDetails')->name('team_details');
    Route::post('/checkout', 'getLogin')->name('checkout');
    Route::post('/contact', 'contact')->name('contact');

});
Route::controller(ServiceController::class)->group(function (){
    Route::get('/service_section', 'serviceSection')->name('service_section');
    Route::post('/create_service', 'createService')->name('create_service');

});

Route::controller(TeamController::class)->group(function (){
    Route::get('/team_section', 'teamSection')->name('team_section');
    Route::post('/create_team', 'createTeam')->name('create_team');
});
Route::controller(WhyChoosUsController::class)->group(function (){
    Route::get('/why_us', 'whyUs')->name('why_us');
    Route::post('/create_why', 'createWhy')->name('create_why');
});

Route::controller(PortfolioController::class)->group(function (){
    Route::get('/portfolio_section', 'portfolioSection')->name('portfolio_section');
    Route::post('create_portfolio', 'createPortfolio')->name('create_portfolio');
    Route::get('/view_project', 'viewProject')->name('view_project');
    Route::get('/view_category', 'viewCategory')->name('view_category');
    Route::post('/create_project_cat', 'createProjectCat')->name('create_project_cat');
});

Route::controller(FaqController::class)->group(function (){
    Route::get('/faq_section', 'faqSection')->name('faq_section');
    Route::post('/create_faq', 'createFaq')->name('create_faq');
});

Route::controller(CounterController::class)->group( function (){
    Route::get('/counter_section', 'counterSection')->name('counter_section');
    Route::post('/create_counter', 'createCounter')->name('create_counter');

});

Route::controller(TestimonialController::class)->group(function (){
    Route::get('/testimonial_section', 'testimonialSection')->name('testimonial_section');
    Route::post('/create_testimonial', 'createTestimonial')->name('create_testimonial');
});

Route::controller(BlogController::class)->group(function (){
    Route::get('/blog_section', 'blogSection')->name('blog_section');
    Route::post('/create_blog', 'createBlog')->name('create_blog');
});

Route::controller(BrandController::class)->group(function (){
    Route::get('/brand_section', 'brandSection')->name('brand_section');
    Route::post('/create_brand', 'createBrand')->name('create_brand');
});

Route::controller(PackageController::class)->group(function (){
    Route::get('/view_package', 'viewPackage')->name('view_package');
    Route::get('/package_section', 'packageSection')->name('package_section');
    Route::post('/create_package', 'createPackage')->name('create_package');
    Route::get('/package_category', 'filterByCategory')->name('package_category');
    Route::get('/package_cat', 'packageCat')->name('package_cat');
    Route::post('/create_package_cat', 'createPackageCat')->name('create_package_cat');
});

Route::controller(FeatureController::class)->group(function (){
    Route::get('/view_feature', 'viewFeature')->name('view_feature');
    Route::get('/feature_section', 'featureSection')->name('feature_section');
    Route::post('/create_feature', 'createFeature')->name('create_feature');
    Route::post('/assign_feature', 'assignFeature')->name('assign_feature');
});

Route::controller(ContactInfoController::class)->group(function (){
    Route::get('/contact_section', 'contactSection')->name('contact_section');
    Route::post('/create_contact', 'createContact')->name('create_contact');
});
Route::controller(CompanyFeatureController::class)->group(function (){
    Route::get('/company_feature_section', 'companyFeatureSection')->name('company_feature_section');
    Route::post('/create_company_feature', 'createCompanyFeature')->name('create_company_feature');
});

Route::controller(CommentController::class)->group(function () {
    Route::post('/post_comment', 'postComment')->name('post_comment');
});


Route::post('/test', 'App\Http\Controllers\StripeController@test')->name('test');
Route::post('/live', 'App\Http\Controllers\StripeController@live');
Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');

Route::get('/', [FrontController::class, 'home'])->name('home');

Route::post('/login', [AuthController::class, 'login'])->name('login');