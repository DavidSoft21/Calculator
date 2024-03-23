<?php
// Setting the default timezone to 'America/Bogota'
date_default_timezone_set('America/Bogota');

/** 
 * @author DavidSoft21
 * @date 2024-02-19
 * @email emer.riascos@correounivalle.edu.co
 * 
 */

/**
 * Displays PHP configuration information. This is useful for 
 * debugging PHP configuration issues, Extensions etc.
 * 
 * */
//phpinfo();

/**
 * Automatically loads essential files for the project
 * */
require_once './autoload.php';

/**
 * Automatically loads files of libraries or plugins from composer
 * */
require_once './vendor/autoload.php';

/**
 * Loads the application's configuration file.
 * */
require_once './app/backend/config/config.php';

/**
 * Loads the file responsible for the application's routing.
 * */
// require_once '../app/backend/routes/routes.php';

/**
 * Loads the file responsible for the application's routing.
 * */
require_once './app/backend/routes/routes.php';

/**
 * Calls the static 'dispatch' method of the 'Route' class
 * This method is responsible for handling the current request 
 * and sends the response to the client.
 * */
App\Support\Utils\Routes\Route::dispatch();
