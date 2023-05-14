<?php 
    namespace App\Controllers;
    use Session;
    require('BaseController.php');
    require('../app/Core/Session.php');
    class UserController extends BaseController
    {
        protected $userModel;

        public function __construct()
        {
            $this->loadModel('User');
            $this->userModel = new \User;
            Session::init();
        }

        public function index()
        {
            $value = '';
            $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : 1 ;
            $totalPage = $this->userModel->getTotalPage();
            if(isset($_COOKIE['id']) && !isset($_SESSION['id'])) {
                Session::set('role', $_COOKIE['role']);
                Session::set('id', $_COOKIE['id']);
            }
            if(isset($_SESSION['role']) ) {
                if($_SESSION['role'] == $this->userModel::ROLE_USER) {
                    $value = $this->userModel->findById($_SESSION['id']);
                    $value['role'] = 'User';
                } else {
                    if(isset($_REQUEST['search'])) {
                        $value = $this->userModel->getByFullName($_REQUEST['search'], $page);
                        $totalPage = $this->userModel->getTotalPageByFullName($_REQUEST['search']);
                    } else {
                    $value = $this->userModel->getAll($page);
                    }
                }
            }
            return $this->view('Layout.Home.index', [
                'value' => $value,
                'title' => 'Home',
                'page' => $page,
                'totalPage' => $totalPage,
                'search' => isset($_REQUEST['search']) ? $_REQUEST['search'] : NULL,
            ]);
        }

        public function show()
        {
            if(!isset($_COOKIE['id']) && !isset($_SESSION['id'])) {
                return header('location:/lession2/public/index.php/');
            }
            $user = $this->userModel->findById($_REQUEST['id']);
            return $this->view('Layout.Detail.index',[
                'user' => $user,
                'title' => $user['full_name']
            ]);
        }

        public function delete()
        {
            var_dump($_REQUEST);
            $this->userModel->delete($_REQUEST['id']);
            return header('location:/lession2/public/index.php/');
        }

        public function copy()
        {
            if(!isset($_COOKIE['id']) && !isset($_SESSION['id'])) {
                return header('location:/lession2/public/index.php/');
            }
            $user = $this->userModel->findById($_REQUEST['id']);
            return $this->view('Layout.Copy.index',[
                'user' => $user,
                'title' => $user['full_name']
            ]);
        }

        public function edit()
        {   
            if(!isset($_COOKIE['id']) && !isset($_SESSION['id'])) {
                return header('location:/lession2/public/index.php/');
            }
            $user = $this->userModel->findById($_REQUEST['id']);
            return $this->view('Layout.Edit.index',[
                'user' => $user,
                'title' => $user['full_name']
            ]);
        }

        public function update()
        {
            $user = $this->userModel->findById($_REQUEST['id']);
            if($this->userModel->findByEmail($_REQUEST['email'], $_REQUEST['id']) !== NULL) {
                return $this->view('Layout.Edit.index',[
                    'user' => $user,
                    'title' => $user['full_name'],
                    'message' => 'The new email already exists'
                ]);
            }
            if($_REQUEST['password'] == NULL) {
                unset($_REQUEST['password']);
            }
            unset($_REQUEST['confirm_password']);
            $this->userModel->update($_REQUEST);
            return $this->view('Layout.Edit.index',[
                'user' => $user,
                'title' => $user['full_name'],
                'message' => 'Successfully'
            ]);
        }
    }
