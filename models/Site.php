<?php
/**
 * Created by PhpStorm.
 * User: janze
 * Date: 05.11.2017
 * Time: 0:00
 */



class Site
{
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
                $i++;
            }
        }
        return $list;
    }
    public static function getItemBySearch($search = '', $page = 1){
        $list = array();
        $offset = ($page-1)*PAGE_PAGINATION;
        if($search == '') {
            $search = $_SESSION['search'];
        }
        else {
            $_SESSION['search'] = $search;
        }
        $db = Db::getConnection();
        if($search !== null){
            $search = trim($search);
            $item = strtr($search, array('_'=>'\_', '%'=>'\%'));
            $query = "SELECT * FROM last_product WHERE name LIKE '%$item%'";
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
        }
        return $list;
    }


  public static function getItemByCategory($id_category = null, $page = 1, $sort = '')
    {
        $list = array();
        $offset = ($page-1)*PAGE_PAGINATION;
        $db = Db::getConnection();
        $query = "SELECT * FROM last_product";
        if($id_category !== null){
            $query .= " WHERE id_category = ".$id_category;
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
    protected static function getAliasByIdCategory($id){
        $list = array();
        $db = DB::getConnection();
        $query = "SELECT * FROM property_category WHERE id_category = $id ORDER BY sort DESC";
        $alias = $db->query($query);
        while ($row = $alias->fetch(PDO::FETCH_ASSOC)){
            $list[$row['alias']] = $row['property'];
        }
        return $list;
    }
    public static function setValut($cur = null){
        if($cur !== null && isset($_SESSION['currency'])) {
            $val = $_SESSION['currency'] = $cur;
            return $val;
        }
        elseif(!isset($_SESSION['currency'])){
            $val = $_SESSION['currency'] = 'USD';
            return $val;
        }else {
            return $_SESSION['currency'];
        }
    }
    public static function getValut(){
        $kurs = API::getKurs();
        return $kurs[$_SESSION['currency']];
    }
    public static function getSortItem($sort = ''){
        $arrSort = array(
            'priceASC' => ' ORDER BY price ASC',
            'price' => ' ORDER BY price DESC',
            'rate' => ' ORDER BY avg_rate DESC',
        );
        if($sort){
            $_SESSION['sort'] = $sort;
            return $arrSort[$_SESSION['sort']];
        }elseif(!isset($_SESSION['sort'])){
            return '';
        }else{
            return $arrSort[$_SESSION['sort']];
        }
    }
    public static function getHtmlItem($productList, $valut){
        foreach ($productList as $item) {
            echo <<<SORT
        <div class="row justify-content-start item-product">
            <div class="col-xl-3 col-md-4 col-lg-3">
                <div class="rate round">{$item['rate']}</div>
                <a href="/item/"{$item['id_category']}/{$item['id']}">
                    <img src="{$item['img']}" class="img-thumbnail" alt="">
                </a>

            </div>
            <div class="col-xl-9 col-lg-9 col-md-8">

                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th colspan="2">
                            <a href="/item/{$item['id_category']}/{$item['id']}" class="name">{$item['name']}</a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="2">
                            {$item['description']}
                        </td>
                    </tr>
                    <tr>
                        <th>Ціна:</th>
                        <td> <div class="price"> {$item['price']} {$valut}</div> </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
SORT;
        }
    }
 }
