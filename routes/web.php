<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\TwilioController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('contacts', [ContactController::class, 'contacts'])->name("backend-contacts");
Route::get('contact-import', [ContactController::class, 'import'])->name("backend-contact-import");
Route::post('contact-upload', [ContactController::class, 'upload'])->name("backend-contact-upload");

Route::get('templates', [TemplateController::class, 'templates'])->name("backend-templates");
Route::get('templates/new', [TemplateController::class, 'new'])->name("backend-templates-new");
Route::post('templates/create', [TemplateController::class, 'create'])->name("backend-templates-create");

Route::get('campaigns', [CampaignController::class, 'index'])->name("backend-campaigns");
Route::get('campaign/create', [CampaignController::class, 'create'])->name("backend-campaign-new");
Route::post('campaign/create', [CampaignController::class, 'store'])->name("backend-campaign-create");
Route::get('campaign/run', [CampaignController::class, 'run'])->name("backend-campaign-run");

Route::post('send', [TwilioController::class, 'sendMessage']);


