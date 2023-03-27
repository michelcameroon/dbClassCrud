<?php
//echo '<br>begin tDatabaseClass<br>';

include_once 'DatabaseClass.php';
include_once 'dbConfig.php';


//print ($dbhost, $dbuser, $dbpass, $dbname);


$db1 = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname);

//print ($db1->connection);
$rows = $db1->tableChoosed('SHOW TABLES');
//print_r($rows);
print ('<br>');
print ('<h1> list tables in this database </h1>');
print ('<table border=1>');

foreach ($rows as $row)
{
    ///print($row);
    foreach ($row as $key => $value)
    {
        print ('<tr>');
        print ('<td>');
//        print ("<form action='list.php' method='POST' >");
        print ("<form action='listTb.php' method='POST' >");
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



//echo '<br>end tDatabaseClass<br>';
?>
