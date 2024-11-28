<?php

class product extends Db {
    function getAllfunction() {
        $sql = self::$connection->prepare("SELECT * FROM `products`");
        $sql->execute();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        
        return $items;
    }
    /*
    public function getNameib($product_id) {
        $sql = self::$connection->prepare("SELECT `title` FROM `products` WHERE `id` = ?");
        $sql->bind_param("i", $product_id); 
        $sql->execute(); 
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item ? $item['title'] : null;
    }
    */
}



