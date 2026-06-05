<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MindyController;

Route::get('/', [MindyController::class, 'dashboard'])->name('dashboard');
Route::get('/chat', [MindyController::class, 'chat'])->name('chat');
Route::get('/products', [MindyController::class, 'products'])->name('products');
Route::get('/inquiries', [MindyController::class, 'inquiries'])->name('inquiries');
Route::get('/integrations', [MindyController::class, 'integrations'])->name('integrations');
Route::get('/security', [MindyController::class, 'security'])->name('security');
Route::get('/settings', [MindyController::class, 'settings'])->name('settings');
