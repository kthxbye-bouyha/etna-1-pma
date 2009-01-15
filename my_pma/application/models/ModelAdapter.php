<?php
class ModelAdapter extends Model 
{
    public function getQueryString()
    {
        return ($this->queryString);
    }
    
    public function truncate()
    {
        $this->queryString = "TRUNCATE `" . $this->name . "`";
        $stmt = self::$con->prepare($this->queryString);
        $stmt->execute();
        return (array("affectedRow"=>$stmt->rowCount()));
    }
    
    public function drop()
    {
        $this->queryString = "DROP TABLE `" . $this->name . "`";
        $stmt = self::$con->prepare($this->queryString);
        $stmt->execute();
        return (array("affectedRow"=>$stmt->rowCount()));
    }
    
    public function dumpTable($table_name)
    {
        
        $this->queryString = "mysql_dump " . DB_Connexion::$dbName . " `" . $table_name . "`";
        var_dump($this->queryString);
        die();
        $stmt = self::$con->prepare($this->queryString);
        $stmt->execute();
        return (true);
    }
    
    public function dumpDatabase()
    {
        $this->queryString = "mysql_dump " . DB_Connexion::$dbName . " ";
        var_dump($this->getTables()); 
    }
}
?>