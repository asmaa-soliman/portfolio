<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::controller(DemoController::class)->group(function () {
    Route::get('/', 'homemain')->name('home');
});
// admin route
Route::middleware(['auth'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'profile')->name('admin.profile');
        Route::get('/edit/profile', 'editprofile')->name('edit.profile');
        Route::post('/store/profile', 'storeprofile')->name('store.profile');
        Route::get('/change/password', 'changepassword')->name('change.password');
        Route::post('/update/password', 'updatepassword')->name('update.password');
    });
});

// homeslide route
Route::controller(HomeSliderController::class)->group(function () {
    Route::get('/home/slide', 'homeslider')->name('home.slide');
    Route::post('/update/slider', 'updateslider')->name('update.slider');
});
// about
Route::controller(AboutController::class)->group(function () {
    Route::get('/about/page', 'aboutpage')->name('about.page');
    Route::post('/update/about', 'updateabout')->name('update.about');
    Route::get('/about', 'homeabout')->name('home.about');

    Route::get('/about/multi/image', 'aboutmultiimage')->name('about.multi.image');
    Route::post('/store/multi/image', 'storemultiimage')->name('store.multi.image');
    Route::get('/all/multi/image', 'allmultiimage')->name('all.multi.image');

    Route::get('/edit/multi/image/{id}', 'editmultiimage')->name('edit.multi.image');
    Route::post('/update/multi/image', 'updatemultiimage')->name('update.multi.image');
    Route::get('/delete/multi/image/{id}', 'deletemultiimage')->name('delete.multi.image');
});

// potrfolio route
Route::controller(PortfolioController::class)->group(function () {
    Route::get('/all/portfolio', 'allportfolio')->name('all.portfolio');
    Route::get('/add/portfolio', 'addportfolio')->name('add.portfolio');
    Route::post('/store/portfolio', 'storeportfolio')->name('store.protfolio');

    Route::get('/edit/portfolio/{id}', 'editportfolio')->name('edit.portfolio');
    Route::post('/update/portfolio', 'updateportfolio')->name('update.protfolio');
    Route::get('/delete/portfolio/{id}', 'deleteportfolio')->name('delete.portfolio');
    //display data
    Route::get('/portfolio/details/{id}', 'portfoliodetails')->name('portfolio.details');
    Route::get('/portfolio', 'homeportfolio')->name('home.portfolio');
});

// categoryblog
Route::controller(BlogCategoryController::class)->group(function () {
    Route::get('/all/blog/category', 'allblogcategory')->name('all.blog.category');
    Route::get('/add/blog/category', 'addblogcategory')->name('add.blog.category');
    Route::post('/store/blog/category', 'storeblogcategory')->name('store.blog.category');

    Route::get('/edit/blog/category/{id}', 'editblogcategory')->name('edit.blog.category');
    Route::post('/update/blog/category/{id}', 'updateblogcategory')->name('update.blog.category');
    Route::get('/delete/blog/category/{id}', 'deleteblogcategory')->name('delete.blog.category');
});

// Blog
Route::controller(BlogController::class)->group(function () {
    Route::get('/all/blog', 'allblog')->name('all.blog');
    Route::get('/add/blog', 'addblog')->name('add.blog');
    Route::post('/store/blog', 'storeblog')->name('store.blog');
    Route::get('/edit/blog/{id}', 'editblog')->name('edit.blog');
    Route::post('/update/blog', 'updateblog')->name('update.blog');
    Route::get('/delete/blog/{id}', 'deleteblog')->name('delete.blog');

    Route::get('/blog/details/{id}', 'blogdetails')->name('blog.details');
    Route::get('/category/blog/{id}', 'categoryblog')->name('category.blog');
    Route::get('/blog', 'homeblog')->name('home.blog');
});
// footer
Route::controller(FooterController::class)->group(function () {
    Route::get('/footer/setup', 'footersetup')->name('footer.setup');
    Route::post('/update/footer', 'updatefooter')->name('update.footer');
});
// contactme
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'contact')->name('contact.me');
    Route::post('/store/message', 'storemessage')->name('store.message');
    Route::get('/contact/message', 'contactmessage')->name('contact.message');
    Route::get('/delete/message/{id}', 'deletemessage')->name('delete.message');
});


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
