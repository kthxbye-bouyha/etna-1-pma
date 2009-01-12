<?php
error_reporting(E_ALL);
$user = "root";
$pwd = "";
$host = "localhost";

$db_name = array_shift($_POST);
$db = mysql_connect($host, $user, $pwd);
mysql_select_db('martinmyadmin', $db);

foreach ($_POST as $table_name => $table_attributes)
{
    $queryString = "SELECT COUNT(*) as isRegistred " .
                    "FROM `positions` " . 
                    "WHERE `positions`.`db`='" . $db_name . "' " .
                        "AND `positions`.`table_id`='".$table_name."'";
    $res = mysql_fetch_assoc(mysql_query($queryString, $db));
    if($res['isRegistred'] == 0)
    {
        $queryString = "INSERT INTO `positions`(`db`, `table_id`, `x`, `y`) ". 
        					"VALUES('".$db_name."',
        							'".$table_name."',
        							'".$table_attributes['x']."',
        							'".$table_attributes['y']."')";
        mysql_query($queryString);
    }
    else
    {
        $queryString = "UPDATE `positions` ".
    					"SET `x`='".$table_attributes['x']."',
    						 `y`='".$table_attributes['y']."' ".
                        "WHERE `positions`.`db`='" . $db_name . "' " .
                        "AND `positions`.`table_id`='".$table_name."'";
        $res = mysql_query($queryString);
    }
}
mysql_close($db);
?>