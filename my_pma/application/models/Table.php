<?php
class Table extends Model 
{
	
    public function __construct($table_name = "")
    {
    	 $this->setName($table_name);
         $this->setFields();
    }
    
}
?>