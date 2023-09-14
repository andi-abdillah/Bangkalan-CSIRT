<?php

use App\Models\Post;
use App\Models\Footer;
use App\Models\Profil;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\RegulationCategoryController;
use App\Http\Controllers\DashboardRegulationController;
use App\Http\Controllers\RegulationController;
use App\Http\Controllers\GuidanceController;
use App\Http\Controllers\ImagePropertyController;
use App\Http\Controllers\VideoProfileController;
use App\Http\Controllers\KeyController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserManagementController;
use App\Models\File;
use App\Models\Guidance;
use App\Models\ImageProperty;
use App\Models\VideoProfile;
use App\Models\Key;
use App\Models\Service;

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

Route::get('/', function () {
    return view('home', [
        'includeHero' => true,
        'includeVideo' => true,
        'footers' => Footer::latest()->get(),
        'profils' => Profil::latest()->get(),
        'posts' => Post::where('published', true)
            ->latest()
            ->get(),
        'files' => File::latest()->get(),
        'keys' => Key::latest()->get(),
        'propertiez' => ImageProperty::where('property', 'Banner')
            ->latest()
            ->get(),
        'properties' => ImageProperty::where('property', 'Logo')
            ->latest()
            ->get(),
        'videos' => VideoProfile::where('show', true)
            ->latest()
            ->get(),
    ]);
})
    ->name('home')
    ->middleware(Spatie\Csp\AddCspHeaders::class);

Route::get('/profile', function () {
    return view('profil', [
        'includeHero' => false,
        'includeVideo' => false,
        'footers' => Footer::latest()->get(),
        'profils' => Profil::latest()->get(),
        'posts' => Post::where('published', true)
            ->latest()
            ->get(),
        'files' => File::latest()->get(),
        'keys' => Key::latest()->get(),
        'propertiez' => ImageProperty::where('property', 'Banner')
            ->latest()
            ->get(),
        'properties' => ImageProperty::where('property', 'Logo')
            ->latest()
            ->get(),
    ]);
})->middleware(Spatie\Csp\AddCspHeaders::class);

Route::get('/file', function () {
    return view('file', [
        'includeHero' => false,
        'includeVideo' => false,
        'footers' => Footer::latest()->get(),
        'profils' => Profil::latest()->get(),
        'posts' => Post::where('published', true)
            ->latest()
            ->get(),
        'files' => File::latest()->get(),
        'keys' => Key::latest()->get(),
        'propertiez' => ImageProperty::where('property', 'Banner')
            ->latest()
            ->get(),
        'properties' => ImageProperty::where('property', 'Logo')
            ->latest()
            ->get(),
    ]);
})->middleware(Spatie\Csp\AddCspHeaders::class);

Route::get('/service', function () {
    return view('service', [
        'includeHero' => false,
        'includeVideo' => false,
        'footers' => Footer::latest()->get(),
        'profils' => Profil::latest()->get(),
        'posts' => Post::where('published', true)
            ->latest()
            ->get(),
        'files' => File::latest()->get(),
        'keys' => Key::latest()->get(),
        'services' => Service::latest()->get(),
        'propertiez' => ImageProperty::where('property', 'Banner')
            ->latest()
            ->get(),
        'properties' => ImageProperty::where('property', 'Logo')
            ->latest()
            ->get(),
    ]);
})->middleware(Spatie\Csp\AddCspHeaders::class);

Route::get('/guidance', function () {
    return view('guidance', [
        'includeHero' => false,
        'includeVideo' => false,
        'footers' => Footer::latest()->get(),
        'profils' => Profil::latest()->get(),
        'posts' => Post::where('published', true)
            ->latest()
            ->get(),
        'files' => File::latest()->get(),
        'keys' => Key::latest()->get(),
        'services' => Service::latest()->get(),
        'propertiez' => ImageProperty::where('property', 'Banner')
            ->latest()
            ->get(),
        'properties' => ImageProperty::where('property', 'Logo')
            ->latest()
            ->get(),
        'guidances' => Guidance::latest()->paginate(7),
    ]);
})->middleware(Spatie\Csp\AddCspHeaders::class);

Route::get('/contact', function () {
    return view('contact', [
        'includeHero' => false,
        'includeVideo' => false,
        'footers' => Footer::latest()->get(),
        'profils' => Profil::latest()->get(),
        'posts' => Post::where('published', true)
            ->latest()
            ->get(),
        'files' => File::latest()->get(),
        'keys' => Key::latest()->get(),
        'services' => Service::latest()->get(),
        'propertiez' => ImageProperty::where('property', 'Banner')
            ->latest()
            ->get(),
        'properties' => ImageProperty::where('property', 'Logo')
            ->latest()
            ->get(),
    ]);
})->middleware(Spatie\Csp\AddCspHeaders::class);

Route::get('/csirt-login', [LoginController::class, 'index'])
    ->name('login')
    ->middleware('white.list', 'guest', Spatie\Csp\AddCspHeaders::class);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/login/reload-captcha', [LoginController::class, 'reloadCaptcha']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('superadmin');
Route::get('/register/showChangePasswordGet', [RegisterController::class, 'showChangePasswordGet'])->middleware(Spatie\Csp\AddCspHeaders::class, 'auth');
Route::post('/register/showChangePasswordGet', [RegisterController::class, 'changePasswordUser'])->middleware('auth');
Route::post('/register', [RegisterController::class, 'store'])->middleware('superadmin');

Route::resource('/posts', PostController::class)
    ->only(['index', 'show'])
    ->middleware(Spatie\Csp\AddCspHeaders::class);

Route::get('/regulations', [RegulationController::class, 'index'])->middleware(Spatie\Csp\AddCspHeaders::class);

Route::get('/dashboard', function () {
    if (auth()->guest()) {
        return redirect('/csirt-login');
    }
    return view('dashboard.index', [
        'properties' => ImageProperty::where('property', 'Logo')
            ->latest()
            ->get(),
        'profils' => Profil::latest()->get(),
    ]);
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::get('/dashboard/categories/checkSlug', [AdminCategoryController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoryController::class)
    ->except('show')
    ->middleware('admin');

Route::get('/dashboard/regulation-categories/checkSlug', [RegulationCategoryController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/regulation-categories', RegulationCategoryController::class)
    ->except('show')
    ->middleware('admin');

Route::resource('/dashboard/regulations', DashboardRegulationController::class)
    ->except('show')
    ->middleware('admin');

Route::resource('/dashboard/footers', FooterController::class)
    ->except('show')
    ->middleware('admin');

Route::resource('/dashboard/properties', ImagePropertyController::class)
    ->except('show')
    ->middleware('admin');

Route::resource('/dashboard/videos', VideoProfileController::class)
    ->except('show')
    ->middleware('admin');

Route::resource('/dashboard/profils', ProfilController::class)->middleware('admin');

Route::resource('/dashboard/files', FileController::class)
    ->only(['index', 'create', 'store', 'destroy'])
    ->middleware('admin');

Route::resource('/dashboard/users', UserManagementController::class)
    ->only(['index', 'edit', 'update'])
    ->middleware('superadmin');

Route::resource('/dashboard/services', ServiceController::class)->middleware('admin');

Route::resource('/dashboard/keys', KeyController::class)
    ->only(['index', 'create', 'store', 'destroy'])
    ->middleware('admin');

Route::resource('/dashboard/guidances', GuidanceController::class)
    ->except('show')
    ->middleware('admin');
