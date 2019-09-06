<?php
/**
 * class User
 */
class User extends Model
{
    public function __construct()
	{
        parent::__construct();
	}

    /**
     * @return users list
    **/
    public static function index() 
    {
        return self::query("SELECT * FROM users ORDER BY id ASC")->fetchAll(PDO::FETCH_CLASS);
    }

    public static function store($options)
    {
        $sql = "INSERT INTO users(name, email, password, role_id)
                VALUES(:name, :email, :password, :role)";
        $stmt = self::prepare($sql);
        $stmt->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $options['email'], PDO::PARAM_STR);
        $stmt->bindParam(':role', $options['role'], PDO::PARAM_INT);
        
        $costs = [
            'cost' => 12,
        ];
        $hash = password_hash($options['password'], PASSWORD_BCRYPT, $costs);
        $stmt->bindParam(':password', $hash, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public static function update($id, $options)
    {
        $sql = "SELECT password FROM users WHERE id = :userId";
        $stmt = self::prepare($sql);
        $stmt->bindParam(':userId', $id, PDO::PARAM_INT);
        $stmt->execute();

        $passwordFromDatabase = $stmt->fetch(PDO::FETCH_ASSOC)['password'];
        $password = $options['password'];
        if (!password_verify($password, $passwordFromDatabase)) {
            $password = password_hash($options['password'], PASSWORD_DEFAULT, ["cost" => 12]);
        }
        $sql = "UPDATE users
                    SET name = :name, password = :password, email = :email, role_id = :role_id, status = :status
                      WHERE id = :id
               ";
        $stmt = self::prepare($sql);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':name', $options['name'], PDO::PARAM_STR);
        $stmt->bindParam(':email', $options['email'], PDO::PARAM_STR);
       
        $status = $options['status']? 1:0;
        $stmt->bindParam(':status', $status, PDO::PARAM_INT);
        $stmt->bindParam(':role_id', $options['role_id'], PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public static function getById($id)
    {
        $stmt = self::prepare("SELECT * FROM users  WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
    public static function destroy($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = self::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Проверка на существовние введенных данных при ааторизации
     *
     * @param $email
     * @param $password
     * @return bool
     */
    public static function checkUser($email, $password)
    {
        $sql = "SELECT *
                FROM users
                WHERE email = :email
                ";
        $stmt = self::prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch();
        if (password_verify($password, $user['password'])) {
            return $user['id'];
        }
        return false;
    }

    public static function updateProfile($userId, $options)
    {
        $sql = "UPDATE users
                SET phone_number = :phone_number, first_name = :first_name, last_name = :last_name
                WHERE id = :id";
        $stmt = self::prepare($sql);
        $stmt->bindParam(':phone_number', $options['phone_number'], PDO::PARAM_STR);
        $stmt->bindParam(':first_name', $options['first_name'], PDO::PARAM_STR);
        $stmt->bindParam(':last_name', $options['last_name'], PDO::PARAM_STR);
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public static function checkPhoneNumber($id)
    {
        $sql = "SELECT phone_number FROM users
                    WHERE id = :id";
        $stmt = self::prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->fetchColumn())
            return $stmt->fetchColumn();
        return false;
    }
}
