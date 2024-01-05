<?php

use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\ImagesController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BeneficiaryController;
use App\Http\Controllers\Admin\BlogController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DataController;
use App\Http\Controllers\Admin\EntitiesController;
use App\Http\Controllers\Admin\EntityCategoriesController;
use App\Http\Controllers\Admin\EntityExperiencesController;
use App\Http\Controllers\Admin\EntityPackageController;
use App\Http\Controllers\Admin\ExperiencesController;
use App\Http\Controllers\Admin\FilterCategoriesController;
use App\Http\Controllers\Admin\FiltersController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\IntrosController;
use App\Http\Controllers\Admin\KYCController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MenusController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\PackageTimeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PricesController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ShowcasesController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\Admin\TemplatesController;
use App\Http\Controllers\Admin\TextsController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SocialAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Tools\Tools;
use App\Mail\ReservationRemittanceMail;
use App\Models\Entity;
use App\Models\Log;
use App\Models\Role;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

Route::get('/storage-link', function () { Artisan::call('storage:link'); });
Route::get('/migrate', function () { Artisan::call('migrate'); });
Route::get('/rollback', function () { Artisan::call('migrate:rollback'); });
Route::get('/clear-cache', function () { Artisan::call('cache:clear'); });
Route::get('/view-cache', function () { Artisan::call('view:clear'); });
Route::get('/config-cache', function () { Artisan::call('config:cache'); });
Route::get('/route-cache', function () { Artisan::call('route:cache'); });

Route::get('auth/{provider}/redirect', [SocialAuthController::class, 'redirect']);
Route::get('auth/{provider}/callback', [SocialAuthController::class, 'callback']);

Route::get('user/profile', function () { return view('profile.show'); })->middleware('verified')->name('profile.show');

function send_whatsapp($phone, $apikey, $message="Test") {
    //$phone="+5353442331";  // Enter your phone number here
    //$apikey="450771";       // Enter your personal apikey received in step 3 above

    //erick
    //$phone="+5352529974";  // Enter your phone number here
    //$apikey="573416";       // Enter your personal apikey received in step 3 above

    $url='https://api.callmebot.com/whatsapp.php?source=php&phone='.$phone.'&text='.urlencode($message).'&apikey='.$apikey;

    if($ch = curl_init($url))
    {
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $html = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        // echo "Output:".$html;  // you can print the output for troubleshooting
        curl_close($ch);
        return (int) $status;
    }
    else
    {
        return false;
    }
}

Route::get('/test-whatsapp', function() {
    Tools::send_whatsapp("+5353442331", "450771", "Probando");
    //dd(send_whatsapp("+5352529974", "573416", "prueba de mensaje de whatsapp a varios destinatarios"));
});
Route::get('/test-mail', function () {
    try {
        // Mail::to("jlmorales080@gmail.com")->send(new ReservationRemittanceMail([
        //     "subject" => "probando",
        //     "user" => null,
        //     "template" => [
        //         'title' => "Oferta completada por mensajero",
        //         'content' => 'hola',
        //         'action_title' => 'probando',
        //         'action_url' => route('home')
        //     ]
        // ]));

        // $emails = ['erinhocasals@gmail.com', 'alejandro@hametour.com', 'jlmorales080@gmail.com'];

        $emails = ['jlmorales080@gmail.com'];

        Mail::to($emails)->send(new ReservationRemittanceMail([
            "subject" => "Correo de prueba",
            "user" => null,
            "template" => [
                'title' => 'Correo de prueba',
                'content' => 'probando',
                'action_title' => 'Ver detalles',
                'action_url' => route('home')
            ]
        ]));
    }
    catch(Exception $ex) {
        dd($ex);
    }
    dd('pok');
});

# front routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [HomeController::class, 'search'])->name('front.search');
Route::get('/group/{friendly}', [HomeController::class, 'group'])->name('front.group');
Route::get('/category/{friendly}', [HomeController::class, 'category'])->name('front.category');
Route::get('/entity/{friendly}', [HomeController::class, 'entity'])->name('front.entity');
Route::get('/info/{friendly}', [HomeController::class, 'info'])->name('front.info');
Route::get('/blog/{friendly}', [HomeController::class, 'blog'])->name('front.blog');
Route::get('/package/{friendly}', [HomeController::class, 'package'])->name('front.package');

Route::post('/reservation/book', [HomeController::class, 'book'])->name('front.book');
Route::post('/remesa/beneficiary/add', [HomeController::class, 'beneficiaryAdd'])->name('front.beneficiary.add');

Route::post('price', [HomeController::class, 'price']);
Route::get('/location', [HomeController::class, 'location']);
Route::post('/contact', [HomeController::class, 'contact'])->name('front.contact');
Route::get('/captcha-reload', [HomeController::class, 'captcha'])->name('front.captcha.reload');

// spatie admin group middleware

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {

    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('role_or_permission:super-admin|dashboard.listing');

    Route::resource('categories', CategoriesController::class)->names('admin.categories')->middleware('role_or_permission:super-admin|category.resource');
    // Route::get('categories/{id}', [CategoriesController::class, 'show'])->middleware('role_or_permission:super-admin|role_or_permission:admin|role_or_permission:agency');

    Route::resource('entity-categories', EntityCategoriesController::class)->names('admin.entity-categories')->middleware('role_or_permission:super-admin|entity-category.resource');
    Route::resource('entities', EntitiesController::class)->names('admin.entities')->middleware('role_or_permission:super-admin|entity.resource');

    Route::resource('showcases', ShowcasesController::class)->names('admin.showcases')->middleware('role_or_permission:super-admin|showcase.resource');
    Route::get('showcases/create/{model}/{id}', [ShowcasesController::class, 'create'])->middleware('role_or_permission:super-admin|showcase.resource');
    Route::get('showcases', [ShowcasesController::class, 'index'])->middleware('role_or_permission:super-admin|showcase.listing')->name('admin.showcases.index');

    Route::resource('intros', IntrosController::class)->names('admin.intros')->middleware('role_or_permission:super-admin|intro.resource');
    Route::get('intros/create/{model}/{id}', [IntrosController::class, 'create'])->middleware('role_or_permission:super-admin|intro.resource');
    Route::get('intros/delete/image/{id}/{type}', [IntrosController::class, 'deleteImage'])->name('admin.intro.delete.image')->middleware('role_or_permission:super-admin|intro.resource');
    Route::get('intros', [IntrosController::class, 'index'])->middleware('role_or_permission:super-admin|intro.listing')->name('admin.intros.index');

    Route::resource('images', ImagesController::class)->names('admin.images')->middleware('role_or_permission:super-admin|image.resource');
    Route::get('images/create/{model}/{id}', [ImagesController::class, 'create'])->middleware('role_or_permission:super-admin|image.resource');
    Route::get('images', [ImagesController::class, 'index'])->middleware('role_or_permission:super-admin|image.listing')->name('admin.images.index');

    Route::resource('texts', TextsController::class)->names('admin.texts')->middleware('role_or_permission:super-admin|text.resource');
    Route::get('texts/create/{model}/{id}', [TextsController::class, 'create'])->middleware('role_or_permission:super-admin|text.resource');
    Route::get('texts', [TextsController::class, 'index'])->middleware('role_or_permission:super-admin|text.listing')->name('admin.texts.index');

    Route::resource('prices', PricesController::class)->names('admin.prices')->middleware('role_or_permission:super-admin|price.resource');
    Route::get('prices/create/{model}/{id}', [PricesController::class, 'create'])->middleware('role_or_permission:super-admin|price.resource');
    Route::get('prices', [PricesController::class, 'index'])->middleware('role_or_permission:super-admin|price.listing')->name('admin.prices.index');

    Route::resource('experiences', ExperiencesController::class)->names('admin.entity-experiences')->middleware('role_or_permission:super-admin|experience.resource');
    Route::get('experiences', [ExperiencesController::class, 'index'])->middleware('role_or_permission:super-admin|experience.listing')->name('admin.entity-experiences.index');

    Route::resource('package', PackageController::class)->names('admin.package')->middleware('role_or_permission:super-admin|package.resource');

    Route::resource('time', PackageTimeController::class)->names('admin.time');
    Route::get('time/create/{package}', [PackageTimeController::class, 'create']);
    Route::resource('entity-package', EntityPackageController::class)->names('admin.entity-package');
    Route::get('entity-package/create/{package}', [EntityPackageController::class, 'create']);

    Route::resource('filter-categories', FilterCategoriesController::class)->names('admin.filter-categories')->middleware('role_or_permission:super-admin|filter-category.resource');
    Route::resource('filters', FiltersController::class)->names('admin.filters')->middleware('role_or_permission:super-admin|filter.resource');

    Route::resource('reservations', ReservationController::class)->names('admin.reservations')->middleware('role_or_permission:super-admin|reservation.resource');
    Route::post('reservations/{id}/response', [ReservationController::class, 'response'])->middleware('role_or_permission:super-admin|reservation.resource');

    Route::resource('status', StatusController::class)->names('admin.status')->middleware('role_or_permission:super-admin|status.resource');
    Route::resource('slide', SlideController::class)->names('admin.slide')->middleware('role_or_permission:super-admin|slide.resource');
    Route::resource('social', SocialController::class)->names('admin.socials')->middleware('role_or_permission:super-admin|social.resource');
    Route::resource('data', DataController::class)->names('admin.data')->middleware('role_or_permission:super-admin|data.resource');
    Route::resource('contact', ContactController::class)->names('admin.contact')->middleware('role_or_permission:super-admin|contact.resource');

    Route::resource('transaction', TransactionController::class)->names('admin.transaction')->middleware('role_or_permission:super-admin|transaction.resource');
    Route::resource('kyc', KYCController::class)->names('admin.kyc')->middleware('role_or_permission:super-admin|kyc.resource');
    Route::resource('beneficiary', BeneficiaryController::class)->names('admin.beneficiary')->middleware('role_or_permission:super-admin|beneficiary.resource');

    Route::group(['middleware' => ['role:super-admin|admin|editor']], function () {
        Route::resource('menus', MenuController::class)->names('admin.menu');
        Route::get('menu/create/{model}/{id}', [MenuController::class, 'create']);
        Route::post('menu/sort', [MenuController::class, 'sort'])->name('admin.menu.sort');

        Route::resource('infos', InfoController::class)->names('admin.infos');
        Route::resource('blog', BlogController::class)->names('admin.blog');
        Route::resource('log', LogController::class)->names('admin.log');
        Route::resource('users', UsersController::class)->names('admin.users');
        Route::resource('roles', RoleController::class)->names('admin.roles');
        Route::resource('permission', PermissionController::class)->names('admin.permission');
    });
});

Route::group(['middleware' => ['role:super-admin'], 'prefix' => 'admin'], function () {
    Route::resource('templates', TemplatesController::class)->names('admin.templates');
});

// auth area
Route::group(['middleware' => 'auth'], function () {
    Route::get('fortify/middleware', [AuthController::class, 'fortify'])->name('fortify.middleware');
    Route::get('/email/verify', function () {
        return Auth::user()->hasVerifiedEmail() ? redirect(route('home')) : view('auth.verify-email');
    })->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'emailVerification'])->middleware(['signed'])->name('verification.verify');
    Route::post('/email/verification-notification', [AuthController::class, 'emailNotification'])->middleware(['throttle:6,1'])->name('verification.send');

    Route::get('/cart', [HomeController::class, 'cart'])->name('front.cart');
    Route::post('/checkout', [HomeController::class, 'checkout'])->name('front.checkout');
    Route::get('/reservation/cancel/{id}', [HomeController::class, 'cancel'])->name('front.cancel');

    Route::post('profile/roles/update', [HomeController::class, 'sync'])->name('front.sync.roles');

    Route::post('share', [HomeController::class, 'share'])->middleware(['role:comercial'])->name('front.comercial.share');
    Route::post('remittance/{id}', [HomeController::class, 'remittance'])->middleware('role:messenger')->name('front.remittance.submit');
    Route::post('remittance/confirm/{id}', [HomeController::class, 'confirm'])->name('front.remittance.confirm');
});
