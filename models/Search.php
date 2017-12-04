<?php
/**
 * Created by PhpStorm.
 * User: janze
 * Date: 11.11.2017
 * Time: 22:24
 */


class Search extends Site
{
    public static function getCountSearchItem($name = '')
    {
        if($name == '') {
            $name = $_SESSION['search'];
        }

        $search = trim($name);
        $item = strtr($search, array('_'=>'\_', '%'=>'\%'));

        $query = "SELECT COUNT(*) AS count FROM last_product WHERE name LIKE '%$item%'";

        $db = DB::getConnection();

        $count = $db->query($query)->fetch(PDO::FETCH_ASSOC);

        return $count['count'];

    }


}