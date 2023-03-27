<?php
//echo '<br>begin update.php<br>';

include_once 'DatabaseClass.php';
include_once 'dbConfig.php';


$post = $_POST;
$id = $post['id'];
//print_r ($post);

$tableName = $post['tableName'];

$db1 = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname);
//$dba = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname); 


//print ($db1->connection);

$sql = "SELECT * FROM $tableName where id = $id";
//print ($sql);
//$rows = $db1->select('SELECT * FROM ' . $tableName . ' where id = ' . $id);
$rows = $db1->select($sql);

//print_r ($rows);

print ('<h1> delete </h1>');
print ('<h2>' .  $tableName . '</h2>');

print ('<table border=1>');
print ("<form action='delete1.php' method='POST' >");

foreach ($rows as $row)
{
   //print ($row);
   foreach ($row as $key => $value)
   {
       //print ($key);
       print ('<tr>');  
       print ('<td>');
       if ($key== 'id')
       {
          $id = $value;
          print ('</td>');
       }
       else
       {
       print ($key);
       print ('</td>');
       print ('<td>');
       print ("<input type='text' name= $key value= $value / >");

       //print ($value);
       print ('</td>');
       }
   }
   //print ('update');
/*
   print ('<td>');
   print ("<form action='delete.php' methode='POST' >");
   print ("<input type='hidden' name= 'id' value= $id / >");
   print ("<input type='submit' value= 'delete' / >");
   print ('</form>');
*/
   //print ('delete');



}

print ('</tr>');
print ('<tr>');
print ('<td>');


print ("<input type='hidden' name='tableName' value=$tableName>");

print ("<input type='hidden' name= 'id' value= $id / >");

print ("<input type='submit' value= 'delete' / >");


print ('</form>');

print ('</td>');
print ('</tr>');  

print ('</table>');



?>
