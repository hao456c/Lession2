<?php
    namespace App\Controllers;
    require('BaseController.php');

    class LoginController extends BaseController
    {
        public function login()
        {
            return $this->view('Layout.Login.index');
        }

        public function register()
        {
            return $this->view('Layout.register.index');
        }
    }