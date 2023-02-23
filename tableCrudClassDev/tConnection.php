<?php
//echo "begin";

include_once 'connection.php';

$conec = new Connection();


$con = $conec->Open();



$tableName = 'users';


$fieldNames = $conec->fieldNames($tableName);

//print_r ($fieldNames); //ok

$query = "select * from $tableName";

$queryList = $conec->queryList($query);


//echo "<br/>end t"; 
?>
