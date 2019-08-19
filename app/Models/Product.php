<?php
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
                name,category_id, price, brand,
                description, is_new, status)
                VALUES (:name, :category_id, :price,
                :brand, :description, :is_new, :status)";
        
        $stmt = self::prepare($sql);

        $stmt->bindParam(':name', $options['name'], PDO::PARAM_STR);
        
        $stmt->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $stmt->bindParam(':price', $options['price'], PDO::PARAM_INT);
        $stmt->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
        $stmt->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $stmt->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
        $stmt->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $stmt->execute();
        
    }
  
}