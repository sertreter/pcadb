<?php
/**
 * Created by PhpStorm.
 * User: janze
 * Date: 22.11.2017
 * Time: 22:03
 */

class AdminController extends Admin
{
    public function actionIndex(){

        if(isset($_POST['submit'])){
        self::loginAdmin($_POST['login'], $_POST['pass']);
        }

        self::checkAdmin();

        require_once ROOT . "/views/admin/admin.php";
        return true;
    }

    public function actionLogin(){


        require_once ROOT . "/views/admin/admin_login.php";
        return true;
    }

    public function actionExit(){
        unset($_SESSION['user']);
        header("Location: /admin");
        exit;
    }

}