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
    private string $folder = 'users';

    /**
     * @param int $id
     * @param string $email
     * @param bool $deleted
     * @return array
     */
    public function select(int $id = 0, string $email = '', bool $deleted = false) :array {
        $params[':deleted'] = $deleted;

        if ($id > 0) {
            $query = $this->get_query($this->folder, 'get-by-id');
            $params[':id'] = $id;
        }
        else if (!empty($email)) {
            $query = $this->get_query($this->folder, 'get-by-email');
            $params[':email'] = $email;
        }
        else {
            $query = $this->get_query($this->folder, 'get');
        }

        $statement = $this->db->prepare($query);
        $statement->execute($params);

        $result = $statement->fetchAll();

        return !empty($result) && ($id > 0 || !empty($email)) ? $result[0] : $result;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function insert(array $data) :bool {
        $query = $this->get_query($this->folder, 'insert');

        return $this->db->prepare($query)->execute($data);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function update(array $data) :bool {
        $query = $this->get_query($this->folder, 'update');

        return $this->db->prepare($query)->execute($data);
    }
}