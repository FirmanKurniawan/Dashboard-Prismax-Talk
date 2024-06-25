<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AnalyticController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\HBMonitorController;
use App\Http\Controllers\CallsignController;
use App\Http\Controllers\LastheardController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\PistarController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\TriggerController;

Route::get('/', function () {
    return view('index');
});

Route::get('/monitoring/index', [MonitoringController::class, 'index'])->name('monitoring.index');
Route::post('/monitoring/generate', [MonitoringController::class, 'generate']);
Route::post('/monitoring/verify', [MonitoringController::class, 'verify']);
Route::get('/monitoring/list', [MonitoringController::class, 'list']);

Route::get('/company/index', [CompanyController::class, 'index'])->name('company.index');
Route::post('/company/store', [CompanyController::class, 'store']);
Route::get('/company/list', [CompanyController::class, 'list']);

Route::get('/order/index', [OrderController::class, 'index'])->name('order.index');

Route::get('/analytics', [AnalyticController::class, 'index'])->name('analytic.index');

Route::get('/report', [ReportController::class, 'index'])->name('report.index');
Route::get('/report/master', [ReportController::class, 'master']);
Route::get('/report/callsign', [ReportController::class, 'callsign']);

Route::get('/hbmonitor', [HBMonitorController::class, 'index'])->name('hbmonitor.index');
Route::get('/pistar', [PistarController::class, 'index'])->name('pistar.index');

Route::get('/callsign', [CallsignController::class, 'index'])->name('callsign.index');
Route::post('/callsign/store', [CallsignController::class, 'store']);
Route::get('/callsign/list', [CallsignController::class, 'list']);

Route::get('/lastheard', [LastheardController::class, 'index'])->name('lastheard.index');
Route::get('/lastheard/list', [LastheardController::class, 'list']);

Route::get('/master', [MasterController::class, 'index'])->name('master.index');
Route::get('/master/live_data', [MasterController::class, 'api_live_data']);
Route::get('/master/lastheard', [MasterController::class, 'lastheard']);

Route::get('/map', [MapController::class, 'index'])->name('map.index');
Route::post('/getGPS', [MapController::class, 'getGPS']);
Route::get('/getMap', [MapController::class, 'getMap']);

// Route::post('/requestGPS', [MapController::class, 'requestGPS']);
Route::get('/requestGPS/{data}', [MapController::class, 'requestGPS']);
Route::get('/checkStatus', [TriggerController::class, 'checkStatus']);
Route::get('/callbackStatus', [TriggerController::class, 'callbackStatus']);

Route::get('/device', [DeviceController::class, 'index'])->name('device.index');
Route::post('/device/store', [DeviceController::class, 'store']);
Route::get('/device/list', [DeviceController::class, 'list']);