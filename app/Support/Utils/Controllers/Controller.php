<?php

namespace App\Support\Utils\Controllers;

use App\Support\Utils\Responses\Response;


/** 
 * @author DavidSoft21
 * @date 2024-02-19
 * @email emer.riascos@correounivalle.edu.co
 * 
 */



/**
 *Base controller.
 *
 * This class provides common functionality for all drivers.
 */
class Controller extends Response
{

    /**
     * Renders a view.
     *
     * This method takes a view path, converts it to a file path, and then attempts to load that file.
     * If the file exists, its contents are captured and returned as a string.
     * If the file does not exist, an error message is printed.
     *
     * @param string $route The path of the view to render, with directories separated by dots instead of slashes.
     * @return string The content of the view, or Error if the view is not found.
     */
    public function view($route, $data = [])
    {
        $path = './app/frontend/resources/views';
        if ($data) {
            extract($data);
        }
        $route = str_replace('.', '/', $route);
        $file = "$path/{$route}.php";
        
        if (file_exists($file)) {
        
            ob_start();
            require_once "$file";
            $content = ob_get_clean();
            foreach ($data as $key => $value) {
                $content = str_replace("%$key%", $value, $content);
            }
            return $content;
        } else {
            throw new \Exception("Not found the file " . $file . "  ");
        }
    }
}
