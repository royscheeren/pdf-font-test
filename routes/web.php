<?php

use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('generate-pdf', [PDFController::class, 'generatePDF']);
