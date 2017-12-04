<?php



class SearchController
{

		public function actionItem($page = 1)
		{


            $total = 1;
		    $productList = array();
		    if(isset($_POST['sub_search'])){
                $productList = Search::getItemBySearch($_POST['search'], $page);
                $total = Search::getCountSearchItem($_POST['search']);
            }elseif(isset($_SESSION['search'])){
                $productList = Search::getItemBySearch($_SESSION['search'], $page);
                $total = Search::getCountSearchItem($_SESSION['search']);
            }
            $pagination = new Pagination($total, $page, PAGE_PAGINATION, 'page-');


            $categoryList = array();
            $categoryList = Category::getCategory();




            require_once(ROOT . '/views/search/search.php');
            return true;

		}


}