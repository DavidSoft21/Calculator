<?php

namespace App\Support\Utils\Models;

use App\support\Utils\Databases\DatabaseManager;
use PDO;
use PDOException;

/** 
 * @author DavidSoft21
 * @date 2024-02-21
 * @email emer.riascos@correounivalle.edu.co
 * 
 */

/**
 * Model class
 *
 * This class provides an abstraction layer for interacting with the database.
 * Provides methods to perform CRUD (Create, Read, Update, Delete) operations on the database.
 */
class Model
{

    /**
     * @var string $table_suffix Suffix of the table in the database.
     * @var PDO $connection Connection to the database.
     * @var string $table Name of the table in the database.
     * @var string $primaryKey Name of the primary key in the table.
     * @var string $slug Name of the slug field in the table.
     * @var boolean $timestamps timestamps to table.
     * @var array $fillable Fields that can be filled in the table.
     * @var PDOStatement $query Last query executed.
     */
    protected $table_suffix;
    protected $connection;
    protected $table;
    protected $primaryKey;
    protected $slug;
    protected $fillable;
    protected $query;
    protected $timestamps;




    /**
     * Constructor of the Model class.
     *
     * Establishes the connection to the database and assigns the name of the table.
     */
    public function __construct()
    {

        header('Access-Control-Allow-Origin:*');
        header('Content-Type: application/json');
        header("Acces-Control-Allow-Credentials: true");
        header('Acces-allow-Methods: GET,PUT,POST,DELETE');
        header('Access-Control-Allow-Headers: Content-Type, Autorization, X-Requested-Whit');
        try {
            $this->timestamps = true;
            $this->table = $this->table_suffix . $this->table;
            DatabaseManager::open_connection(
                DB_CONNECTION,
                DB_HOST,
                DB_PORT,
                DB_DATABASE,
                DB_USERNAME,
                DB_PASSWORD
            );

            $this->connection = DatabaseManager::get_connection();
        } catch (PDOException $e) {
            die("Error al conectar a la base de datos: " . $e->getMessage());
        }
    }

    /**
     * Executes a SQL query on the database.
     *
     * @param string $sql SQL query to execute.
     * @param array $params Parameters for the SQL query.
     * @return array Query result.
     */
    public function query($sql, $params = [])
    {
        try {

            $stmt = $this->connection->prepare($sql);
            $stmt->execute($params);
            $this->query = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $this->query;
        } catch (PDOException $e) {
            die("Error al ejecutar la consulta: " . $e->getMessage());
        }
    }

    /**
     * Gets the first record in the table.
     *
     * @return array First record in the table.
     */
    public function first()
    {
        try {

            $stmt = $this->connection->prepare(
                "select * from {$this->table} where {$this->primaryKey} = (
                select min({$this->primaryKey}) from {$this->table}) LIMIT 1"
            );

            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error al obtener el primer registro: " . $e->getMessage());
        }
    }


    /**
     * Gets the last record in the table.
     *
     * @return array Last record in the table.
     */
    public function last()
    {
        try {

            $stmt = $this->connection->prepare(
                "select * from {$this->table} where {$this->primaryKey} = (
                select max({$this->primaryKey}) from Ñ$this->table}) LIMIT 1"
            );

            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error al obtener el ultimo registro: " . $e->getMessage());
        }
    }

    /**
     * Gets all records from the last query executed.
     *
     * @return array Records of the last query.
     */
    public function get()
    {
        if ($this->query instanceof \PDOStatement) {
            try {
                return $this->query->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Error al obtener todos los registros: " . $e->getMessage());
            }
        } else {
            die("Error: No se ha ejecutado ninguna consulta.");
        }
    }

    /**
     * Search for a record by its ID.
     *
     * @param mixed $id ID of the record to search for.
     * @return array Record found.
     */
    public function find($id)
    {
        try {
            $sql = "select * from {$this->table} where {$this->primaryKey} = ? LIMIT 1";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error al buscar el registro: " . $e->getMessage());
        }
    }


    /**
     * Gets all records in the table.
     *
     * @return Model Instance of the Model class.
     */
    public function all()
    {
        try {

            $this->query("SELECT * FROM {$this->table}");
            return $this;
        } catch (PDOException $e) {
            die("Error al obtener todos los registros: " . $e->getMessage());
        }
    }

    /**
     * Searches for records that meet a condition.
     *
     * @param string $column Column to search.
     * @param string $operator Condition operator.
     * @param mixed $value Condition value.
     * @return Model Instance of the Model class.
     */
    public function where($column, $operator, $value)
    {

        try {
            $sql = "select * from {$this->table} where {$column} {$operator} ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$value]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Error al buscar el registro: " . $e->getMessage());
        }
    }


    /**
     * Inserts a new record into the table.
     *
     * @param array $data Data of the new record.
     * @return mixed ID of the new record or array with message and ID.
     */
    public function insert($data)
    {

        try {
            $arr = array("created_at" => "NOW()") + $data;
            $columns = implode(',', array_keys($arr));
            $values = implode(',', array_fill(0, count($arr), '?'));
            $sql = "insert into {$this->table} ({$columns}) values ({$values})";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute(array_values($arr));

            if (isset($arr[$this->slug])) {
                return ['msg' => 'inserted', 'id' => $this->connection->lastInsertId(), $this->slug => $arr[$this->slug]];
            }

            return $this->connection->lastInsertId();
        } catch (PDOException $e) {
            die("Error al insertar el registro: " . $e->getMessage());
        }
    }

    /**
     * Updates a record in the table.
     *
     * @param array $data New record data.
     * @param mixed $id ID of the record to update.
     * @return mixed Number of affected rows or array with message and slug.
     */
    public function update($data, $id)
    {

        $exist = $this->where($this->primaryKey, '=', $id[0]);

        if (empty($exist)) {
            return ['msg' => 'not found', "id" => $id];
        }

        try {
            $arr = array("updated_at" => "NOW()") + $data;

            $columns = implode('=?,', array_keys($arr)) . '=?';
            $sql = "update {$this->table} set {$columns} where {$this->primaryKey} = ?";


            $stmt = $this->connection->prepare($sql);


            $stmt->execute(array_merge(array_values($arr), $id));
            if (isset($arr[$this->slug])) {
                return ['msg' => 'updated', $this->slug => $arr[$this->slug]];
            }
            return $stmt->rowCount();
        } catch (PDOException $e) {
            die("Error al actualizar el registro: " . $e->getMessage());
        }
    }

    /**
     * Delete a record from the table.
     *
     * @param mixed $id ID of the record to delete.
     * @return array Message and ID of the deleted record.
     */
    public function delete($id)
    {
        $exist = $this->where($this->primaryKey, '=', $id);
        if (empty($exist)) {
            return ['msg' => 'not found', "id" => $id];
        }

        try {
            $sql = "delete from {$this->table} where {$this->primaryKey} = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($id);
            return ['msg' => 'deleted', $id];
        } catch (PDOException $e) {
            die("Error al eliminar el registro: " . $e->getMessage());
        }
    }

    /**
     * Destructor of the Model class.
     *
     * Closes the connection to the database.
     */
    public function __destruct()
    {
        DatabaseManager::close_connection();
        return "Connection closed.";
    }
}
