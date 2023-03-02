<?php
echo 'begin tDbCrudClass<br>';

include_once 'DbCrudClass.php';
//require 'DbCrudClass.php';
//$db1 = new DbClass($dbName, $dbHost, $dbUser, $password);
//$db1 = new DbClass('qrcode1', 'localhost', 'qrcode1', 'qrcode1');
//$db1 = new Db('qrcode1', 'localhost', 'qrcode1', 'qrcode1');
$db1 = new DbClass('qrcode1', 'localhost', 'qrcode1', 'qrcode1');

$tableNames = $db1->listTables();

print_r ($tableNames);


print ('<table border=1>');
//print ("<form action='list.php' method='POST' >");

foreach ($tableNames as $tableName)
{
    print ("<form action='list.php' method='POST' >");
    print ("<tr><td>");
    print ($tableName);
    print ('</td>');
    print ('<td>');
    //print ("<input type='text' name='tableName' value=$tableName />"); 
    print ("<input type='hidden' name='tableName' value=$tableName />"); 
    print ("<input type='submit' value='choose me' />"); 
    print ("</td></tr>");
    print ('</form> ');

}
print ('</table>');


/*

*/
echo '<br>end tDbCrudClass';

?>
