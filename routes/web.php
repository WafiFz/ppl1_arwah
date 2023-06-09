<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;



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

// Auth Routes
require __DIR__ . '/auth.php';

// Language Switch
Route::get('language/{language}', [LanguageController::class, 'switch'])->name('language.switch');

Route::get('/', 'App\Http\Controllers\PageController@index')->name('home');
Route::prefix('help')->name('help.')->group(function () {
    Route::view('/', 'user.help.index')->name('index');
    Route::view('/tac', 'user.help.tac')->name('tac');
    Route::view('/panduan-pemesanan', 'user.help.pemesanan')->name('panduan-pemesanan');
});

/*
*
*  Order Routes
*
* ---------------------------------------------------------------------
*/
Route::prefix('order')->name('order.')->group(function () {
    $controller_order = 'Modules\Order\Http\Controllers\Frontend\OrdersController';

    // Route::view('/', 'user/order/index')->name('index');
    Route::get('/',  $controller_order . '@makeOrderSelectPackage')->name('index');
    Route::get('/theme/{package_id}',  $controller_order . '@makeOrderSelectTheme')->name('theme');
    Route::get('/summary/{theme_id}',  $controller_order . '@makeOrderSummary')->name('summary');
    Route::get('/checkout/{theme_id}',  $controller_order . '@makeOrder')->name('checkout');
});

/*
*
*  Client Routes
*
* ---------------------------------------------------------------------
*/
Route::prefix('client')->name('client.')->group(function () {
    $controller_profile = 'App\Http\Controllers\ProfileController';
    $controller_order = 'Modules\Order\Http\Controllers\Frontend\OrdersController';
    $controller_invitation = 'Modules\Invitation\Http\Controllers\Frontend\InvitationsController';
    $controller_guest = 'Modules\Invitation\Http\Controllers\Frontend\GuestController';
    $controller_rsvp = 'Modules\Invitation\Http\Controllers\Frontend\RsvpController';

    // Client Order
    Route::get('/orders', $controller_order . '@index')->name('orders');
    Route::get('/orders/{id}', $controller_order . '@show')->name(('ordersDetail'));
    // Route::view('/bills', 'user/order/detail')->name('bills');

    // Client Invitation
    Route::get('/invitations/{id}', $controller_invitation . '@show')->name(('editInvitation'));
    Route::post('/save/invitations/{id}', $controller_invitation . '@edit')->name(('save.editInvitation'));

    // Client Guest
    Route::match(['GET', 'POST'], '/invitations/{id}/guests/add', $controller_guest . '@addGuest')->name(('addGuest'));
    Route::match(['GET', 'POST'], '/invitations/{id}/guests/edit', $controller_guest . '@editGuest')->name(('guest.edit'));
    Route::get('/invitations/{id}/guests', $controller_guest . '@index')->name('guest.index');
    Route::post('/sendInvitation/{id}', $controller_guest . '@sendInvitation')->name('guest.sendInvitation');
    Route::get('guests/{id}', $controller_guest . '@deleteGuest')->name('guest.delete');

    // Client RSVP
    Route::get('/invitations/{id}/rsvps', $controller_rsvp . '@index')->name('rsvp');

    // Client Profile
    Route::get('/{id}', $controller_profile  . '@show')->name('index');
    Route::post('/{id}', $controller_profile . '@edit')->name('editProfile');
    Route::get('/{id}/changePassword', $controller_profile  . '@editPassword')->name('editPassword');
    Route::post('/{id}/changePassword', $controller_profile . '@updatePassword')->name('updatePassword');
});

/*
*
*  Guest Routes
*
* ---------------------------------------------------------------------
*/
$controller_guest = 'Modules\Invitation\Http\Controllers\Frontend\GuestController';
$controller_rsvp = 'Modules\Invitation\Http\Controllers\Frontend\RsvpController';
$controller_wish = 'Modules\Wedding\Http\Controllers\Frontend\WishController';

// Preview Invitation
Route::view('preview/invitation', 'client/invitation')->name('invitation');

Route::get('/{slug}', $controller_guest . '@showInvitation')->name(('showInvitation'));
Route::post('/rsvp', $controller_rsvp . '@rsvp')->name(('rsvp'));
Route::post('/wishes', $controller_wish . '@sendWish')->name(('sendWish'));



/* 
* ||========================== BLOG ROUTES ==========================||
*/


/*
*
* Frontend Routes
*
* --------------------------------------------------------------------
*/
Route::group(['namespace' => 'App\Http\Controllers\Frontend', 'as' => 'frontend.'], function () {
    Route::get('blog/', 'FrontendController@index')->name('index');
    Route::get('home', 'FrontendController@index')->name('home');
    Route::get('privacy', 'FrontendController@privacy')->name('privacy');
    Route::get('terms', 'FrontendController@terms')->name('terms');
    // Route::get('help', 'FrontendController@help')->name('help');

    Route::group(['middleware' => ['auth']], function () {
        /*
        *
        *  Users Routes
        *
        * ---------------------------------------------------------------------
        */
        $module_name = 'users';
        $controller_name = 'UserController';
        Route::get('profile/{id}', ['as' => "$module_name.profile", 'uses' => "$controller_name@profile"]);
        Route::get('profile/{id}/edit', ['as' => "$module_name.profileEdit", 'uses' => "$controller_name@profileEdit"]);
        Route::patch('profile/{id}/edit', ['as' => "$module_name.profileUpdate", 'uses' => "$controller_name@profileUpdate"]);
        Route::get('profile/changePassword/{username}', ['as' => "$module_name.changePassword", 'uses' => "$controller_name@changePassword"]);
        Route::patch('profile/changePassword/{username}', ['as' => "$module_name.changePasswordUpdate", 'uses' => "$controller_name@changePasswordUpdate"]);
        Route::get("$module_name/emailConfirmationResend/{id}", ['as' => "$module_name.emailConfirmationResend", 'uses' => "$controller_name@emailConfirmationResend"]);
        Route::delete("$module_name/userProviderDestroy", ['as' => "$module_name.userProviderDestroy", 'uses' => "$controller_name@userProviderDestroy"]);
    });
});

/*
*
* Backend Routes
* These routes need view-backend permission
* --------------------------------------------------------------------
*/
Route::group(['namespace' => 'App\Http\Controllers\Backend', 'prefix' => 'admin', 'as' => 'backend.', 'middleware' => ['auth', 'can:view_backend']], function () {

    /**
     * Backend Dashboard
     * Namespaces indicate folder structure.
     */
    Route::get('/', 'BackendController@index')->name('home');
    Route::get('dashboard', 'BackendController@index')->name('dashboard');

    /*
     *
     *  Settings Routes
     *
     * ---------------------------------------------------------------------
     */
    Route::group(['middleware' => ['permission:edit_settings']], function () {
        $module_name = 'settings';
        $controller_name = 'SettingController';
        Route::get("$module_name", "$controller_name@index")->name("$module_name");
        Route::post("$module_name", "$controller_name@store")->name("$module_name.store");
    });

    /*
    *
    *  Notification Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'notifications';
    $controller_name = 'NotificationsController';
    Route::get("$module_name", ['as' => "$module_name.index", 'uses' => "$controller_name@index"]);
    Route::get("$module_name/markAllAsRead", ['as' => "$module_name.markAllAsRead", 'uses' => "$controller_name@markAllAsRead"]);
    Route::delete("$module_name/deleteAll", ['as' => "$module_name.deleteAll", 'uses' => "$controller_name@deleteAll"]);
    Route::get("$module_name/{id}", ['as' => "$module_name.show", 'uses' => "$controller_name@show"]);

    /*
    *
    *  Backup Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'backups';
    $controller_name = 'BackupController';
    Route::get("$module_name", ['as' => "$module_name.index", 'uses' => "$controller_name@index"]);
    Route::get("$module_name/create", ['as' => "$module_name.create", 'uses' => "$controller_name@create"]);
    Route::get("$module_name/download/{file_name}", ['as' => "$module_name.download", 'uses' => "$controller_name@download"]);
    Route::get("$module_name/delete/{file_name}", ['as' => "$module_name.delete", 'uses' => "$controller_name@delete"]);

    /*
    *
    *  Roles Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'roles';
    $controller_name = 'RolesController';
    Route::resource("$module_name", "$controller_name");

    /*
    *
    *  Users Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'users';
    $controller_name = 'UserController';
    Route::get("$module_name/profile/{id}", ['as' => "$module_name.profile", 'uses' => "$controller_name@profile"]);
    Route::get("$module_name/profile/{id}/edit", ['as' => "$module_name.profileEdit", 'uses' => "$controller_name@profileEdit"]);
    Route::patch("$module_name/profile/{id}/edit", ['as' => "$module_name.profileUpdate", 'uses' => "$controller_name@profileUpdate"]);
    Route::get("$module_name/emailConfirmationResend/{id}", ['as' => "$module_name.emailConfirmationResend", 'uses' => "$controller_name@emailConfirmationResend"]);
    Route::delete("$module_name/userProviderDestroy", ['as' => "$module_name.userProviderDestroy", 'uses' => "$controller_name@userProviderDestroy"]);
    Route::get("$module_name/profile/changeProfilePassword/{id}", ['as' => "$module_name.changeProfilePassword", 'uses' => "$controller_name@changeProfilePassword"]);
    Route::patch("$module_name/profile/changeProfilePassword/{id}", ['as' => "$module_name.changeProfilePasswordUpdate", 'uses' => "$controller_name@changeProfilePasswordUpdate"]);
    Route::get("$module_name/changePassword/{id}", ['as' => "$module_name.changePassword", 'uses' => "$controller_name@changePassword"]);
    Route::patch("$module_name/changePassword/{id}", ['as' => "$module_name.changePasswordUpdate", 'uses' => "$controller_name@changePasswordUpdate"]);
    Route::get("$module_name/trashed", ['as' => "$module_name.trashed", 'uses' => "$controller_name@trashed"]);
    Route::patch("$module_name/trashed/{id}", ['as' => "$module_name.restore", 'uses' => "$controller_name@restore"]);
    Route::get("$module_name/index_data", ['as' => "$module_name.index_data", 'uses' => "$controller_name@index_data"]);
    Route::get("$module_name/index_list", ['as' => "$module_name.index_list", 'uses' => "$controller_name@index_list"]);
    Route::resource("$module_name", "$controller_name");
    Route::patch("$module_name/{id}/block", ['as' => "$module_name.block", 'uses' => "$controller_name@block", 'middleware' => ['permission:block_users']]);
    Route::patch("$module_name/{id}/unblock", ['as' => "$module_name.unblock", 'uses' => "$controller_name@unblock", 'middleware' => ['permission:block_users']]);
});
