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
print ('after new db');
$rows = $db->select('select * from product');
print_r($rows);
*/

$db1 = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname);
//$dba = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname); 
print ('after new');
//print ($db1->connection);
$rows = $db1->tableChoosed('SHOW TABLES');
print_r($rows);
print ('<br>');

print ('<table border=1>');

foreach ($rows as $row)
{
    ///print($row);
    foreach ($row as $key => $value)
    {
        print ('<tr>');
        print ('<td>');
        print ("<form action='list.php' method='POST' >");
        print ("<input type='hidden' name='tableName' value=$value />");
        print ($value);
        print ('</td>');
        print ('<td>');

        print ("<input type='submit' value='Choose me' />");
        print ('</form>');
        print ('</td>');
        print ('</tr>');

  
    }   
    
}
print ('</table>');



echo '<br>end tDatabaseClass<br>';
?>
