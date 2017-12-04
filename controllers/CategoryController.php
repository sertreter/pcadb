<?php



class CategoryController
{
    public function actionIndex($id, $page = 1, $currency = null)
    {

        $valut = Category::setValut($currency);//валюта
        $maxPrice = Category::getMaxPrice($id);//максимальна ціна повзунка
        $minPrice = Category::getMinPrice($id);//мінімальна ціна повзунка
        $manufacturer = Category::getManufacturer($id);
        $total = Category::getCountItem($id);//кілкість елементів в категорії
        $categoryList = array();
        $categoryList = Category::getCategory();//перелік категорій
        $categoryItem = array();
        $categoryItem = Category::getCategoryById($id);//категорія для відображення
        $property = Category::getPropertyByIdCategory($id);//повнртає характнристики котегорії [id]=>([property], [alias])
        $valList = Category::getValuePropertyCategory($id, $property);
        $productList = array();
        if(isset($_POST['submit'])){
            $listSortProduct = array();
            $listS = array();
            if(isset($_POST['property'])){
                $listSortProduct = Category::getIdProductBySort($categoryItem['alias'], $id, $_POST['propety'] );
            }
            if(isset($_POST['manufacturer'])){
                $listS = Category::sortProduct($id, $_POST['maxPrice'], $_POST['minPrice'], $_POST['manufacturer']);
            }else{
                $listS = Category::sortProduct($id, $_POST['maxPrice'], $_POST['minPrice']);
            }
            $list = array_merge($listSortProduct, $listS);
            if(empty($list)){
                $total = Category::getCountItem($id);//кілкість елементів в категорії
                $productList = Category::getItemByCategory($id, $page);
            }else{
                $productList = Category::getItemBySort($id, $page, $list);
                $total = Category::getCountItem($id);//кілкість елементів в категорії
            }

        } else{
            $total = Category::getCountItem($id);//кілкість елементів в категорії
            $productList = Category::getItemByCategory($id, $page);
        }
        $pagination = new Pagination($total, $page, PAGE_PAGINATION, 'page-');
        require_once(ROOT . '/views/category/category.php');
        return true;
    }
}
