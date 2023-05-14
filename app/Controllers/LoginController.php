<?php
    namespace App\Controllers;

    use Session;

    require('BaseController.php');
    require('../app/Core/Session.php');
    class LoginController extends BaseController
    {
        protected $userModel;
        public function __construct()
        {
            $this->loadModel('User');
            $this->userModel = new \User;    
            Session::init();
        }

        public function login()
        {
            return $this->view('Layout.Login.index',[
                'title' => 'Login'
            ]);
        }

        public function register()
        {
            return $this->view('Layout.register.index');
        }

        public function checkLogin()
        {
            $user = $this->userModel->checkLogin($_REQUEST['email'], $_REQUEST['password']);
            if($user !== NULL) {
                Session::set('role', $user['role']);
                Session::set('id', $user['id']);
                if(isset($_REQUEST['rememberMe'])) {
                    setcookie('role', $user['role'], time() + (6 * 60 * 60));
                }
                return header('location:/lession2/public/index.php/');
            }
            else {
                return $this->view('Layout.Login.index',[
                    'error' => 'The password or email that you have entered is incorrect, please try again',
                    'title' => 'Login'
                ]);
            }
        }

        public function logout()
        {
            session_destroy();
            setcookie('role', '', time() - 3600);
            return header('location:/lession2/public/index.php/');
        }
    }