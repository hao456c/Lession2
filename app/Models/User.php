<?php 
    class User extends BaseModel
    {
        public const ROLE_USER = 0;
        public const ROLE_ADMIN = 1;
        public const ROWS_PER_PAGE = 3;

        public function getAll($page = 1)
        {
            $sql = "SELECT * FROM users LIMIT " . self::ROWS_PER_PAGE . " OFFSET " . (($page-1) * self::ROWS_PER_PAGE);
            $data = [];
            while ($row = mysqli_fetch_assoc($this->query($sql))) {
                array_push($data, $row);
            }
            return $data;
        }

        public function findById($id)
        {
            $sql = "SELECT * FROM users WHERE ID='" . $id . "'";
            return mysqli_fetch_assoc($this->query($sql));
        }

        public function store()
        {
            return __METHOD__;
        }

        public function update()
        {
            return __METHOD__;
        }

        public function delete()
        {
            return __METHOD__;
        }

        public function checkLogin($email, $password)
        {
            $sql = "SELECT * FROM users WHERE email='" . $email . "' AND password='" . $password . "'";
            return mysqli_fetch_assoc($this->query($sql));
        }

    }