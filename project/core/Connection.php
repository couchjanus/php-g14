<?php
/**
 * class Connection
 */
namespace Core;

use PDO;

class Connection
{
    const ERROR_UNABLE = 'ERROR: no database connection';

    /**
     * @var Singleton The reference to *Singleton* instance of this class
     */
    protected static $instance;
    
    /**
     * Returns the *Singleton* instance of this class.
     *
     * @return Singleton The *Singleton* instance.
     */
    public static function connect($config)
    {
        if (null === static::$instance) {

            if (!isset($config['db']['driver'])) {
                $message = __METHOD__ . ' : ' 
                . self::ERROR_UNABLE . PHP_EOL;
                throw new Exception($message);
            }
            $dsn = self::makeDsn($config['db']);        
            try {
                static::$instance = new PDO(
                    $dsn,                                                                                       
                    $config['user'], 
                    $config['password'], 
                    [
                        PDO::ATTR_ERRMODE => $config['errmode']
                    ]
                );
            } catch (PDOException $e) {
                error_log($e->getMessage());
            }
        }
        
        return static::$instance;
    }

    // static public function query($query)
    // {
    //     return self::$instance->query($query);
    // }
    
    // static public function prepare($sql)
    // {
    //     return self::$instance->prepare($sql);
    // }    
    
    protected function __construct()
    {
        
    }

    /**
     * Private clone method to prevent cloning of the instance of the
     * *Singleton* instance.
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * Private unserialize method to prevent unserializing of the *Singleton*
     * instance.
     *
     * @return void
     */
    private function __wakeup()
    {
    }
    
    protected static function makeDsn($config)
    {
        $dsn = $config['driver'] . ':';
        unset($config['driver']);
        
        foreach ($config as $key => $value) {
                $dsn .= $key . '=' . $value . ';';
        }
        return substr($dsn, 0, -1);
    }

}



// class Connection
// {
//     const ERROR_UNABLE = 'ERROR: no database connection';
//     public $pdo;

//     public function __construct(array $config)
//     {
//         if (!isset($config['db']['driver'])) {
//             $message = __METHOD__ . ' : ' 
//             . self::ERROR_UNABLE . PHP_EOL;
//             throw new Exception($message);
//         }
//         $dsn = $this->makeDsn($config['db']);        
//         try {
//             $this->pdo = new PDO(
//                 $dsn, 
//                 $config['user'], 
//                 $config['password'], 
//                 [
//                     PDO::ATTR_ERRMODE => $config['errmode']
//                 ]
//             );
//             return true;
//         } catch (PDOException $e) {
//             error_log($e->getMessage());
//             return false;
//         }
//     }
    
//     public static function makeDsn($config)
//     {
//         $dsn = $config['driver'] . ':';
//         unset($config['driver']);
        
//         foreach ($config as $key => $value) {
//                 $dsn .= $key . '=' . $value . ';';
//         }
//         return substr($dsn, 0, -1);
//     }

// }
