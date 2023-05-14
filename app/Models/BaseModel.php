<?php
    class BaseModel extends Database
    {
        protected $connect;

        public function __construct()
        {
            $this->connect = $this->connect();
        }

        //lấy tất cả dữ liệu
        public function getAll()
        {

        }

        //tìm bằng Id
        public function findById($id)
        {

        }

        //khởi tạo dữ liệu mới
        public function store()
        {

        }

        //thay đổi dữ liệu
        public function update()
        {

        }

        //xóa dữ liệu
        public function delete()
        {

        }

        //gửi xử lý query
        protected function query($sql)
        {
            return mysqli_query($this->connect, $sql);
        }
    }