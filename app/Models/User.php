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
            $query = $this->query($sql);
            while ($row = mysqli_fetch_array($query)) {
                array_push($data, $row);
            }
            return $data;
        }

        public function getByFullName($full_name, $page = 1)
        {
            $sql = "SELECT * FROM users WHERE full_name LIKE '%" . $full_name . "%' LIMIT " . self::ROWS_PER_PAGE . " OFFSET " . (($page-1) * self::ROWS_PER_PAGE);
            $data = [];
            $query = $this->query($sql);
            while ($row = mysqli_fetch_array($query)) {
                array_push($data, $row);
            }
            return $data;
        }

        public function findById($id)
        {
            $sql = "SELECT * FROM users WHERE ID='" . $id . "'";
            return mysqli_fetch_assoc($this->query($sql));
        }

        public function store($data)
        {
            $sql =  "INSERT INTO `users` (`id`, `email`, `full_name`, `password`) 
                        VALUES (
                                NULL, 
                                '" . $data['email'] . "', 
                                '" . $data['full_name'] . "', 
                                '" . $data['password'] . "')";
            return $this->query($sql);
        }

        public function update($data)
        {
            $sql = "UPDATE users SET full_name='" . $data['full_name'] . "', email ='" . $data['email'] . "'";
            if(isset($data['password'])) {
                $sql = $sql . ", password ='" . $data['password'] . "'";
            }
            $sql = $sql . " WHERE id=".$data['id']; 
            return $this->query($sql);
        }

        public function delete($id)
        {
            $sql = "DELETE FROM users WHERE id='" . $id . "'";
            return $this->query($sql);
        }

        public function checkLogin($email, $password)
        {
            $sql = "SELECT * FROM users WHERE email='" . $email . "' AND password='" . $password . "'";
            return mysqli_fetch_assoc($this->query($sql));
        }

        public function findByEmail($email, $id=0)
        {
            $sql = "SELECT * FROM users WHERE email='" . $email . "' AND id<>" . $id;
            return mysqli_fetch_assoc($this->query($sql));
        }

        public function getTotalPage()
        {
            $sql = "SELECT CEIL(COUNT(*) /" . self::ROWS_PER_PAGE . ") AS total_pages,COUNT(*) as total_users from users";
            return mysqli_fetch_assoc($this->query($sql));
        }

        public function getTotalPageByFullName($full_name)
        {
            $sql = "SELECT CEIL(COUNT(*) /" . self::ROWS_PER_PAGE . ") AS total_pages,COUNT(*) as total_users from users WHERE full_name LIKE '%" . $full_name ."%'";
            return mysqli_fetch_assoc($this->query($sql));
        }
    }