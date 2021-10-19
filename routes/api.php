<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiCampaignsController;
use App\Http\Controllers\ApiGroupsController;
use App\Http\Controllers\ApiCitiesController;
use App\Http\Controllers\ApiProductsController;
use App\Http\Controllers\ApiProductHasCampaignsController;

Route::get('/campaigns', [ApiCampaignsController::class, 'index']);
Route::post('/campaigns', [ApiCampaignsController::class, 'store']);
Route::get('/campaign/{id}', [ApiCampaignsController::class, 'show']);
Route::put('/campaign/{id}', [ApiCampaignsController::class, 'update']);
Route::delete('/campaign/{id}', [ApiCampaignsController::class, 'destroy']);

Route::get('/groups', [ApiGroupsController::class, 'index']);
Route::post('/groups', [ApiGroupsController::class, 'store']);
Route::get('/group/{id}', [ApiGroupsController::class, 'show']);
Route::put('/group/{id}', [ApiGroupsController::class, 'update']);
Route::delete('/group/{id}', [ApiGroupsController::class, 'destroy']);

Route::get('/cities', [ApiCitiesController::class, 'index']);
Route::post('/cities', [ApiCitiesController::class, 'store']);
Route::get('/city/{id}', [ApiCitiesController::class, 'show']);
Route::put('/city/{id}', [ApiCitiesController::class, 'update']);
Route::delete('/city/{id}', [ApiCitiesController::class, 'destroy']);

Route::get('/products', [ApiProductsController::class, 'index']);
Route::post('/products', [ApiProductsController::class, 'store']);
Route::get('/product/{id}', [ApiProductsController::class, 'show']);
Route::put('/product/{id}', [ApiProductsController::class, 'update']);
Route::delete('/product/{id}', [ApiProductsController::class, 'destroy']);

Route::get('/productcampaigns', [ApiProductHasCampaignsController::class, 'index']);
Route::post('/productcampaigns', [ApiProductHasCampaignsController::class, 'store']);
Route::get('/productcampaign/{id}', [ApiProductHasCampaignsController::class, 'show']);
Route::put('/productcampaign/{id}', [ApiProductHasCampaignsController::class, 'update']);
Route::delete('/productcampaign/{id}', [ApiProductHasCampaignsController::class, 'destroy']);
