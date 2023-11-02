<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\BlacklistController;
use App\Http\Controllers\TwilioController;
use App\Http\Controllers\InboxController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name("backend-dashboard");

Route::get('lists', [ListController::class, 'index'])->name("backend-lists");
Route::get('list/create', [ListController::class, 'create'])->name("backend-list-create");
Route::post('list/store', [ListController::class, 'store'])->name("backend-list-store");

Route::get('contacts', [ContactController::class, 'contacts'])->name("backend-contacts");

Route::get('blacklist', [BlacklistController::class, 'blacklist'])->name("backend-blacklist");
Route::get('blacklist/create', [BlacklistController::class, 'create'])->name("backend-blacklist-create");
Route::post('blacklist/store', [BlacklistController::class, 'store'])->name("backend-blacklist-store");

Route::get('templates', [TemplateController::class, 'templates'])->name("backend-templates");
Route::get('templates/new', [TemplateController::class, 'new'])->name("backend-templates-new");
Route::post('templates/create', [TemplateController::class, 'create'])->name("backend-templates-create");

Route::get('campaigns', [CampaignController::class, 'index'])->name("backend-campaigns");
Route::get('campaign/create', [CampaignController::class, 'create'])->name("backend-campaign-create");
Route::post('campaign/store', [CampaignController::class, 'store'])->name("backend-campaign-store");
Route::get('campaign/{campaign}/run', [CampaignController::class, 'run'])->name("backend-campaign-run");

Route::get('inbox', [InboxController::class, 'index'])->name("backend-inbox");
Route::get('inbox/send', [InboxController::class, 'send_list'])->name("backend-inbox-send");
Route::get('inbox/{conversation}/show', [InboxController::class, 'show'])->name("backend-inbox-show");
Route::get('inbox/send/{conversation}/show', [InboxController::class, 'send_show'])->name("backend-inbox-send-show");
Route::post('inbox/{conversation}/create', [InboxController::class, 'create'])->name("backend-inbox-create");
// Route::post('campaign/store', [CampaignController::class, 'store'])->name("backend-campaign-store");
// Route::get('campaign/run', [CampaignController::class, 'run'])->name("backend-campaign-run");

Route::post('send', [TwilioController::class, 'sendMessage']);

// Incoming
Route::post('message/incoming', [TwilioController::class, 'incoming']);

// Status
Route::post('message/status', [TwilioController::class, 'status']);


Route::post('msg/incoming', [TwilioController::class, 'msg']);
