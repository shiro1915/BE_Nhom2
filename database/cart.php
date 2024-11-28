<?php
class cart extends Db{
    function getAllcart()
    {
        $sql =self::$connection-> prepare("SELECT * FROM `cart`");
        $sql->execute();
        $items =array();
        $items=$sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;

    }
}