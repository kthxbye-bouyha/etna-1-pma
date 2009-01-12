<?php
/**
 * @version prototype for an abstraction layer class
 * 			extends Php Data Object
 * 			using a singleton pattern
 *
 */
class DB_Connexion extends PDO
{
    /**
     * Enter description here...
     *
     * @var PDO
     */
    protected static $con; 
    protected static $dbName;
    //construct
    public function __construct()
    {
    }
    
    public function setConnexion($host, $user, $pwd, $options = array())
    {
        $dsn = $options['db_type'] . ':';
        $dsn .= 'host=' . $host . ';';
        if (isset($options['db_name']))
        {
            $dsn .= 'dbname=' . $options['db_name'] . ';';
            self::$dbName = $options['db_name'];
        }
        
        try {
            self::$con = new PDO($dsn,$user,$pwd);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
}