<?php 
    namespace App\Controllers;
    require('BaseController.php');

    class UserController extends BaseController
    {
        public function index()
        {
            $userList = [
                [
                    'id' => 1,
                    'full_name' => 'Administrator',
                    'email' => 'admin@admin.com',
                    'role' => 'Admin',
                ]
            ];
            return $this->view('Layout.Home.index', [
                'users' => $userList
            ]);
        }

        public function show()
        {
            return $this->view('Layout.Detail.index');
        }
    }