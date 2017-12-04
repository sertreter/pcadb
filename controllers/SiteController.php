<?php



class SiteController {

	public function actionIndex($currency = null)
	{
        $valut =  Site::setValut($currency);
		$categoryList = array();
		$categoryList = Site::getCategory();
        $productList = array();
        $productList = Site::getItemByCategory();
		require_once(ROOT . '/views/home/home.php');
		return true;
	}

	public function actionCurrency($currency){
	    Site::setValut($currency);
	    header("Location: ".$_SERVER['HTTP_REFERER']);
	    exit;
    }

    public function actionSort(){

        $valut =  Site::setValut();



        $categoryList = array();
        $categoryList = Site::getCategory();
        if(isset($_POST['page'])){
            $page = $_POST['page'];
        }else{
            $page = 1;
        }
        if(isset($_POST['category'])) {
            $total = Category::getCountItem($_POST['category']);
            $pagination = new Pagination($total, $page, PAGE_PAGINATION, 'page-');
            $productList = array();
            $productList = Site::getItemByCategory($_POST['category'], $page, $_POST['sort']);
        }else{
            $pagination = new Pagination(1, $page, PAGE_PAGINATION, 'page-');
            $productList = array();
            $productList = Site::getItemByCategory(null, $page, $_POST['sort']);
        }

        Site::getHtmlItem($productList, $valut);

        exit;
    }

}

