<?php
echo '<br>begin listProduct.php<br>';
//include_once 'dbConfig.php';
include_once 'DatabaseClass.php';


$post = $_POST;

//print_r ($post);

////$tableName = $post['tableName'];
$tableName = 'product';

$db1 = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname);
//$dba = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname); 

//print ($db1->connection);
//$rows = $db1->select('SELECT * FROM ' . $tableName);
$rows = $db1->select('SELECT * FROM product');

print_r ($rows);

print ('<h1> list </h1>');
print ('<h2>' .  $tableName . '</h2>');

print ('new record');

print ("<form action='insert.php' method='POST'>");
print ("<input type='hidden' name='tableName' value=$tableName>");
print ("<input type='submit' value='insert'>");
print ("</form>");

print ('<table border=1>');

foreach ($rows as $row)
{
   //print ($row);
   print ('<tr>');  
   foreach ($row as $key => $value)
   {
       //print ($key);
       print ('<td>');
       if ($key== 'id')
       {
           $id = $value;
           //print ('<br>$id<br>');
       }
       print ($value);
       print ('</td>');
   }
   print ('<td>');
   print ("<form action='update.php' method='POST' >");
   print ("<input type='hidden' name= 'id' value= $id / >");
   print ("<input type='hidden' name='tableName' value=$tableName>");
   print ("<input type='submit' value= 'update' / >");
   print ('</form>');
   //print ('update');
   print ('</td>');
   print ('<td>');
   print ("<form action='delete.php' method='POST' >");
   print ("<input type='hidden' name= 'id' value= $id / >");
   print ("<input type='hidden' name='tableName' value=$tableName>");
   print ("<input type='submit' value= 'delete' / >");
   print ('</form>');

   //print ('delete');


   print ('</td>');
   print ('</tr>');  

}

print ('</table>');



?>
