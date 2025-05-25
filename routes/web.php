<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DmAccessRoleController;
use App\Http\Controllers\DmUsersController;
use App\Http\Controllers\DmSizeContainerController;
use App\Http\Controllers\DmTypeContainerController;
use App\Http\Controllers\DmDepotContainerController;
use App\Http\Controllers\DmPortController;
use App\Http\Controllers\DmExportDirectScheduleController;
use App\Http\Controllers\DmExportNonDirectScheduleController;
use App\Http\Controllers\DmImportDirectScheduleController;
use App\Http\Controllers\DmImportNonDirectScheduleController;
use App\Http\Controllers\CommercialInvoiceController;
use App\Http\Controllers\TfListOrderController;
use App\Http\Controllers\TfFleetHistoryController;
use App\Http\Controllers\OtOpenTicketController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageShipmentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DraftDocumentController;
use App\Http\Controllers\DmBannerController;
use App\Http\Controllers\DmTruckController;
use App\Http\Controllers\ListTrackingController;


// main route
Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');


// login
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

// register
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Data Master Access Role
Route::resource('/dm-access-role', DmAccessRoleController::class);
Route::post('/dm-access-role/data', [DmAccessRoleController::class, 'getAccessRole'])->name('dm-access-role.data');
Route::get('/dm-access-role/{slug}/permissions', [DmAccessRoleController::class, 'permissions'])->name('dm-access-role.permissions');
Route::post('/dm-access-role/{slug}/update-permissions', [DmAccessRoleController::class, 'updatePermissions'])->name('dm-access-role.update-permissions');

// Data Master Users
Route::resource('/dm-users', DmUsersController::class);
Route::post('/dm-users/data', [DmUsersController::class, 'getUsers'])->name('dm-users.data');

// Data Master Banner
Route::resource('/dm-banner', DmBannerController::class);
Route::post('/dm-banner/data', [DmBannerController::class, 'getBanner'])->name('dm-banner.data');


// Data Master Size Container
Route::resource('/dm-size-container', DmSizeContainerController::class);
Route::post('/dm-size-container/data', [DmSizeContainerController::class, 'getSizeContainer'])->name('dm-size-container.data');

// Data Master Type Container   
Route::resource('/dm-type-container', DmTypeContainerController::class);
Route::post('/dm-type-container/data', [DmTypeContainerController::class, 'getTypeContainer'])->name('dm-type-container.data');

// Data Master Depot Container
Route::resource('/dm-depot-container', DmDepotContainerController::class);
Route::post('/dm-depot-container/data', [DmDepotContainerController::class, 'getDepotContainer'])->name('dm-depot-container.data');

// Data Master Truck
Route::resource('/dm-truck', DmTruckController::class);
Route::post('/dm-truck/data', [DmTruckController::class, 'getTruck'])->name('dm-truck.data');

// Data Master Port
Route::resource('/dm-port', DmPortController::class);
Route::post('/dm-port/data', [DmPortController::class, 'getPort'])->name('dm-port.data');

// Data Master Export Direct Schedule
Route::get('/dm-export-direct-schedule/import', [DmExportDirectScheduleController::class, 'import'])->name('dm-export-direct-schedule.import');
Route::resource('/dm-export-direct-schedule', DmExportDirectScheduleController::class);
Route::post('/dm-export-direct-schedule/data', [DmExportDirectScheduleController::class, 'getExportDirectSchedule'])->name('dm-export-direct-schedule.data');
Route::post('/dm-export-direct-schedule/import/store', [DmExportDirectScheduleController::class, 'importStore'])->name('dm-export-direct-schedule.import-store');

// Data Master Export Non Direct Schedule
Route::get('/dm-export-non-direct-schedule/import', [DmExportNonDirectScheduleController::class, 'import'])->name('dm-export-non-direct-schedule.import');
Route::resource('/dm-export-non-direct-schedule', DmExportNonDirectScheduleController::class);
Route::post('/dm-export-non-direct-schedule/data', [DmExportNonDirectScheduleController::class, 'getExportNonDirectSchedule'])->name('dm-export-non-direct-schedule.data');
Route::post('/dm-export-non-direct-schedule/import/store', [DmExportNonDirectScheduleController::class, 'importStore'])->name('dm-export-non-direct-schedule.import-store');

// Data Master Import Direct Schedule
Route::get('/dm-import-direct-schedule/import', [DmImportDirectScheduleController::class, 'import'])->name('dm-import-direct-schedule.import');
Route::resource('/dm-import-direct-schedule', DmImportDirectScheduleController::class);
Route::post('/dm-import-direct-schedule/data', [DmImportDirectScheduleController::class, 'getImportDirectSchedule'])->name('dm-import-direct-schedule.data');
Route::post('/dm-import-direct-schedule/import/store', [DmImportDirectScheduleController::class, 'importStore'])->name('dm-import-direct-schedule.import-store');

// Data Master Import Non Direct Schedule
Route::get('/dm-import-non-direct-schedule/import', [DmImportNonDirectScheduleController::class, 'import'])->name('dm-import-non-direct-schedule.import');
Route::resource('/dm-import-non-direct-schedule', DmImportNonDirectScheduleController::class);
Route::post('/dm-import-non-direct-schedule/data', [DmImportNonDirectScheduleController::class, 'getImportNonDirectSchedule'])->name('dm-import-non-direct-schedule.data');
Route::post('/dm-import-non-direct-schedule/import/store', [DmImportNonDirectScheduleController::class, 'importStore'])->name('dm-import-non-direct-schedule.import-store');


// Manage Shipment
Route::get('manage-shipment/{status}', [ManageShipmentController::class, 'index'])
    ->where('status', 'pending|on-progress|rejected|completed|cancel')
    ->name('manage-shipment');

// Manage Shipment - Data untuk DataTables
Route::post('manage-shipment/pending/data', [ManageShipmentController::class, 'pending'])->name('manage-shipment.pending.data');
Route::post('manage-shipment/on-progress/data', [ManageShipmentController::class, 'onProgress'])->name('manage-shipment.on-progress.data');
Route::post('manage-shipment/completed/data', [ManageShipmentController::class, 'completed'])->name('manage-shipment.completed.data');
Route::post('manage-shipment/rejected/data', [ManageShipmentController::class, 'rejected'])->name('manage-shipment.rejected.data');
Route::post('manage-shipment/cancel/data', [ManageShipmentController::class, 'cancel'])->name('manage-shipment.cancel.data');


// commercial invoice
Route::post('/commercial-invoice/update-status', [CommercialInvoiceController::class, 'updateStatus'])->name('commercial-invoice.updateStatus');
Route::post('/commercial-invoice/upload-invoice/{shipmentNumber}', [CommercialInvoiceController::class, 'uploadInvoice'])->name('commercial-invoice.uploadInvoice');
Route::get('commercial-invoice', [CommercialInvoiceController::class, 'index'])->name('commercial-invoice.index');
Route::get('commercial-invoice/history/{slug}', [CommercialInvoiceController::class, 'historyInvoice'])->name('commercial-invoice.historyInvoice');
Route::post('/commercial-invoice/data', [CommercialInvoiceController::class, 'getCommercialInvoices'])->name('commercial-invoice.data');

// draft document
Route::get('draft-document', [DraftDocumentController::class, 'index'])->name('draft-document.index');
Route::post('/draft-document/data', [DraftDocumentController::class, 'getDraftDocument'])->name('draft-document.data');
Route::get('draft-document/history/{slug}', [DraftDocumentController::class, 'historyDraft'])->name('draft-document.historyDraft');
Route::post('/draft-document/upload-draft/{quote_number}', [DraftDocumentController::class, 'uploadDraft'])->name('draft-document.uploadDraft');

// tracking fleet list order
Route::get('tf-list-order', [TfListOrderController::class, 'index'])->name('tf-list-order.index');
Route::post('/tf-list-order/data', [TfListOrderController::class, 'getTflistOrder'])->name('tf-list-order.data');
Route::get('/tf-list-order/{shipment_no}', [TfListOrderController::class, 'show'])->name('tf-list-order.show');


// tracking fleet fleet history
Route::get('tf-fleet-history', [TfFleetHistoryController::class, 'index'])->name('tf-fleet-history.index');
Route::post('/tf-fleet-history/data', [TfFleetHistoryController::class, 'getTfFleetHistory'])->name('tf-fleet-history.data');
Route::get('/tf-fleet-history/{fleet_number}', [TfFleetHistoryController::class, 'show'])->name('tf-fleet-history.show');

// open ticket
// Route::get('/ot-open-ticket/reply/{subject}', [OtOpenTicketController::class, 'reply'])->name('ot-open-ticket.reply');
Route::match(['get', 'post'], '/ot-open-ticket/reply/{subject}', [OtOpenTicketController::class, 'reply'])->name('ot-open-ticket.reply');
Route::resource('ot-open-ticket', OtOpenTicketController::class);
Route::post('/ot-open-ticket/data', [OtOpenTicketController::class, 'getOpenTicket'])->name('ot-open-ticket.data');

// List Tracking
Route::resource('list-tracking', ListTrackingController::class);
Route::post('/list-tracking/data', [ListTrackingController::class, 'getListTracking'])->name('list-tracking.data');

// fallback route
Route::fallback(function () {
    return abort(404);
});

// Data Master Access Role - Edit
Route::get('dm-access-role/{slug}/edit', [DmAccessRoleController::class, 'edit'])->name('dm-access-role.edit');

// Data Master Access Role - Update
Route::put('dm-access-role/{slug}', [DmAccessRoleController::class, 'update'])->name('dm-access-role.update');

// Data Master Users - Edit
Route::get('dm-users/{slug}/edit', [DmUsersController::class, 'edit'])->name('dm-users.edit');

// Data Master Banner - Edit
Route::get('dm-banner/{slug}/edit', [DmBannerController::class, 'edit'])->name('dm-banner.edit');

// Data Master Users - Update
Route::put('dm-users/{slug}', [DmUsersController::class, 'update'])->name('dm-users.update');

// Data Master Banner - Update
Route::put('dm-banner/{slug}', [DmBannerController::class, 'update'])->name('dm-banner.update');

// Data Master Size Container - Edit
Route::get('dm-size-container/{slug}/edit', [DmSizeContainerController::class, 'edit'])->name('dm-size-container.edit');

// Data Master Size Container - Update
Route::put('dm-size-container/{slug}', [DmSizeContainerController::class, 'update'])->name('dm-size-container.update');

// Data Master Type Container - Edit
Route::get('dm-type-container/{slug}/edit', [DmTypeContainerController::class, 'edit'])->name('dm-type-container.edit');

// Data Master Type Container - Update
Route::put('dm-type-container/{slug}', [DmTypeContainerController::class, 'update'])->name('dm-type-container.update');

// Data Master Depot Container - Edit
Route::get('dm-depot-container/{slug}/edit', [DmDepotContainerController::class, 'edit'])->name('dm-depot-container.edit');

// Data Master Depot Container - Update
Route::put('dm-depot-container/{slug}', [DmDepotContainerController::class, 'update'])->name('dm-depot-container.update');

// Data Master Truck - Edit
Route::get('dm-truck/{slug}/edit', [DmTruckController::class, 'edit'])->name('dm-truck.edit');

// Data Master Truck - Update
Route::put('dm-truck/{slug}', [DmTruckController::class, 'update'])->name('dm-truck.update');

// Data Master Port - Edit
Route::get('dm-port/{slug}/edit', [DmPortController::class, 'edit'])->name('dm-port.edit');

// Data Master Port - Update
Route::put('dm-port/{slug}', [DmPortController::class, 'update'])->name('dm-port.update');

// Data Master Export Direct Schedule - Edit
Route::get('dm-export-direct-schedule/{slug}/edit', [DmExportDirectScheduleController::class, 'edit'])->name('dm-export-direct-schedule.edit');

// Data Master Export Direct Schedule - Update  
Route::put('dm-export-direct-schedule/{slug}', [DmExportDirectScheduleController::class, 'update'])->name('dm-export-direct-schedule.update');

// Data Master Export Non Direct Schedule - Edit
Route::get('dm-export-non-direct-schedule/{slug}/edit', [DmExportNonDirectScheduleController::class, 'edit'])->name('dm-export-non-direct-schedule.edit');

// Data Master Export Non Direct Schedule - Update
Route::put('dm-export-non-direct-schedule/{slug}', [DmExportNonDirectScheduleController::class, 'update'])->name('dm-export-non-direct-schedule.update');

// Data Master Import Direct Schedule - Edit
Route::get('dm-import-direct-schedule/{slug}/edit', [DmImportDirectScheduleController::class, 'edit'])->name('dm-import-direct-schedule.edit');

// Data Master Import Direct Schedule - Update
Route::put('dm-import-direct-schedule/{slug}', [DmImportDirectScheduleController::class, 'update'])->name('dm-import-direct-schedule.update');

// Data Master Import Non Direct Schedule - Edit
Route::get('dm-import-non-direct-schedule/{slug}/edit', [DmImportNonDirectScheduleController::class, 'edit'])->name('dm-import-non-direct-schedule.edit');

// Data Master Export Non Direct Schedule - Update
Route::put('dm-import-non-direct-schedule/{slug}', [DmImportNonDirectScheduleController::class, 'update'])->name('dm-import-non-direct-schedule.update');