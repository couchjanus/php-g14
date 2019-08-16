<?php
/**
 * class Connection
 */

class Connection
{
    const ERROR_UNABLE = 'ERROR: no database connection';
    public $pdo;

    public function __construct(array $config)
    {
        if (!isset($config['db']['driver'])) {
            $message = __METHOD__ . ' : ' 
            . self::ERROR_UNABLE . PHP_EOL;
            throw new Exception($message);
        }
        $dsn = $this->makeDsn($config['db']);        
        try {
            $this->pdo = new PDO(
                $dsn, 
                $config['user'], 
                $config['password'], 
                [
                    PDO::ATTR_ERRMODE => $config['errmode']
                ]
            );
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
    
    public static function makeDsn($config)
    {
        $dsn = $config['driver'] . ':';
        unset($config['driver']);
        
        foreach ($config as $key => $value) {
                $dsn .= $key . '=' . $value . ';';
        }
        return substr($dsn, 0, -1);
    }

}
