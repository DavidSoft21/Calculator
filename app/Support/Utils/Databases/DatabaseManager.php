<?php

namespace App\support\Utils\Databases;

use App\Support\Utils\Responses\Response;

/** 
 * @author DavidSoft21
 * @date 2024-02-21
 * @email emer.riascos@correounivalle.edu.co
 * 
 */

/**
 * DatabaseManager class
 *
 * This class is responsible for managing the connection to the database.
 * Provides methods to open and close the connection, and to get the current connection.
 */
class DatabaseManager
{

    /**
     * @var \PDO The connection to the database.
     */
    private static $connection;

    /**
     * Opens a connection to the database.
     *
     * @param string $driver The database driver. Default is 'mysql'.
     * @param string $host The database host. Default is 'localhost'.
     * @param string $port The database port. Default is '3306'.
     * @param string $database The name of the database. Default is 'mysql'.
     * @param string $username The username for the database. By default it is 'root'.
     * @param string $password The password for the database. By default it is ''.
     * @param string $charset The character set for the database. Default is 'utf8'.
     * @param string $collation The collation for the database. Default is 'utf8_unicode_ci'.
     */

    public static function open_connection($driver = 'mysql', $host = 'localhost', $port = '3306', $database = 'mysql', $username = 'root', $password = '', $charset = 'utf8', $collation = 'utf8_unicode_ci')
    {

        if (!isset($connection)) {

            switch ($driver) {
                case 'pgsql':

                    try {
                        self::$connection = new \PDO(
                            "pgsql:host=$host;port=$port;dbname=$database",
                            $username,
                            $password
                        );

                        self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

                        // set the search_path
                        self::$connection->exec("SET search_path TO $database");

                        // set the client_encoding
                        self::$connection->exec("SET NAMES 'UTF8'");
                    } catch (\PDOException $e) {
                        echo "Error " . $e->getMessage() . "<br>";
                    }

                    break;
                case 'mysql':

                    try {
                        $connection = new \PDO(
                            "mysql:host=$host;port=$port;dbname=$database;charset=$charset",
                            $username,
                            $password
                        );
                
                        self::$connection->exec("SET CHARACTER SET utf8");
                    } catch (\PDOException $e) {
                        echo "Error " . $e->getMessage() . "<br>";
                    }
                    break;
                case 'sqlite':
                    try {
                        $connection = new \PDO(
                            "sqlite:$database"
                        );
                    } catch (\PDOException $e) {
                        echo "Error " . $e->getMessage() . "<br>";
                    }
                    break;
                case 'sqlsrv':
                    try {
                        $connection = new \PDO(
                            "sqlsrv:Server=$host,$port;Database=$database",
                            $username,
                            $password
                        );
                    } catch (\PDOException $e) {
                        echo "Error " . $e->getMessage() . "<br>";
                    }
                    break;
                default:
                    $connection = null;
                    break;
            }
        }
    }


    /**
     * Close the connection to the database.
     */
    public static function close_connection()
    {
        if (isset(self::$connection)) {
            self::$connection = null;
        }
    }

    /**
     * Gets the connection to the database.
     *
     * @return \PDO|null The connection to the database, or null if the connection is not established.
     */
    public static function get_connection()
    {
        if (isset(self::$connection)) {
            return self::$connection;
        } else {
            echo "Conexión no establecida!.";
        }
    }
}
