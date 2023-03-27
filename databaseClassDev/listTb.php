<?php

include_once 'DatabaseClass.php';
//include_once 'dbConfig.php';
include_once 'ArrTb.php';

$post = $_POST;

//print_r ($post);

//$tableName = $post['tableName'];
$tableName = 'users';

$db1 = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname);
//$dba = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname); 

//print ($db1->connection);
$rows = $db1->select('SELECT * FROM ' . $tableName);


//print_r ($rows);

print ('<h1> list </h1>');
print ('<h2>' .  $tableName . '</h2>');

print ('new record');

print ("<form action='insert.php' method='POST'>");
print ("<input type='hidden' name='tableName' value=$tableName>");
print ("<input type='submit' value='insert'>");
print ("</form>");

$arrTb = new ArrTb($rows);

$list = $arrTb->list();


print ($list);




?>
