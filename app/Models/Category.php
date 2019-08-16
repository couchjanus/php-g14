<?php

class Category
{
    /**
     * Возвращает Список категорий
    **/

    public static function index() 
    {
        $connection = new Connection(require_once DB_CONFIG_FILE);
        $stmt = $connection->pdo->query("SELECT * FROM categories ORDER BY id ASC");
        $categories = $stmt->fetchAll();
        return $categories;
    }
    
    /**
     * Возвращает Список категорий, 
     * у которых статус отображения = 1  
     */

    public static function getActiveCategories()
    {
        $connection = new Connection(require_once DB_CONFIG_FILE);
        $stmt = $connection->pdo->query(
            "SELECT id, name, status FROM categories
            WHERE status = 1
            ORDER BY id ASC"
        );
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }

    public static function store($opts)
    {
        $connection = new Connection(require_once DB_CONFIG_FILE);
        $stmt = $connection->pdo->prepare("INSERT INTO categories (name, status) VALUES (?, ?)");
        $sql = "INSERT INTO categories (name, status) VALUES (?, ?)";
        $stmt->bindParam(1, $opts[0]);
        $stmt->bindParam(2, $opts[1]);
        $stmt->execute();
    }
}
