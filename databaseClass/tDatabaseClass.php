<?php
echo '<br>begin tDatabaseClass<br>';

include_once 'DatabaseClass.php';
include_once 'dbConfig.php';
print ('before new');

//print ($dbhost, $dbuser, $dbpass, $dbname);

$db = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname);
//$db = new DatabaseClass("localhost", "qrcode1", "qrcode1", "qrcode1");

/*
$db = new DatabaseClass(
        "localhost",
        "qrcode1",
        "qrcode1",
        "qrcode1"
    );
*/
print ('after new db');
$rows = $db->select('select * from users');
print_r($rows);
$db1 = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname);
//$dba = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname); 
print ('after new');
//print ($db1->connection);
$rows = $db1->select('select * from users');
print_r($rows);
echo '<br>end tDatabaseClass<br>';
?>
