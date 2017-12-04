<?php
/**
 * Created by PhpStorm.
 * User: janze
 * Date: 12.11.2017
 * Time: 21:11
 */


class Item extends Site
{
    public static function getItemById($id_category = null, $id = null)
    {
    if($id !== null && $id_category !== null){
        $db = DB::getConnection();
        $queryAlias = "SELECT alias FROM category WHERE id_category = ".$id_category;
        $alias = $db->query($queryAlias)->fetch(PDO::FETCH_ASSOC);
        $query = "SELECT * FROM {$alias['alias']} WHERE id_product = ".$id;
        $list = array();
        $list = $db->query($query)->fetch(PDO::FETCH_ASSOC);
        $list['overclocking']? $list['overclocking'] = "Так": $list['overclocking'] = "Ні";
        $aliasList = self::getAliasByIdCategory($id_category);
        unset($aliasList['manufacturer']);
        $listValue = array();
        foreach ($aliasList as $key=>$value){
            $listValue[$value] = $list[$key];
        }
        return $listValue;
    }
    return false;
    }
    public static function getItem($id = null)
    {
    if($id !== null){
        $db = DB::getConnection();
        $kurs = self::getValut();
        $query = "SELECT * FROM product WHERE id_product = ".$id;
        $list = $db->query($query)->fetch(PDO::FETCH_ASSOC);
        $list['price'] = round($list['price']*$kurs, 2);
        return $list;
    }
    return false;
    }
    public static function getReview($id = null)
    {
       $list = array();
            $db = DB::getConnection();
            $query = "SELECT * FROM `reviews` WHERE id_product = ".$id." ORDER BY date DESC";
            $listReview = $db->query($query);
            $i = 0;
            while ($row = $listReview->fetch()){
                $list{$i}['rating'] = $row['rating'];
                $list[$i]['login'] = $row['login'];
                $list[$i]['review'] = $row['review'];
                $list[$i]['date'] = $row['date'];
                $i++;
            }
            return $list;
    }
    public static function getImages($id = null)
    {
        $list = array();
        $db = DB::getConnection();
        $query = "SELECT * FROM images WHERE id_product = ".$id;
        $listImg = $db->query($query);
        $i = 0;
        while ($row = $listImg->fetch()){
            $list[$i]['directory'] = $row['directory'];
            $i++;
        }
        return $list;
    }
    public static function getAVGRate($id = null)
    {
        $db = DB::getConnection();
        $query = "SELECT avg_rate FROM avg_rate WHERE id_product = ".$id;
        $rate = $db->query($query)->fetch(PDO::FETCH_ASSOC);
        return round($rate['avg_rate'], 1);
    }
}