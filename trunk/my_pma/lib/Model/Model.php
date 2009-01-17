<?php
/**
 * @version prototype for Data Acces Object based on Php Data Object,
 * 			using Object Relationnal Mapping and Active Record Directory patterns
 * 			in order to be used in Raplid Application Developpement method with a Model View Controller pattern
 * 
 *
 */
abstract class Model extends Database { 
    
    /**
     * @var array list of field
     */
    protected $fields = array();
    
    /**
     * @var array list of field which are primarykey
     */
    protected $primaryKeys = array();
    
    /**
     * @var string classname
     */
    protected $className;
    
    /**
     * @var string table name
     */
    protected $name;
    
    protected $queryString;
    
    public function __construct($table_name = null)
    {
        if ($table_name !== null)
            $this->setName($table_name);
        else
            $this->setName(get_class($this));
        $this->setFields();
    }
    
    /**
     * @desc set table name
     *
     * @param model name (get_class($this))
     */
    private function setName($modelName)
    {
        $this->name = strtolower($modelName);
    }
    
    /**
     * @desc get table name
     *
     * @return string model name
     */
    public function getName()
    {
        return ($this->name);
    }
    
    /**
     * @desc set table field (with describe),
     * 		call setPrimaryKeys
     * 		database availaible MySQL
     *
     */
    private function setFields()
    {
        $this->queryString = "DESCRIBE `" . self::$dbName . "`.`" .  $this->getName() . "`";
        $stmt = self::$con->query($this->queryString);
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $field)
        {
            $this->fields[]=$field;
            if($field["Key"] == "PRI")
                $this->setPrimaryKeys($field['Field']);
        }
    }
    
    /**
     * @desc return $this->field
     *
     * @return array table field
     */
    public function getFields()
    {
        return ($this->fields);
    }
    
    /**
     * @desc push a primary key field name in $this->primaryKeys
     *
     * @param string $field like mysql> describe table => fields{n}['Field']
     */
    private function setPrimaryKeys($field)
    {
        $this->primaryKeys[] = $field;
    }
    
    /**
     * @desc return all table primary key
     *
     * @return array primarykey{n}=fieldName
     */
    public function getPrimaryKeys()
    {
        return ($this->primaryKeys);
    }
    
    /**
     * @desc list field for SQL query like `model.name`.`model.field`, *{n}...
     *
     * @return string : all field from table
     */
    //TODO extend for select field 
    private function listFields()
    {
        $fields = "";
        $nbFields = count($this->fields);
        $i=0;
        while($i<$nbFields)
        {
            $fields .= "`" . $this->name."`.`" . $this->fields[$i]['Field'] . "`";
            if($i != $nbFields-1)
            {
                $fields .= ', ';
            }
            $i++;
        }
        return ($fields);
    }
    
    /**
     * @desc list primary key for SQL query like `model.name`.`field[Key]==PRI`
     *
     * @return string primary key fields
     */
    //TODO extend for multiple primarykeys 
    private function listPrimaryKeys($id)
    {
        if (sizeof($this->primaryKeys) === 1)
        {
            return ("`" . $this->name . "`.`" . $this->primaryKeys[0] . "` ");
        }
    }
    
    /**
     * @desc read one row identified by primarykey == $id
     *
     * @param unknown_type $id, unique identifier for database
     * @return array, row from Database
     */
    //TODO extend for additionnal criteria
    public function read($id)
    {
        $this->queryString = "";
        $this->queryString .= "SELECT " . $this->listFields() .
        					" FROM `" . $this->name;
        if (!is_array($id))
        {
            $this->queryString .= "` WHERE " . $this->listPrimaryKeys($id) . " = '" . $id . "'";
        }
        else
        {
            $this->queryString .= "` WHERE ";
            $i = 0;
            foreach($id as $key => $value)
            {
                if (in_array($key, $this->primaryKeys))
                {
                    $i++;
                    $this->queryString .= "`" . $key . "`='" . mysql_escape_string($value) . "' AND";
                }
            }
            if ($i > 0)
            {
                $this->queryString = substr($this->queryString, 0, -4);
            }
        }
        $stmt = self::$con->query($this->queryString);
        return ($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    
    /**
     * @desc read all table
     *
     * @return array rowSet for Model->name
     */
    //TODO add condition, order & co
    public function readAll()
    {
    	$this->queryString = "SELECT " . $this->listFields() . 
    							"FROM `" . $this->name. "`";
    	$stmt = Database::$con->query($this->queryString);
    	return ($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
    
    /**
     * @desc save a new row in model->name with data
     *
     * @param array $data = array("modelName"=>array("fieldName"=>value,...);
     * @return array ("affectedRow","lastInsertId");
     */
    //TODO extends with validation criteria, return when not valid & cie...
    public function save($data)
    {
        if (!is_array($data) || empty($data))
        { 
            return (false);
        }
        if (!isset($data[$this->name]))
        { 
           return (false);
        }
        $this->queryStringListField = "";
        $this->queryStringListValue = "";
        $i = 0;
        $nbFields = count($this->fields);
        $this->queryString = "INSERT INTO `".$this->name."` (";
        
        while($i < $nbFields)
        {
            if (isset($data[$this->name][$this->fields[$i]['Field']]))
            {
                $this->queryStringListField .= " `" . $this->fields[$i]['Field'] . "`,";
                $this->queryStringListValue .= " '" . mysql_real_escape_string($data[$this->name][$this->fields[$i]['Field']]) . "',";
            }
            $i++;
        }
        //delete last coma
        $this->queryString .= substr($this->queryStringListField, 0, strlen($this->queryStringListField)-1) .') '. 
        						'VALUES(' . substr($this->queryStringListValue, 0, strlen($this->queryStringListValue) - 1) . ")";
        $stmt = Database::$con->prepare($this->queryString);
        $stmt->execute();
        return (array("affectedRow"=>$stmt->rowCount(),
        			 "lastInsertId"=>Database::$con->lastInsertId()));
    }
    
    /**
     * @desc delete a row from model->name with primaryKey => $id
     *
     * @param unknown_type $id
     * @return array("affectedRow");
     */
    public function delete($id)
    {
        if (empty($id))
        {
            return (false);
        }
        $this->queryString = "DELETE FROM `" . $this->name . "` ";
        $this->queryString .= "WHERE ";
        if (is_array($id))
        {
            foreach($id as $key => $value)
                $this->queryString .= "`" . $key . "`='" . $value . "' ";
        }
        else
        {
                $this->queryString .= "`id`='" . $value . "' ";
        }
        $stmt = Database::$con->prepare($this->queryString);
        $stmt->execute();
        return (array('affectedRow'=>$stmt->rowCount())); 
    }
    
    /**
     * @desc update a row from model->name where primary key => $id, set data[name][field]
     *
     * @param unknown_type $id
     * @param array $data : array(modelName=>array(fieldName=>value));
     * @return array(affectedRow);
     */
    //TODO add validation criteria
    public function update($id, $data)
    {
    	if (empty($id))
    	    return (false);
    	if (!array($data) || empty($data))
    	    return (false);
    	$i = 0;
    	$nbFields = count($this->fields);
        $this->queryString = "UPDATE `" . $this->name . "` SET";
        while($i < $nbFields)
        {
            if(isset($data[$this->name][$this->fields[$i]['Field']]))
            {
                $this->queryString .= " `" . $this->name . "`.`" . $this->fields[$i]['Field'] . "` = '" . mysql_escape_string($data[$this->name][$this->fields[$i]['Field']]) . "',";
            }
            $i++;
        }
        $this->queryString = substr($this->queryString,0,strlen($this->queryString)-1) . " WHERE ";
        if (is_array($id))
        {
            foreach($id as $key => $value)
                $this->queryString .= "`" . $key . "`='" . $value . "' ";
        }
        else
        {
                $this->queryString .= "`id`='" . $value . "' ";
        }
        $stmt = Database::$con->prepare($this->queryString);
        $stmt->execute();
        return (array("affectedRow"=>$stmt->rowCount()));
    }
    
}
?>