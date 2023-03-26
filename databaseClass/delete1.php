<?php
//echo '<br>begin delete1.php<br>';

include_once 'DatabaseClass.php';
include_once 'dbConfig.php';


$post = $_POST;
$id = $post['id'];
//print_r ($post);

$tableName = $post['tableName'];

$db1 = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname);
//$dba = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname); 

//print ($db1->connection);



$sql = "DELETE FROM $tableName where id = $id";
//print ($sql);
//$rows = $db1->select('SELECT * FROM ' . $tableName . ' where id = ' . $id);
$rows = $db1->Remove($sql);

print ("<form action='list.php' method='POST'>");
print ("<input type='hidden' name='tableName' value= $tableName>");
print ("<input type= 'submit' value= 'back'>");
print ('</form>');




?>
