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
            if(isset($_SESSION['role']) ) {
                if($_SESSION['role'] == $this->userModel::ROLE_USER) {
                    $value = $this->userModel->findById($_SESSION['id']);
                    $value['role'] = 'User';
                } else {
                    $value = $this->userModel->getAll();
                    var_dump($value);
                }
            }
           
            return $this->view('Layout.Home.index', [
                'value' => $value,
                'title' => 'Home',
            ]);
        }

        public function show()
        {
            return $this->view('Layout.Detail.index');
        }
    }
