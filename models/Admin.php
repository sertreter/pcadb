<?php
/**
 * Created by PhpStorm.
 * User: janze
 * Date: 22.11.2017
 * Time: 22:31
 */

class Admin
{
    public static function checkAdmin(){

        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }

        header("Location: /admin/login");
        exit;

    }

    public static function loginAdmin($login, $pass)
    {
        $db = DB::getConnection();

        $login = trim($login);
        $login = strtr($login, array('_'=>'\_', '%'=>'\%'));

        $pass = trim($pass);
        $pass = sha1($pass);
        $query = "SELECT * FROM user_admin WHERE login = '".$login."' AND pass = '".$pass."'";
        $result = $db->query($query)->fetch(PDO::FETCH_ASSOC);



        if(!empty($result)){
            $_SESSION['user'] = $result['id'];
            return $result['id'];
        }
        return false;
    }
    public static function getItem(){
        $list = array();
        $db = DB::getConnection();
        $query = "SELECT * FROM product";
        $result = $db->query($query);

        $i = 0;

        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            $list[$i]['id'] = $row['id_product'];
            $list[$i]['name'] = $row['name'];
            $list[$i]['description'] = $row['description'];
            $list[$i]['price'] = $row['price'];
            $list[$i]['date'] = $row['date'];
            $i++;
        }

        return $list;
    }
    public static function getCategory()
    {
        $list = array();

        $query = "SELECT * FROM category";

        $db = Db::getConnection();
        $categoryList = $db->query($query);

        $i = 0;

        while ($row = $categoryList->fetch())
        {
            if($row['activity']) {
                $list[$i]['id'] = $row['id_category'];
                $list[$i]['name'] = $row['category_name'];
                $list[$i]['alias'] = $row['alias'];
                ($row['activity'])? $row['activity'] = "ТАК": $row['activity'] = 'НІ';
                $list[$i]['activity'] = $row['activity'];
                $i++;
            }
        }
        return $list;

    }

    public static function getPropertyCategory($id){

        $list = array();
        $db = Db::getConnection();
        $query = "SELECT * FROM property_category WHERE id_category = $id ORDER BY sort DESC";

        $result = $db->query($query);
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            $list[$row['alias']] = $row['property'];
        }
        return $list;
    }

    public static function getIdItemByName($name){
        $list = array();
        $db = Db::getConnection();
        $query = "SELECT * FROM product WHERE name = '$name'";

        $result = $db->query($query);
        $list = $result->fetch(PDO::FETCH_ASSOC);

        return $list['id_product'];
    }

    public static function getCategoryById($id){
        $list = array();
        $db = Db::getConnection();
        $query = "SELECT * FROM category WHERE id_category = $id";

        $result = $db->query($query);
        $list = $result->fetch(PDO::FETCH_ASSOC);

        return $list;
    }

    public static function getCategoryByAlias($alias){
        $list = array();
        $db = Db::getConnection();
        $query = "SELECT id_category FROM category WHERE alias = '".$alias."'";

        $result = $db->query($query);
        $list = $result->fetch(PDO::FETCH_ASSOC);

        return $list['id_category'];
    }

    public static function insertValInItem($id, $table, array $property){
        $db=Db::getConnection();


        $query="INSERT INTO $table (id_product";
        $val = " VALUE ($id";

        foreach ($property as $key=>$value){
            $query .=", $key";
            $val .= ", '$value'";
        }
        $query .= ") ".$val.")";
        $db->exec($query);
        print $query;


        /*$param->bindValue(":id", $id);

        foreach ($property as $key=>$value){
            $param->bindValue(":".$key, $value);
            print "<br>$value";
        }
        $param->execute();*/

    }

    public static function insertToItem(){
        $db = DB::getConnection();

        $query = "INSERT INTO product VALUE ( 
            NULL,
            :name, 
            :manufacturer, 
            :price, 
            :description, 
            :full_description, 
            :img,
            :id_category, 
            NULL
        )";
        $id_category = self::getCategoryByAlias($_POST['category']);

        $src = null;

        $param = $db->prepare($query);
        $param->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
        $param->bindParam(':manufacturer', $_POST['manufacturer'], PDO::PARAM_STR);
        $param->bindParam(':price', $_POST['price'], PDO::PARAM_INT);
        $param->bindParam(':description', $_POST['description'], PDO::PARAM_STR);
        $param->bindParam(':full_description', $_POST['full_description'], PDO::PARAM_STR);
        $param->bindParam(':img', $src, PDO::PARAM_STR);
        $param->bindParam(':id_category', $id_category, PDO::PARAM_STR);

        $param->execute();

        $id_product = self::getIdItemByName($_POST['name']);

        self::insertValInItem($id_product, $_POST['category'] ,$_POST['table']);

        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            $src =  $_SERVER['DOCUMENT_ROOT']."/upload/images/{$id_product}_main.jpg";
            $img =  "../../upload/images/{$id_product}_main.jpg";

            move_uploaded_file($_FILES['file']['tmp_name'], $src);
            $update = "UPDATE product SET img_main = '$img' WHERE  id_product = $id_product";
            $db->exec($update);
        }
    }

}