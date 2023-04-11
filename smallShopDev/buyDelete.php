<?php
echo '<br>begin buyDelete<br>';

$post = $_POST;
$price = $post['price'];
$howMany = $post['howMany'];

$id = $post['id'];

$fkProduct = $post['fkProduct'];

$fkCommand = $post['fkCommand'];

print_r ($post);





//echo '<br>begin buy<br>';
include_once 'menu.php';
include_once 'databaseClass/DatabaseClass.php';
//include_once 'databaseClass/ArrTb.php';

print ('<h1>buyDelete</h1>');

//$GLOBALS['newCommand'] = True;

$pwd = '';
$pwd = getcwd();
//print ($pwd);
chdir('databaseClass');
$pwd = getcwd();
//print ($pwd);
//$commandId = $post['commandId];
//$commandLineId = 228;

$db1 = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname);

//$sql = 'select * from commandLine where fkCommand = ' . 271;
//$sql = 'select * from commandLine where fkCommand = ' . $fkCommand;
//$sql = 'select * from commandLine where id = ' . $id . ' and fkCommand = ' . $fkCommand;
$sql = 'select * from commandLine where id = ' . $id ;

print ($sql);

$commandLines = $db1->Select($sql);
print ('<br>');
print_r ($commandLines);
print ('<br>');

 

// now put in table
// exist already in buyproduct1.php just paste it






//$sql = 'select commandLine.id, product.name, product.price, commandLine.howMany, subTotal from product, commandLine where fkCommand = ' . $commandId . ' and fkProduct = ' . $fkProduct . ' and commandLine.id = ' . $id . ' order by commandLine.id desc ';

//$sql = 'select product.name, product.price, commandLine.howMany, subTotal from product, commandLine where fkCommand = ' . $fkCommand . ' and fkProduct = 
//$sql = 'select commandLine.id, product.name, product.price, commandLine.howMany, subTotal from product, commandLine where fkCommand = ' . $fkCommand . ' and fkProduct = ' . $fkProduct . ' order by commandLine.id desc ' ;

//$sql = 'delete from commandLine where id = $id';
$sql = 'delete from commandLine where id = ' . $id;
//print ($sql);
$bool = $db1->Remove($sql);

print ("<form action= 'buyProduct1.php' method= 'POST' >");            
print ("<input type='text' name='fkProduct' value=$fkProduct />");
print ("<input type='text' name='fkCommand' value=$fkCommand />");
print ("<input type='text' name='id' value=$id />");
print ("<input type='text' name='fromDelete' value=1 />");
print ("<input type='submit' value='delete ok back to shopping' />");
print ("</form>");




/*
$sql = 'select commandLine.id, product.name, product.price, commandLine.howMany, subTotal from product, commandLine where fkCommand = ' . $fkCommand  ;


print ($sql);


$commandLines = $db1->Select($sql);



//$commandLines = $db1->Select($sql);

print_r ($commandLines);
*/
/*



$id = $post['id'];
print ($id);
$sql = 'delete from commandLine where id = $id';

//$db1->Remove($sql);

$bool = $db1->Remove($sql);

if ($bool == True)
    print ('deleted');
else
    print ('not deleted');

print ($id);


print ("<form action= 'buyProduct1.php' method= 'POST' >");            
print ("<input type='hidden' name='id' value=$id />");
print ("<input type='submit' value='deleted' />");
print ("</form>");
*/


//header (Location: 'buyProduct1.php');

echo '<br>end buyDelete.php';
?>
