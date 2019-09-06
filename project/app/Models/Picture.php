<?php
/**
 * Модель Picture
 * 
*/

class Picture  extends Model
{
    
    public static function index() 
    {
        return self::query("SELECT * FROM pictures ORDER BY id ASC")->fetchAll(PDO::FETCH_CLASS);
    }

    public static function store($options)
    {
        $sql = "INSERT INTO pictures(resource, filename, resource_id)
                VALUES (?, ?, ?)";
        
        $stmt = self::prepare($sql);
        $stmt->execute([$options['resource'], $options['filename'], $options['resource_id']]);
        return true;
    }

    public static function getById($id, $resource) 
    {
        $sql = "SELECT * FROM pictures WHERE resource_id = :id and resource = :resource";
        $stmt = self::prepare($sql);
        $stmt->execute([$id, $resource]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function destroy($id){
		$sql="DELETE FROM pictures WHERE id=?";
		$q = self::prepare($sql);
		$q->execute([$id]);
		return true;	
    }

    public static function update($id, $options)
    {
        $sql = "UPDATE pictures
                SET
                resource = :resource,
                filename = :filename,
                resource_id = :resource_id
                WHERE id = :id";
        $stmt = self::prepare($sql);

        $stmt->execute([':id' => $id, ':resource' => $options['resource'], ':filename' => $options['filename'], ':resource_id' => $options['resource_id']]);
    }

    public static function lastId() 
    {
        $stmt = self::prepare("SELECT id FROM pictures ORDER BY id DESC LIMIT 1");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['id'];
    }
}
