<?php



class ItemController
{
		public function actionIndex($id_category, $id, $currency = null)
		{
		    $valut = Item::setValut($currency);
		    $errors = Reviews::validReview($id);
            $categoryList = array();
            $categoryList = Item::getCategory();
            $itemDesc = array();
            $itemDesc = Item::getItem($id);
            $itemCategory = array();
            $itemCategory = Item::getItemById($id_category, $id);
            $reviewItem = array();
            $reviewItem = Item::getReview($id);
            $img = array();
            $img = Item::getImages($id);
            $rate = Item::getAVGRate($id);
            require_once(ROOT . '/views/item/item.php');
            return true;
		}
}