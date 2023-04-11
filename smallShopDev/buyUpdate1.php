<?php
//echo '<br>begin buyProduct1<br>';
$post = $_POST;
$price = $post['price'];
$howMany = $post['howMany'];
$fkCommand = $post['fkCommand'];
$fkProduct = $post['fkProduct'];
$id = $post['id'];

print_r ($post);

include_once 'menu.php';
include_once 'databaseClass/DatabaseClass.php';
//include_once 'databaseClass/ArrTb.php';


print ('<h1>buyUpdate1</h1>');


$pwd = '';
$pwd = getcwd();
//print ($pwd);
chdir('databaseClass');
$pwd = getcwd();
//print ($pwd);


$db1 = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname);

$sql = 'update commandLine set howMany = ' .  $howMany . ', fkCommand = ' . $fkCommand . ', fkProduct = ' . $fkProduct . ' where id = ' . $id ;

print ($sql);


$db1->Update($sql);

print ('record updated');

print ("<form action= 'buyProduct1.php' method= 'POST' >");            
print ("<input type='hidden' name='fkCommand' value=$fkCommand />");
print ("<input type='submit' value='return to buy' />");
print ("</form>");
