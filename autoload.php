<?php

/** 
 * @author DavidSoft21
 * @date 2024-02-19
 * @email emer.riascos@correounivalle.edu.co
 * 
 */

/**
 * 
 * Registra una función de autocarga de clases.
 *
 * Esta función se ejecuta cada vez que se intenta utilizar una clase que aún no ha sido definida.
 * Convierte el nombre de la clase en una ruta de archivo, reemplazando los separadores de espacio de nombres '\' por '/' y añadiendo '.php' al final.
 * Luego, verifica si el archivo existe y, en caso afirmativo, lo incluye.
 * Si el archivo no existe, termina la ejecución del script con un mensaje de error.
 *
 * @param string $class El nombre completo de la clase a cargar, incluyendo su espacio de nombres.
 */
spl_autoload_register(function ($class) {
    $ruta = './' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($ruta)) {
        require_once $ruta;
    } else {
        die("No se pudo cargar la clase $ruta");
    }
});
