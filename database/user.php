<?php
    class user extends Db {
        // Lấy tất cả người dùng
        public function getAlluser() {
            // Sử dụng kết nối đã được thiết lập trong lớp Db
            $sql = self::$connection->prepare("SELECT * FROM `users`");
            $sql->execute();
            
            // Lấy tất cả kết quả và lưu vào mảng
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    
            return $items; // Trả về danh sách người dùng
        }
    }
    
