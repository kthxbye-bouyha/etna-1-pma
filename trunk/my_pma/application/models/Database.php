<?php
class Database extends DB_Connexion 
{
    private $databases = array();
    
    public function getDbName()
    {
        return (self::$dbName);
    }
    
    public function getDatabases()
    {
        $stmt = self::$con->prepare('SHOW DATABASES');
        $stmt->execute();
        return ($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    
    public function getTables()
    {
        $db_tables = $this->GetDataBaseStruct();
        $db_const = $this->GetConstraintForDb();
        if ($db_tables != NULL && $db_const != NULL)
        {
            foreach ($db_const as $constraint)
            {
                foreach ($db_tables as $table_name => &$table_fields)
                {
                    foreach ($table_fields as &$field)
                    {
                    	if ($table_name == $constraint['TABLE_NAME'] && $field['Field'] == $constraint['COLUMN_NAME'])
                    	    $field['Key'] = $constraint;
                    }
                }
            }
        }
        return (($db_tables != null) ? $db_tables : null);
    }
    
    private function getConstraintForDb()
    {
        $config = Config::getInstance();
        $dsn = $config->get('db.driver') . ':' .
        		'host=' . $config->get('db.host') . ';' .
        		'dbname=information_schema;';
        try {
            $con = new PDO($dsn, $config->get('db.user'), $config->get('db.pwd'));
            $queryString = "SELECT `KCU`.`CONSTRAINT_SCHEMA`, 
            				`KCU`.`REFERENCED_TABLE_SCHEMA`, `KCU`.`REFERENCED_TABLE_NAME`, `KCU`.`REFERENCED_COLUMN_NAME`,
        					`KCU`.`TABLE_NAME`, `KCU`.`COLUMN_NAME`,
        					`TC`.`CONSTRAINT_TYPE`
                       			FROM `KEY_COLUMN_USAGE` AS `KCU`, `TABLE_CONSTRAINTS` AS `TC`
                       			WHERE `KCU`.`TABLE_NAME` = `TC`.`TABLE_NAME`
                       				AND `KCU`.`CONSTRAINT_SCHEMA`= '". self::$dbName . "' 
                       				AND `KCU`.`POSITION_IN_UNIQUE_CONSTRAINT` IS NOT NULL
                       				AND `TC`.`CONSTRAINT_TYPE`='FOREIGN KEY'";
            $stmt = $con->prepare($queryString);
            $stmt->execute();
            $db_const = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return ((!empty($db_const) ? $db_const : null));
        } catch (PDOException $e) {
            return (null);
        }
    }
    
    private function getDataBaseStruct()
    {
        $stmt = self::$con->prepare('SHOW TABLES');
        $stmt->execute();
        $data_tables = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $db_tables = array();
        foreach($data_tables as $table_name)
        {
            $table_name = current($table_name);
            $stmt = self::$con->prepare('DESCRIBE ' . $table_name);
            $stmt->execute(); 
            $db_tables[$table_name] = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        return (!empty($db_tables) ? $db_tables : null);
    }
    
    public function GetTablePosition()
    {
        $config = Config::getInstance();
        $dsn = $config->get('db.driver') . ':' .
        		'host=' . $config->get('db.host') . ';' .
        		'dbname=martinmyadmin;';
        try {
            $con = new PDO($dsn, $config->get('db.user'), $config->get('db.pwd'));
            $queryString = "SELECT `table_id`, `x`, `y` 
            					FROM `positions` 
            					WHERE `positions`.`db`='" . self::$dbName . "'";
            $stmt = $con->prepare($queryString);
            $stmt->execute();
            $tables_pos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $return = array();
            foreach ($tables_pos as $table_pos)
            {
                $return[$table_pos['table_id']] = array('x' => $table_pos['x'],
                                            			'y' => $table_pos['y']);
            }
            return ($return);
        } catch (PDOException $e) {
            return (null);
        }
    }
}
?>