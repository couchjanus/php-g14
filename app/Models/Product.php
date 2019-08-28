<?php

require_once CORE.'/Slug.php';

class Product extends Model
{
    /**
     * Выводит список всех товаров
    */
    public function index()
    {
        return self::query("SELECT * FROM products ORDER BY id ASC")->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * Добавление продукта
     *
     * @param $options - характеристики товара
     * @return int|string
     */
    public function store($options)
    {
        $sql = "INSERT INTO products(
                name, slug, category_id, price, brand,
                description, is_new, status)
                VALUES (:name, :slug, :category_id, :price,
                :brand, :description, :is_new, :status)";
        $stmt = self::prepare($sql);
        $slug = Slug::makeSlug($options['name'], array('transliterate' => true));
        $stmt->bindParam(':slug', $slug, PDO::PARAM_STR);
        $stmt->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $stmt->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $stmt->bindParam(':price', $options['price'], PDO::PARAM_INT);
        $stmt->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $stmt->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $stmt->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $stmt->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $stmt->execute();
    }
    
    public static function lastId() 
    {
        $stmt = self::prepare("SELECT id FROM products ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['id'];
    }

    public static function getProducts1()
    {
        $sql = "SELECT t1.*, t2.filename as picture
                FROM products t1
                JOIN pictures t2
                ON t2.resource = 'products' 
                AND t1.id = t2.resource_id
                ORDER BY id ASC
            ";
        $stmt = self::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }


    
    public static function getProducts()
    {
        $sql = "SELECT t1.*, t2.picture FROM products t1
                JOIN (SELECT resource, resource_id, group_concat(filename) picture FROM pictures group by resource_id) as t2
                ON t2.resource = 'products' 
                AND t1.id = t2.resource_id
            ";

        $stmt = self::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public static function getBySlug($id)
    {
        $stmt = self::prepare("SELECT t1.*, t2.filename as picture, t2.resource_id  as resource_id FROM products t1 JOIN pictures t2 ON t2.resource = 'products' AND t1.id = t2.resource_id WHERE t1.id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_BOTH);
    }

    public static function getProductBySlug($id)
    {
        $stmt = self::prepare("SELECT t1.*, t2.picture as picture FROM products t1 JOIN (SELECT resource, resource_id, group_concat(filename) picture FROM pictures group by resource_id) AS t2 ON t2.resource = 'products' AND t1.id = t2.resource_id WHERE t1.id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_BOTH);
    }
    /**
     * Общее кол-во товаров в магазине
     *
     * @return mixed
     */
    public static function getTotalProducts()
    {
        $sql = "SELECT count(id) AS count FROM products WHERE status=1 ";
        $row = self::query($sql)->fetch();
        return $row['count'];
    }
  
}