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
    Route::get('/banner_image', 'bannerImage')->name('banner_image');
    Route::delete('/banners/{id}', 'destroyBanners')->name('banners.destroy');
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
    Route::get('/packages', 'getPackages')->name('packages');
    Route::post('/checkout', 'getLogin')->name('checkout');
    Route::post('/contact', 'contact')->name('contact');

});
Route::controller(ServiceController::class)->group(function (){
    Route::get('/service_section', 'serviceSection')->name('service_section');
    Route::get('/view_services', 'viewServices')->name('view_services');
    Route::post('/create_service', 'createService')->name('create_service');
    Route::post('/edit_service/{id}', 'editService')->name('edit_service');
    Route::delete('/service/{id}', 'destroyService')->name('service.destroy');

});

Route::controller(TeamController::class)->group(function (){
    Route::get('/team_section', 'teamSection')->name('team_section');
    Route::get('/view_team', 'viewTeam')->name('view_team');
    Route::post('/create_team', 'createTeam')->name('create_team');
    Route::post('/edit_team/{id}', 'editTeam')->name('edit_team');
    Route::delete('/team/{id}', 'destroyTeam')->name('team.destroy');
});
Route::controller(WhyChoosUsController::class)->group(function (){
    Route::get('/why_us', 'whyUs')->name('why_us');
    Route::get('/view_why_us', 'viewWhyUs')->name('view_why_us');
    Route::post('/create_why', 'createWhy')->name('create_why');
    Route::post('/edit_why_us/{id}', 'editWhyUs')->name('edit_why_us');
    Route::delete('/why_us/{id}', 'destroyWhyUs')->name('why_us.destroy');
});

Route::controller(PortfolioController::class)->group(function (){
    Route::get('/portfolio_section', 'portfolioSection')->name('portfolio_section');
    Route::post('create_portfolio', 'createPortfolio')->name('create_portfolio');
    Route::post('create_project_image', 'createProjectImage')->name('create_project_image');
    Route::get('/view_project', 'viewProject')->name('view_project');
    Route::get('/view_category', 'viewCategory')->name('view_category');
    Route::post('/create_project_cat', 'createProjectCat')->name('create_project_cat');
    Route::post('/edit_project/{id}', 'editProject')->name('edit_project');
    Route::delete('/project/{id}', 'destroyProject')->name('project.destroy');
    Route::post('/edit_project_cat/{id}', 'editProjectCat')->name('edit_project_cat');
    Route::delete('/project_category/{id}', 'destroyProjectCategory')->name('project_category.destroy');
    Route::get('/project_image', 'projectImage')->name('project_image');
    Route::delete('/project_image.destroy/{id}', 'destroyProjectImage')->name('project_image.destroy');
});

Route::controller(FaqController::class)->group(function (){
    Route::get('/faq_section', 'faqSection')->name('faq_section');
    Route::get('/view_faq', 'viewFaq')->name('view_faq');
    Route::post('/create_faq', 'createFaq')->name('create_faq');
    Route::post('/edit_faq/{id}', 'editFaq')->name('edit_faq');
    Route::delete('/faq/{id}', 'destroyFaq')->name('faq.destroy');
});

Route::controller(CounterController::class)->group( function (){
    Route::get('/counter_section', 'counterSection')->name('counter_section');
    Route::get('/view_counter', 'viewCounter')->name('view_counter');
    Route::post('/create_counter', 'createCounter')->name('create_counter');
    Route::post('/edit_counter/{id}', 'editCounter')->name('edit_counter');
    Route::delete('/counter/{id}', 'destroyCounter')->name('counter.destroy');
});

Route::controller(TestimonialController::class)->group(function (){
    Route::get('/testimonial_section', 'testimonialSection')->name('testimonial_section');
    Route::get('/view_testimonial', 'viewTestimonial')->name('view_testimonial');
    Route::post('/create_testimonial', 'createTestimonial')->name('create_testimonial');
    Route::post('/edit_testimonial/{id}', 'editTestimonial')->name('edit_testimonial');
    Route::delete('/testimonial/{id}', 'destroyTestimonial')->name('testimonial.destroy');
});

Route::controller(BlogController::class)->group(function (){
    Route::get('/blog_section', 'blogSection')->name('blog_section');
    Route::get('/view_blog', 'viewBlog')->name('view_blog');
    Route::post('/create_blog', 'createBlog')->name('create_blog');
    Route::post('/edit_blog/{id}', 'editBlog')->name('edit_blog');
    Route::delete('/blog/{id}', 'destroyBlog')->name('blog.destroy');
});

Route::controller(BrandController::class)->group(function (){
    Route::get('/brand_section', 'brandSection')->name('brand_section');
    Route::get('/view_brand', 'viewBrand')->name('view_brand');
    Route::post('/create_brand', 'createBrand')->name('create_brand');
    Route::post('/edit_brand/{id}', 'editBrand')->name('edit_brand');
    Route::delete('/brand/{id}', 'destroyBrand')->name('brand.destroy');
});

Route::controller(PackageController::class)->group(function (){
    Route::get('/view_package', 'viewPackage')->name('view_package');
    Route::get('/package_section', 'packageSection')->name('package_section');
    Route::post('/create_package', 'createPackage')->name('create_package');
    Route::get('/package_category', 'filterByCategory')->name('package_category');
    Route::get('/package_cat', 'packageCat')->name('package_cat');
    Route::post('/create_package_cat', 'createPackageCat')->name('create_package_cat');
    Route::post('/edit_package/{id}', 'editPackage')->name('edit_package');
    Route::delete('/package/{id}', 'destroyPackage')->name('package.destroy');
    Route::post('/edit_category/{id}', 'editCategory')->name('edit_category');
    Route::delete('/category/{id}', 'destroyCategory')->name('category.destroy');
});

Route::controller(FeatureController::class)->group(function (){
    Route::get('/view_feature', 'viewFeature')->name('view_feature');
    Route::get('/feature_section', 'featureSection')->name('feature_section');
    Route::post('/create_feature', 'createFeature')->name('create_feature');
    Route::post('/assign_feature', 'assignFeature')->name('assign_feature');
    Route::post('/edit_feature/{id}', 'editFeature')->name('edit_feature');
    Route::delete('/feature/{id}' , 'destroyFeature')->name('feature.destroy');
});

Route::controller(ContactInfoController::class)->group(function (){
    Route::get('/contact_section', 'contactSection')->name('contact_section');
    Route::post('/create_contact', 'createContact')->name('create_contact');
});
Route::controller(CompanyFeatureController::class)->group(function (){
    Route::get('view_features', 'viewFeatures')->name('view_features');
    Route::get('/company_feature_section', 'companyFeatureSection')->name('company_feature_section');
    Route::post('/create_company_feature', 'createCompanyFeature')->name('create_company_feature');
    Route::post('/edit_company_feature/{id}', 'editCompanyFeature')->name('edit_company_feature');
    Route::delete('/company_feature/{id}', 'destroyCompanyFeature')->name('company_feature.destroy');
});

Route::controller(CommentController::class)->group(function () {
    Route::post('/post_comment', 'postComment')->name('post_comment');
});


Route::post('/test', 'App\Http\Controllers\StripeController@test')->name('test');
Route::post('/live', 'App\Http\Controllers\StripeController@live');
Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');

Route::get('/', [FrontController::class, 'home'])->name('home');

Route::post('/login', [AuthController::class, 'login'])->name('login');