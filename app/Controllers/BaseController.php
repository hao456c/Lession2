<?php 
    namespace App\Controllers;

    class BaseController
    {
        const VIEW_FOLDER_NAME = '../Views/';
        const MODEL_FOLDER_NAME = '../app/Models';

        // trả về view
        protected function view($path, array $data = [])
        {
            $path = self::VIEW_FOLDER_NAME . str_replace('.','/', $path) . '.php';
            return require($path);
        }

        //trả về model cho controller
        protected function loadModel($model)
        {
            return require(self::MODEL_FOLDER_NAME . '/' . $model . '.php');
        }

    }
