<?php
//echo '<br>begin buy<br>';
include_once 'menu.php';
include_once 'databaseClass/DatabaseClass.php';
include_once 'databaseClass/ArrTb.php';

print ('<h1>buy</h1>');

//$GLOBALS['newCommand'] = True;

$pwd = '';
$pwd = getcwd();
//print ($pwd);
chdir('databaseClass');
$pwd = getcwd();
//print ($pwd);
//print ('<br>before new<br> ');
//print ('dbhost');
//print ($dbhost);
//print ('<br>');
//print ($dbuser);
//print ('dbuser');
$db1 = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname);
//$db1 = new DatabaseClass('localhost', 'smallShop', 'smallShop', 'smallShop');


//$products = $db1->listProduct.php;
$sql = 'select * from product';
$products = $db1->Select($sql);
//print ('after product ');

//print_r ($products); 

$arrTb = new ArrTb($products);

$str = $arrTb->listBuy();
//$str = $arrTb->list();
	
print ($str);


echo '<br>end buy<br>';
?>
