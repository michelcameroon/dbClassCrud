<?php

include_once 'DatabaseClass.php';
include_once 'dbConfig.php';


$post = $_POST;

print_r ($post);

$tableName = $post['tableName'];
print ($tableName);


$db1 = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname);
//$dba = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname); 
print (' new db1'. $tableName);

$sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= " . "'$tableName'";

print ($sql);
/*
$sql = "SELECT COLUMN_NAME 
FROM INFORMATION_SCHEMA.COLUMNS 
WHERE TABLE_SCHEMA='qrcode1' 
    AND TABLE_NAME='presence'";
*/

$fieldNames = $db1->Select($sql);
print_r($fieldNames);


print ('<table border=1>');

print ("<form action='insert1.php' method='post'>");



foreach ($fieldNames as $fieldName)
{

    //print ($fieldName);
    foreach ($fieldName as $key => $value)
    {
        print ('<tr>');
        print ('<td>');
        print ($value);
        print ('</td>');
        print ('<td>');

        print ("<input type='text' name=$value value=''>");
        print ('</td>');


        print ('</tr>');

    }
} 
print ('<tr>');
print ('<td>');
print ("<input type='hidden' name='tableName' value=$tableName>");

print ("<input type='submit' value='insert' >");
print ('</td>');
print ('</tr>');

print ('</form>');
print ('</table>');

?>
