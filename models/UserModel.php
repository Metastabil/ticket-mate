<?php
namespace App\Models;

/**
 * @author Julius Derigs
 * @version 1.0.0
 */

class UserModel extends BaseModel {
    /**
     * @var string
     */
    private string $sql_folder = 'users';

    /**
     * @param int $id
     * @param string $email
     * @param bool $deleted
     * @return array
     */
    public function select(int $id = 0, string $email = '', bool $deleted = false) :array {
        $params['deleted'] = $deleted;

        if ($id > 0) {
            $query = $this->query($this->sql_folder, 'select-by-id');
            $params['id'] = $id;
        }
        elseif (!empty($email)) {
            $query = $this->query($this->sql_folder, 'select-by-email');
            $params['email'] = $email;
        }
        else {
            $query = $this->query($this->sql_folder, 'select');
        }

        $data = $this->exec_select($query, $params);

        return !empty($data) && ($id > 0 || !empty($email)) ? $data[0] : $data;
    }

    /**
     * @param string $method
     * @param array $params
     * @return bool
     */
    public function upsert(string $method, array $params) :bool {
        $query = $this->query($this->sql_folder, $method);

        return $this->exec_upsert($query, $params);
    }
}