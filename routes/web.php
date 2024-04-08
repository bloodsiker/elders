<?php

use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\MonsterController;
use App\Http\Controllers\Admin\NpsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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

Route::middleware('web')->group(function () {

    Route::get('items', [HomeController::class, 'items'])->name('items');
    Route::get('item/{id}', [HomeController::class, 'itemDetails'])->name('item.details');
    Route::get('nps', [HomeController::class, 'nps'])->name('nps');
    Route::get('quests', [HomeController::class, 'quests'])->name('quests');
    Route::get('artifacts', [HomeController::class, 'artifacts'])->name('artifacts');
    Route::get('monsters', [HomeController::class, 'monsters'])->name('monsters');
    Route::get('location/{id}', [HomeController::class, 'location'])->name('location');
    Route::get('monster/{id}/{child_id}', [HomeController::class, 'monsterDetails'])->name('monster.details');
    Route::get('monster/{id}', [HomeController::class, 'monster'])->name('monster');

    Route::get('login', [AuthController::class, 'loginView'])->name('login-view');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::get('forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password');
    Route::post('forgot-password', [AuthController::class, 'forgotPasswordSend'])->name('forgot-password.send');
    Route::get('reset-password/{token}', [AuthController::class, 'resetPassword'])->name('password.reset');
    Route::post('reset-password', [AuthController::class, 'updatePassword'])->name('password.update');

});

Route::middleware('auth')->group(function () {

    Route::prefix('admin')->middleware('is_admin')->group(function () {
        Route::get('/locations', [LocationController::class, 'list'])->name('admin.location.list');
        Route::post('/location/create', [LocationController::class, 'create'])->name('admin.location.create');
        Route::get('/location/{id}/monsters', [LocationController::class, 'monsters'])->name('admin.location.monsters');
        Route::post('/location/{id}/monster/add', [LocationController::class, 'addMonster'])->name('admin.location.monster.add');
        Route::get('/location/{id}/monster/{monster_id}/delete', [LocationController::class, 'deleteMonster'])->name('admin.location.monster.delete');
        Route::get('/location/{id}/items', [LocationController::class, 'items'])->name('admin.location.items');
        Route::post('/location/{id}/item/add', [LocationController::class, 'addItem'])->name('admin.location.item.add');
        Route::get('/location/{id}/item/{item_id}/delete', [LocationController::class, 'deleteItem'])->name('admin.location.item.delete');
        Route::get('/location/{id}/nps', [LocationController::class, 'nps'])->name('admin.location.nps');
        Route::post('/location/{id}/nps/add', [LocationController::class, 'addNps'])->name('admin.location.nps.add');
        Route::get('/location/{id}/nps/{nps_id}/delete', [LocationController::class, 'deleteNps'])->name('admin.location.nps.delete');

        Route::post('/nps/create', [NpsController::class, 'create'])->name('admin.nps.create');
        Route::post('/nps/{id}/add_location', [NpsController::class, 'addLocation'])->name('admin.nps.add_location');
        Route::get('/nps/{id}/delete/{location_id}', [NpsController::class, 'delete'])->name('admin.nps.delete_location');
        Route::get('/nps/{id}', [NpsController::class, 'details'])->name('admin.nps.details');
        Route::get('/nps', [NpsController::class, 'list'])->name('admin.nps.list');

        Route::get('/monsters', [MonsterController::class, 'list'])->name('admin.monster.list');
        Route::post('/monster/create', [MonsterController::class, 'create'])->name('admin.monster.create');
        Route::post('/monster/update', [MonsterController::class, 'update'])->name('admin.monster.update');
        Route::post('/monster/get', [MonsterController::class, 'getMonster'])->name('admin.monster.get');
        Route::get('/monster/{id}/delete', [MonsterController::class, 'delete'])->name('admin.monster.delete');
        Route::post('/monster/{id}/add', [MonsterController::class, 'addMonster'])->name('admin.monster.add');
        Route::get('/monster/{id}', [MonsterController::class, 'details'])->name('admin.monster.details');

        Route::get('/items', [ItemController::class, 'list'])->name('admin.item.list');
        Route::post('/item/create', [ItemController::class, 'create'])->name('admin.item.create');
        Route::post('/item/update', [ItemController::class, 'update'])->name('admin.item.update');
        Route::post('/item/get', [ItemController::class, 'getItem'])->name('admin.item.get');
        Route::post('/item/{id}/add_item', [ItemController::class, 'addItem'])->name('admin.item.add_item');
        Route::get('/item/{id}/delete_item/{item_id}', [ItemController::class, 'deleteRelationItem'])->name('admin.item.delete_item');
        Route::post('/item/{id}/add_artifact', [ItemController::class, 'addArtifact'])->name('admin.item.add_artifact');
        Route::post('/item/{id}/add_equipment', [ItemController::class, 'addEquipment'])->name('admin.item.add_equipment');
        Route::post('/item/{id}/add_location', [ItemController::class, 'addLocation'])->name('admin.item.add_location');
        Route::get('/item/{id}/delete_location/{location_id}', [ItemController::class, 'deleteLocation'])->name('admin.item.delete_location');
        Route::post('/item/{id}/add_monster', [ItemController::class, 'addMonster'])->name('admin.item.add_monster');
        Route::get('/item/{id}/delete_monster/{monster_id}', [ItemController::class, 'deleteMonster'])->name('admin.item.delete_monster');
        Route::get('/item/{id}/delete', [ItemController::class, 'delete'])->name('admin.item.delete');
        Route::get('/item/{id}', [ItemController::class, 'details'])->name('admin.item.view');
    });

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');


//    Route::get('dashboard-overview-1-page', [PageController::class, 'dashboardOverview1'])->name('dashboard-overview-1');
//    Route::get('dashboard-overview-2-page', [PageController::class, 'dashboardOverview2'])->name('dashboard-overview-2');
//    Route::get('dashboard-overview-3-page', [PageController::class, 'dashboardOverview3'])->name('dashboard-overview-3');
//    Route::get('inbox-page', [PageController::class, 'inbox'])->name('inbox');
//    Route::get('file-manager-page', [PageController::class, 'fileManager'])->name('file-manager');
//    Route::get('point-of-sale-page', [PageController::class, 'pointOfSale'])->name('point-of-sale');
//    Route::get('chat-page', [PageController::class, 'chat'])->name('chat');
//    Route::get('post-page', [PageController::class, 'post'])->name('post');
//    Route::get('calendar-page', [PageController::class, 'calendar'])->name('calendar');
//    Route::get('crud-data-list-page', [PageController::class, 'crudDataList'])->name('crud-data-list');
//    Route::get('crud-form-page', [PageController::class, 'crudForm'])->name('crud-form');
//    Route::get('users-layout-1-page', [PageController::class, 'usersLayout1'])->name('users-layout-1');
//    Route::get('users-layout-2-page', [PageController::class, 'usersLayout2'])->name('users-layout-2');
//    Route::get('users-layout-3-page', [PageController::class, 'usersLayout3'])->name('users-layout-3');
//    Route::get('profile-overview-1-page', [PageController::class, 'profileOverview1'])->name('profile-overview-1');
//    Route::get('profile-overview-2-page', [PageController::class, 'profileOverview2'])->name('profile-overview-2');
//    Route::get('profile-overview-3-page', [PageController::class, 'profileOverview3'])->name('profile-overview-3');
//    Route::get('wizard-layout-1-page', [PageController::class, 'wizardLayout1'])->name('wizard-layout-1');
//    Route::get('wizard-layout-2-page', [PageController::class, 'wizardLayout2'])->name('wizard-layout-2');
//    Route::get('wizard-layout-3-page', [PageController::class, 'wizardLayout3'])->name('wizard-layout-3');
//    Route::get('blog-layout-1-page', [PageController::class, 'blogLayout1'])->name('blog-layout-1');
//    Route::get('blog-layout-2-page', [PageController::class, 'blogLayout2'])->name('blog-layout-2');
//    Route::get('blog-layout-3-page', [PageController::class, 'blogLayout3'])->name('blog-layout-3');
//    Route::get('pricing-layout-1-page', [PageController::class, 'pricingLayout1'])->name('pricing-layout-1');
//    Route::get('pricing-layout-2-page', [PageController::class, 'pricingLayout2'])->name('pricing-layout-2');
//    Route::get('invoice-layout-1-page', [PageController::class, 'invoiceLayout1'])->name('invoice-layout-1');
//    Route::get('invoice-layout-2-page', [PageController::class, 'invoiceLayout2'])->name('invoice-layout-2');
//    Route::get('faq-layout-1-page', [PageController::class, 'faqLayout1'])->name('faq-layout-1');
//    Route::get('faq-layout-2-page', [PageController::class, 'faqLayout2'])->name('faq-layout-2');
//    Route::get('faq-layout-3-page', [PageController::class, 'faqLayout3'])->name('faq-layout-3');
//    Route::get('login-page', [PageController::class, 'login'])->name('login');
//    Route::get('register-page', [PageController::class, 'register'])->name('register');
//    Route::get('error-page-page', [PageController::class, 'errorPage'])->name('error-page');
//    Route::get('update-profile-page', [PageController::class, 'updateProfile'])->name('update-profile');
//    Route::get('change-password-page', [PageController::class, 'changePassword'])->name('change-password');
//    Route::get('regular-table-page', [PageController::class, 'regularTable'])->name('regular-table');
//    Route::get('tabulator-page', [PageController::class, 'tabulator'])->name('tabulator');
//    Route::get('modal-page', [PageController::class, 'modal'])->name('modal');
//    Route::get('slide-over-page', [PageController::class, 'slideOver'])->name('slide-over');
//    Route::get('notification-page', [PageController::class, 'notification'])->name('notification');
//    Route::get('accordion-page', [PageController::class, 'accordion'])->name('accordion');
//    Route::get('button-page', [PageController::class, 'button'])->name('button');
//    Route::get('alert-page', [PageController::class, 'alert'])->name('alert');
//    Route::get('progress-bar-page', [PageController::class, 'progressBar'])->name('progress-bar');
//    Route::get('tooltip-page', [PageController::class, 'tooltip'])->name('tooltip');
//    Route::get('dropdown-page', [PageController::class, 'dropdown'])->name('dropdown');
//    Route::get('typography-page', [PageController::class, 'typography'])->name('typography');
//    Route::get('icon-page', [PageController::class, 'icon'])->name('icon');
//    Route::get('loading-icon-page', [PageController::class, 'loadingIcon'])->name('loading-icon');
//    Route::get('regular-form-page', [PageController::class, 'regularForm'])->name('regular-form');
//    Route::get('datepicker-page', [PageController::class, 'datepicker'])->name('datepicker');
//    Route::get('tail-select-page', [PageController::class, 'tailSelect'])->name('tail-select');
//    Route::get('file-upload-page', [PageController::class, 'fileUpload'])->name('file-upload');
//    Route::get('wysiwyg-editor-page', [PageController::class, 'wysiwygEditor'])->name('wysiwyg-editor');
//    Route::get('validation-page', [PageController::class, 'validation'])->name('validation');
//    Route::get('chart-page', [PageController::class, 'chart'])->name('chart');
//    Route::get('slider-page', [PageController::class, 'slider'])->name('slider');
//    Route::get('image-zoom-page', [PageController::class, 'imageZoom'])->name('image-zoom');
});

Route::get('/', [HomeController::class, 'main'])->name('main');
