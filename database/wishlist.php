<?php
class wish extends Db{
    function getAllwishlist()
    {
        $sql =self::$connection-> prepare("SELECT * FROM `wishlist`");
        $sql->execute();
        $items =array();
        $items=$sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;

    }
}