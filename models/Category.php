<?php
/**
 * Created by PhpStorm.
 * User: janze
 * Date: 11.11.2017
 * Time: 22:24
 */


class Category extends Site
{
    /*повертаэ перелык категорій і ід
    *приймає ід категорії
    */
    public static function getManufacturer($id){
        $list = array();
            $query = "SELECT DISTINCT manufacturer FROM product WHERE  id_category = $id";
            $db = Db::getConnection();
            $propList = $db->query($query);
            while ($row = $propList->fetch(PDO::FETCH_ASSOC))
            {
                $list[] = $row['manufacturer'];
            }
            return $list;
    }
    public static function getCategoryById($id = null)
    {
        $list = array();
        if($id !== null) {
            $query = "SELECT * FROM category WHERE id_category = " . $id;
            $db = Db::getConnection();
            $categoryList = $db->query($query);
            while ($row = $categoryList->fetch()) {
                if ($row['activity']) {
                    $list['id'] = $row['id_category'];
                    $list['alias'] = $row['alias'];
                    $list['name'] = $row['category_name'];
                }
            }
            return $list;
        }
        return false;
    }
    public static function getPropertyByIdCategory ($id = null)
    {
        $list = array();
        if($id !== null) {
            $query = "SELECT * FROM property_category WHERE  id_category = ".$id." ORDER BY `sort`";
            $db = Db::getConnection();
            $propList = $db->query($query);

            while ($row = $propList->fetch())
            {
                $list[$row['id_property']]['property'] = $row['property'];
                $list[$row['id_property']]['alias'] = $row['alias'];
            }
            return $list;
        }
    }
/*
 * Повертає назву таблиці(аліас) для характеристик категорії
 * по ід категорії
 * */
    public static function getAliasCategory($id)
    {
        $db = Db::getConnection();
        $query = "SELECT alias FROM category WHERE id_category = $id";
        $alias = $db->query($query);
       $row = $alias->fetch(PDO::FETCH_ASSOC);
        return $row['alias'];
    }
    public static function getValuePropertyCategory( $id, array $list = null)
    {
        $table = self::getAliasCategory($id);
        if (is_array($list) && !empty($list)) {
            foreach ($list as $key => $value) {
                if($value['alias'] == 'manufacturer'){
                    $query[$value['property']] = "SELECT DISTINCT `value` FROM `value` WHERE id_property = $key";
                }else {
                    $query[$value['property']] = "SELECT DISTINCT {$value['alias']} AS 'value' FROM `$table`";
                }
            }
            $valueList = array();
            $db = Db::getConnection();
            foreach ($query as $key => $value) {
                $listProp = $db->query($value);
                while ($row = $listProp->fetch(PDO::FETCH_ASSOC)) {
                    $valueList[$key][] = $row['value'];
                }
            }
            return $valueList;
        }
        return array();
    }

    public static function getCountItem($id_category, array $listId = array())
    {
        $count = array();
        $query = "SELECT COUNT(id_product) AS count FROM last_product WHERE id_category = ".$id_category;
        if(!empty($listId)){
            $str = implode("','", $listId);
            $query .= " AND id_product IN('$str')";
        }
        $db = Db::getConnection();
        $count = $db->query($query)->fetch(PDO::FETCH_ASSOC);
        return $count['count'];
    }

    public static function getMaxPrice($id_category){
        $max = array();
        $query = "SELECT MAX(price) AS price FROM last_product WHERE id_category = ".$id_category;
        $db = Db::getConnection();
        $max = $db->query($query)->fetch(PDO::FETCH_ASSOC);
        $kurs = self::getValut();
        return round($max['price']*$kurs, 2);
    }

    public static function getMinPrice($id_category){
        $min = array();
        $query = "SELECT MIN(price) AS `price` FROM last_product WHERE id_category = ".$id_category;
        $db = Db::getConnection();
        $min = $db->query($query)->fetch(PDO::FETCH_ASSOC);
        $kurs = self::getValut();
        return round($min['price']*$kurs, 2);
    }
    protected static function modifyArray($arr, $id){
        $list = array();
        $db = Db::getConnection();
        $query = "SELECT * FROM property_category WHERE id_category = $id";
        $result = $db->query($query);
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            foreach ($arr as $key=>$value)
                if($row['property'] == $key) {
                    $list[$row['alias']] = $value;
                }
        }
        return $list;
    }
    public static function getIdProductBySort($category, $id, $sort = array()){
        $list = array();
        if(empty($sort) || !is_array($sort)){
            return $list;
        }
        $sort = self::modifyArray($sort, $id);
        $db = Db::getConnection();
        $count = count($sort);
        $query = "SELECT id_product FROM $category WHERE";
        foreach ($sort as $key=>$value){
            $count--;
            $str = implode("','", $value);
            $query .= " $key IN('$str')";
            if($count != 0){
                $query .=" AND";
            }
        }
        $result = $db->query($query);
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            $list[] = $row['id_product'];
        }
        return $list;
    }
    public static function sortProduct($id_category, $maxPrise, $minPrise, $manufacturer = array()){
        $list = array();
        $db = Db::getConnection();
        $str = implode("','", $manufacturer);
        $query = "SELECT id_product FROM product WHERE id_category = $id_category AND price < $maxPrise AND price > $minPrise";
        if(!empty($manufacturer) && is_array($manufacturer)){
            $query .= " AND manufacturer IN('$str')";
        }
        $result = $db->query($query);
        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
                    $list[] = $row['id_product'];
        }
        return $list;
    }
    public static  function getItemBySort($id_category = null, $page, $listId, $sort = '')
    {
        $list = array();
        $offset = ($page-1)*PAGE_PAGINATION;
        $db = Db::getConnection();
        $query = "SELECT * FROM last_product";
        $str = implode("','", $listId);
        if($id_category !== null){
            $query .= " WHERE id_product IN('$str')";
        }
        $query .= self::getSortItem($sort);
        $query .= " LIMIT ".PAGE_PAGINATION." OFFSET ".$offset;
        $categoryList = $db->query($query);
        $kurs = self::getValut();
        $i = 0;
        while ($row = $categoryList->fetch())
        {
            $list[$i]['id'] = $row['id_product'];
            $list[$i]['name'] = $row['name'];
            $list[$i]['id_category'] = $row['id_category'];
            $list[$i]['description'] = $row['description'];
            $list[$i]['price'] = round($row['price']*$kurs, 2);
            $list[$i]['img'] = $row['img_main'];
            $list[$i]['rate'] = round($row['avg_rate'], 1);
            $i++;
        }
        return $list;
    }
}