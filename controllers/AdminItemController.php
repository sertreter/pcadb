<?php
/**
 * Created by PhpStorm.
 * User: janze
 * Date: 23.11.2017
 * Time: 0:40
 */

class AdminItemController extends Admin
{
    public function  actionAdditem($id){
    self::checkAdmin();

    $category = self::getCategoryById($id);
    $property = self::getPropertyCategory($id);


    require_once ROOT."/views/admin/admin_addItem.php";
    return true;
    }

    public function actionIndex(){

        self::checkAdmin();
        if(isset($_POST['submit'])){
            self::insertToItem();

        }

        $list = self::getItem();

        require_once ROOT."/views/admin/admin_items.php";
        return true;

    }
    public function actionAdd(){
        self::checkAdmin();



        $categoryList = self::getCategory();
        require_once ROOT."/views/admin/admin_add.php";
        return true;
    }


}