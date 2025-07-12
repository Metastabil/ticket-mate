<?php
namespace App\Models;

use System\Classes\Database;
use PDO;

/**
 * @author Julius Derigs
 * @version 1.0.0
 */

class BaseModel {
    /**
     * @var Database
     */
    protected Database $database_instance;

    /**
     * @var PDO
     */
    protected PDO $db;

    /**
     * Constructor
     */
    public function __construct() {
        $this->database_instance = new Database();
        $this->db = $this->database_instance->connect();
    }

    /**
     * @param string $folder
     * @param string $file
     * @return string
     */
    protected function query(string $folder, string $file) :string {
        $path = dirname(__DIR__) . "/sql/$folder/$file.sql";

        if (!is_file($path)) {
            die("Unknown SQL file: $path");
        }

        return file_get_contents($path);
    }

    /**
     * @param string $query
     * @param array $params
     * @return array
     */
    protected function exec_select(string $query, array $params) :array {
        $statement = $this->db->prepare($query);
        $statement->execute($params);

        return $statement->fetchAll();
    }

    /**
     * @param string $query
     * @param array $params
     * @return bool
     */
    protected function exec_upsert(string $query, array $params) :bool {
        return $this->db->prepare($query)->execute($params);
    }
}