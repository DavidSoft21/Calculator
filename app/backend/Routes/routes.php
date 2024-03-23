<?php

use App\Support\Utils\Routes\Route;
use App\Backend\Http\Controllers\HomeController;

/** 
 * @author DavidSoft21
 * @date 2024-02-19
 * @email emer.riascos@correounivalle.edu.co
 * 
 */

/**
 * Defines a GET path for 'wellcome'.
 */
Route::get('/',  [HomeController::class, 'index']);

/**
 * Defines a POST path for '/suma'.
 */
Route::post('/suma',  [HomeController::class, 'suma']);


/**
 * Defines a POST path for '/resta'.
 */
Route::post('/resta',  [HomeController::class, 'resta']);

/**
 * Defines a POST path for '/division'.
 */
Route::post('/division',  [HomeController::class, 'division']);


/**
 * Defines a POST path for '/multiplicacion'.
 */
Route::post('/multiplicacion',  [HomeController::class, 'multiplicacion']);
