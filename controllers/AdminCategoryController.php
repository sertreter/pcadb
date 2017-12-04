<?php
/**
 * Created by PhpStorm.
 * User: janze
 * Date: 23.11.2017
 * Time: 0:31
 */

class AdminCategoryController extends Admin
{

    public function actionIndex(){
        self::checkAdmin();

        $list = self::getCategory();
        require_once ROOT."/views/admin/admin_category.php";

        return true;
    }

    public function actionAdd(){
        self::checkAdmin();

        require_once ROOT."/views/admin/add_category.php";
        return true;
    }

    public function actionAddItem(){
        self::checkAdmin();
        $category = $_POST;

        require_once ROOT."/views/admin/add_category_item.php";
        return true;
    }
}