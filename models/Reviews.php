<?php
/**
 * Created by PhpStorm.
 * User: janze
 * Date: 14.11.2017
 * Time: 11:32
 */

class Reviews
{
    public static function validReview($id)
    {
        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $rate = $_POST['rate'];
            $review = $_POST['review'];
            $errors = array();
            if (self::checkName($name)) {
            } else {
                $errors['name'] = 'Ім\'я повинно мати не менше 3 символів і містити лише літери, числа і символ "_"';
            }
            if (self::checkRate($rate)) {
            } else {
                $errors['rate'] = 'Виберіть коректне значення із списку'.$rate;
            }
            if (self::checkReview($review)) {
            } else {
                $errors['review'] = 'Поле не може бути пустим';
            }
            if(empty($errors)){

                self::insertReview($name, $rate, $review, $id);
            }else{
                return $errors;
            }
        }
    }
    public static function checkName($name){
        if(strlen($name) >= 3 && preg_match("/\w/i", $name)){
            return true;
        }
        return false;
    }
    public static function checkRate($rate){
        if((10 >= $rate) && (0 < $rate)){
            return true;
        }
        return false;
    }
    public static function checkReview($review){
        if(strlen($review) > 1){
            return true;
        }
        return false;
    }
    private static function insertReview($name, $rate, $review, $id){
        $db = Db::getConnection();
        $sql = 'INSERT INTO reviews (id_product, login, rating, review) VALUE (:id, :name, :rate, :review)';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':rate', $rate, PDO::PARAM_INT);
        $result->bindParam(':review', $review, PDO::PARAM_STR);
        return $result->execute();
    }
}