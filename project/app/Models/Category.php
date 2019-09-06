<?php
namespace App\Models;

use Core\Model;
use PDO;

class Category extends Model
{
    /**
     * Возвращает Список категорий
    **/
    public static function index() 
    {
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

    /* Выбор категории по id  */
    
    public function getById($id){
		$sql="SELECT * FROM categories WHERE id = ?";
		$q = self::prepare($sql);
        $q->execute([$id]);
		return $q->fetch(PDO::FETCH_ASSOC);
	}

    public function destroy($id){
		$sql="DELETE FROM categories WHERE id=?";
		$q = self::prepare($sql);
		$q->execute([$id]);
		return true;	
    }
    
    public static function update($id, $options)
    {
        $sql = "UPDATE categories
                SET
                    name = :name,
                    status = :status
                WHERE id = :id";
        $stmt = self::prepare($sql);
        $stmt->execute([':id' => $id, ':name' => $options['name'], ':status' => $options['status']]);
    }
}
