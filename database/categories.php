<?php
class cate extends Db{
    function getAllcategories()
    {
        $sql =self::$connection-> prepare("SELECT * FROM `categories`");
        $sql->execute();
        $items =array();
        $items=$sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;

    }
}