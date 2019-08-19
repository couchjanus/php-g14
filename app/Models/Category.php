<?php

class Category extends Model
{
    /**
     * Возвращает Список категорий
    **/
    public static function index() 
    {
        // $stmt = self::query("SELECT * FROM categories ORDER BY id ASC");
        // return $stmt->fetchAll(PDO::FETCH_CLASS);
        return self::query("SELECT * FROM categories ORDER BY id ASC")->fetchAll(PDO::FETCH_CLASS);
    }
    
    /**
     * Возвращает Список категорий, 
     * у которых статус отображения = 1  
     */

    public static function getActiveCategories()
    {
        return self::query("SELECT * FROM categories WHERE status = 1 ORDER BY id ASC")->fetchAll(PDO::FETCH_CLASS);
    }

    public static function store($opts)
    {
        $sql = "INSERT INTO categories (name, status) VALUES (?, ?)";
        $stmt = self::prepare($sql);
        $stmt->bindParam(1, $opts[0]);
        $stmt->bindParam(2, $opts[1]);
        $stmt->execute();
    }
}
