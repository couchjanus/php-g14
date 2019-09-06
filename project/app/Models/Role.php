<?php
/**
 * class Role
 */

class Role extends Model
{
    /**
     * Возвращает Список roles
    **/

    public static function index() 
    {
        return self::query("SELECT * FROM roles ORDER BY id ASC")->fetchAll(PDO::FETCH_CLASS);
    }

    public static function store($opts)
    {
        $sql = "INSERT INTO roles (name) VALUES (?)";
        $stmt = self::prepare($sql);
        $stmt->bindParam(1, $opts[0]);
        $stmt->execute();
    }

    public static function update($id, $options)
    {
        $sql = "UPDATE roles
                SET name = :name
                WHERE id = :id";
        $stmt = self::prepare($sql);
        $stmt->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    
    /* Выбор role по id  */
    public static function getById($id)
    {
        $stmt = self::prepare("SELECT * FROM roles  WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_BOTH);
    }
    public static function destroy($id)
    {
        $sql = "DELETE FROM roles WHERE id = :id";
        $stmt = self::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
