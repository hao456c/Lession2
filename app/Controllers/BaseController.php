<?php 
    namespace App\Controllers;

    class BaseController
    {
        const VIEW_FOLDER_NAME = '../Views/';

        // trả về view tương ứng của function
        protected function view($path, array $data = [])
        {
            echo '<pre>';
            print_r($data);
            echo '</pre>';
            $path = self::VIEW_FOLDER_NAME . str_replace('.','/', $path) . '.php';
            return require ($path);
        }
    }
