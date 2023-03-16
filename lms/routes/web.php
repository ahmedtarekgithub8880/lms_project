<?php

use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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
Route::get('payment/create', 'PaymentController@create')->name('payment.create');

Route::get('payment/callback/success', 'PaymentsCallbackController@success')->name('payment.success');
Route::get('payment/callback/cancel', 'PaymentsCallbackController@cancel')->name('payment.cancel');

Route::get('terms-and-conditions',  function () { return view('terms')   ;})->name('terms');
Route::get('refund-privacy-policy', function () { return view('privacy') ;})->name('privacy');
Route::get('rights-guarantee',      function () { return view('rights')  ;})->name('rights');

Route::get('/', 'HomeController@index')->name('home');
// Route::get('/filter/{category_id}', 'HomeController@index')->name('home.filter');
Auth::routes(['verify' => true]);
Route::get('lang/{locale}' , 'HomeController@swap')->name('lang');
Route::get('/', 'HomeController@index')->name('index');
Route::get('/about', 'AboutController@about')->name('about');
Route::get('/instructors', 'AboutController@trainers')->name('instructors');
Route::get('/contact', 'ContactController@get_contact')->name('get-contact');
Route::post('/store-contact', 'ContactController@store_contact')->name('store-contact');
Route::get('events', 'EventsController@events')->name('events');
Route::get('services', 'ServiceController@services')->name('services');
Route::get('service/{ourService}', 'ServiceController@single_service')->name('single_service');

Route::get('single-event/{event}', 'EventsController@single_event')->name('single_event');
Route::post('/store-event', 'EventsController@store_event')->name('store-event');

Route::get('news', 'NewsController@news')->name('news');
Route::get('news/{news}', 'NewsController@single_news')->name('single-news');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// Social Login
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('social.login');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Auth::routes(['verify' => true]);

Route::get('shop/filter', 'ProductCategoriesController@filterShop')->name('filterShop');
Route::get('courses/filter', 'CoursesController@filterCourse')->name('filterCourse');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/courses/{cat?}', 'CoursesController@index')->name('cources');
Route::get('/Category-Courses/{course}', 'CoursesController@index')->name('category');
Route::get('/page/{title}', 'CoursesController@index')->name('page');
Route::get('/PaidCourses', 'CoursesController@paid_cources')->name('paid_cources');
Route::get('/FreeCourses', 'CoursesController@free_cources')->name('free_cources');
Route::get('/news-details/{title}', 'NewsController@single_news')->name('news-details');
Route::get('/course-details/{course}', 'CoursesController@course_details')->name('course_details');

Route::get('/Category/{category}' , 'CoursesController@category')->name('cat_cources');

Route::get('link', function (){
Artisan::call('storage:link');

return 'done';
    });

    Route::get('optimize', function (){
Artisan::call('optimize:clear');

return 'done';
    });
// Route::get('/Category/{category}', function () {
//     return 'Hello World';
// })->name('cat_cources');
Route::get('/instructor_dashboard', 'DashboardController@instructor_dashboard')->name('instructor');
Route::get('/lesson/{id}','DashboardController@instructor_dashboard')->name('lesson');
Route::get('/instructor_dashboard/{trainer}', 'DashboardController@instructor_dashboard')->name('instructor');
Route::get('/pages/{slug}', 'PagesController@pages')->name('pages');
Route::get('/join/{course}', 'CoursesController@join_course')->name('join');
Route::get('/lesson/{lesson}/{course}','LessonController@lesson')->name('lesson');
// Route::get('/les/{id}','LessonController@previewlesson')->name('LessonController.previewlesson');

Route::get('/pages/{slug}', 'PagesController@pages')->name('pages');
Route::get('/my_dashboard', 'StudentController@profile')->name('my_dashboard');
Route::get('/my_dashboard/my_courses', 'StudentController@courses')->name('my_dashboard.courses');
Route::get('/my_dashboard/my_kids', 'StudentController@kids_Details')->name('my_dashboard.kids');
// Route::get('/lesson/{id}','DashboardController@instructor_dashboard')->name('lesson');
Route::get('/instructor_dashboard/{trainer}', 'DashboardController@instructor_dashboard')->name('instructor');
Route::get('resolves/{id}', 'LessonController@assignment_resolves')->name('get_resolves');
Route::post('/store-resolves', 'LessonController@store_resolve')->name('store-resolves');
Route::get('/upload-resolves/{id}', 'LessonController@upload_resolve')->name('upload-resolves');

Route::post('users/{user}/update',  'StudentController@update')->name('users.update');
Route::post('users/{user}/update_password',  'StudentController@update_password')->name('users.update_password');

Route::get('/search','SearchController@search')->name('search');
Route::get('faqs', 'HomeController@faqs')->name('faqs');
Route::get('shop/{pcategory?}', 'ProductCategoriesController@shop')->name('shop');
Route::get('shop/product/{product}', 'ProductController@singleProduct')->name('singleProduct');
Route::get('course/search', 'CoursesController@searchCourse')->name('searchCourse');
Route::post('subscribe', 'ContactController@saveSubscribe')->name('subscribe');

// Route::get('/index-copy','HomepageController@index')->name('index-copy');

Route::group(['middleware' => ['auth']], function () {
    Route::get('cart', 'CartController@cartItems')->name('catItems');

    Route::get('my-cart', 'CartController@mycartItems')->name('mycatItems');
    Route::post('add-to-wishlist', 'ProductController@addToWishlist')->name('addToWishlist');
    Route::post('remove-from-wishlist', 'ProductController@removeFromCart')->name('removeFromCart');
    Route::get('wishlist', 'ProductController@wishlist')->name('wishlist');
    Route::get('my-wishlist', 'ProductController@dashboard_wishlist')->name('dashboard-wishlist');
    Route::get('add-item-to-cart/{product_id}', 'CartController@addOneItemtoCart')->name('addOneItemtoCart');
    Route::post('remove-from-cart', 'CartController@removeItemFromCart')->name('removeItemFromCart');
    Route::post('empty-cart', 'CartController@emptyCart')->name('emptyCart');
    Route::put('update-cart-qty', 'CartController@updateCartQty')->name('updateCartQty');
    Route::get('checkout', 'OrderController@checkout')->name('checkout');
    Route::post('order', 'OrderController@saveOrder')->name('saveOrder');
    Route::get('dashboard-orders', 'OrderController@myDashboardOrders')->name('myDashboardOrders');
    Route::get('quiz/{slug}', 'CoursesController@quiz')->name('quiz');
    Route::post('store-answer', 'CoursesController@storeQuizAnswer')->name('storeAnswer');
    Route::get('certificate/{data}', 'CertificateController@certificate')->name('certificate');

    Route::get('fav-courses', 'CoursesController@favCourses')->name('favCourses');
    Route::post('add-course-to-fav', 'CoursesController@addCourseToFav')->name('addCourseToFav');
    Route::post('remove-from-fav', 'CoursesController@removeFromFav')->name('removeFromFav');

    Route::get('payment/{course}', 'CoursesController@course_payment')->name('payment');

    Route::post('update-rate', 'CoursesController@update_rate')->name('update-rate');



    Route::get('chat', function (){
        return view('chat');
    });
Route::get('/link', function () {     Artisan::call('storage:link --relative'); });

});

Route::get('/optimize', function () {     Artisan::call('optimize:clear '); });


Route::get('/', 'HomeController@index')->name('home');
Route::get('lang/{locale}' , 'HomeController@swap')->name('lang');

Route::get('/about', 'AboutController@about')->name('about');
Route::get('/instructors', 'AboutController@trainers')->name('instructors');
Route::get('/contact', 'ContactController@get_contact')->name('get-contact');
Route::post('/store-contact', 'ContactController@store_contact')->name('store-contact');
Route::get('events', 'EventsController@events')->name('events');
Route::get('services', 'ServiceController@services')->name('services');
Route::get('service/{ourService}', 'ServiceController@single_service')->name('single_service');

Route::get('single-event/{event}', 'EventsController@single_event')->name('single_event');
Route::post('/store-event', 'EventsController@store_event')->name('store-event');

Route::get('news', 'NewsController@news')->name('news');
Route::get('news/{news}', 'NewsController@single_news')->name('single-news');

Route::get('shop/filter', 'ProductCategoriesController@filterShop')->name('filterShop');
Route::get('courses/filter', 'CoursesController@filterCourse')->name('filterCourse');


Route::get('/courses/{cat?}', 'CoursesController@index')->name('cources');
Route::get('/Category-Courses/{course}', 'CoursesController@index')->name('category');
Route::get('/page/{title}', 'CoursesController@index')->name('page');
Route::get('/PaidCourses', 'CoursesController@paid_cources')->name('paid_cources');
Route::get('/FreeCourses', 'CoursesController@free_cources')->name('free_cources');
Route::get('/news-details/{title}', 'NewsController@single_news')->name('news-details');
Route::get('/course-details/{course}', 'CoursesController@course_details')->name('course_details');

Route::get('/Category/{category}' , 'CoursesController@category')->name('cat_cources');

Route::get('/search','SearchController@search')->name('search');
Route::get('faqs', 'HomeController@faqs')->name('faqs');
Route::get('shop/{pcategory?}', 'ProductCategoriesController@shop')->name('shop');
Route::get('shop/product/{product}', 'ProductController@singleProduct')->name('singleProduct');
Route::get('course/search', 'CoursesController@searchCourse')->name('searchCourse');
// Filter courses
Route::POST('/filter','AjaxController@filter')->name('index.filter');
Route::POST('/filter/all','AjaxController@all')->name('flter.all');
//Filter Shop
Route::POST('/filtershop','AjaxController@filter_shop')->name('index.filter_shop');
Route::POST('/filter/allshop','AjaxController@all_shop')->name('flter.all_shop');
// Filter Artical
