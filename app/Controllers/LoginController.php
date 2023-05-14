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
            if(isset($_COOKIE['id']) || isset($_SESSION['id'])) {
                return header('location:/lession2/public/index.php/');
            }
            return $this->view('Layout.Login.index',[
                'title' => 'Login'
            ]);
        }

        public function register()
        {
            if(isset($_COOKIE['id']) || isset($_SESSION['id'])) {
                return header('location:/lession2/public/index.php/');
            }
            return $this->view('Layout.register.index',[
                'title' => 'Register',
            ]);
        }

        public function store()
        {
            if($this->userModel->findByEmail($_REQUEST['email']) !== NULL) {
                return $this->view('Layout.Register.index',[
                    'title' => 'Register',
                    'message' => 'The email already exists'
                ]);
            }
            unset($_REQUEST['confirm_password']);
            $this->userModel->store($_REQUEST);
            return $this->view('Layout.Register.index',[
                'title' => 'Register',
                'message' => 'Successfully'
            ]);
        }

        public function checkLogin()
        {
            $user = $this->userModel->checkLogin($_REQUEST['email'], $_REQUEST['password']);
            if($user !== NULL) {
                Session::set('role', $user['role']);
                Session::set('id', $user['id']);
                if(isset($_REQUEST['rememberMe'])) {
                    setcookie('role', $user['role'], time() + (6 * 60 * 60));
                    setcookie('id', $user['id'], time() + (6 * 60 * 60));
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
            setcookie('id', '', time() - 3600);
            return header('location:/lession2/public/index.php/');
        }
    }