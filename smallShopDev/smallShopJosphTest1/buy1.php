<?php
echo '<br>begin buy1<br>';
$post = $_POST;


print_r ($post);
$id = $post['idProduct'];
$quantity = $post['quantity'];


include_once 'menu.php';
include_once 'databaseClass/DatabaseClass.php';
include_once 'databaseClass/ArrTb.php';

print ('<h1>buy1</h1>');

$pwd = '';
$pwd = getcwd();
//print ($pwd);
chdir('databaseClass');
$pwd = getcwd();

$db1 = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname);
//$db1 = new DatabaseClass('localhost', 'smallShop', 'smallShop', 'smallShop');

// create a new command
$now1 = date('Y-m-d H:i:s');
print ($now1);

print ('now = ');
print ($now1);
//    $sql = 'insert into command (now, total) values (now(), 0)';
//    $sql = "insert into command (now, total) values ('2022/05/05', 0)";
$sql = "insert into command (now, total) values ('$now1', 0)";
//    $sql = "insert into command (now, total) values ('2023-03-30 15:02:03', 0>
print ($sql);       
//    $this->dbCommandId = $db1->Insert($sql);
    //$this->dbCommandId = $db1->Insert($sql);
$db1->dbCommandId = $db1->Insert($sql);

// list commandLine
$sql = 'select * from commandLine where fkCommand = ' . $db1->dbCommandId;

print ($sql);


//$db1->list
$commandLines = $db1->Select($sql);
print ('<br>commandLine<br>');
print_r ($commandLines);

if (empty($commandLines)) {
    echo 'le basket est encore vide $var is either 0, empty, or not set at all';

    // create a new command
    $now1 = date('Y-m-d H:i:s');
    print ($now1);

    print ('now = ');
    print ($now1);
    //    $sql = 'insert into command (now, total) values (now(), 0)';
    //    $sql = "insert into command (now, total) values ('2022/05/05', 0)";
    $sql = "insert into command (now, total) values ('$now1', 0)";
    //    $sql = "insert into command (now, total) values ('2023-03-30 15:02:03', 0>
    print ($sql);       
    $dbCoomandId = $db1->Insert($sql);
    $db1->dbCommandId = $db1->Insert($sql);



}
else
    echo ' not empty';

print ($CommandLine.count());
print ('<br> commandLines <br>');
print_r ($commandLines);

$arrTb = new ArrTb($commandLines);

$str = $arrTb->listCommandLines();
//$str = $arrTb->list();

print ($str);





// list product

//$sql = 'select * from  product where id = ' . $id;
$sql = 'select * from product';
$products = $db1->Select($sql);


print ($id);
print ($sql);

$arrs = $db1->Select($sql);

print_r ($arrs);  


foreach ($arrs as $arr)
{
    foreach ($arr as $key => $value)
    {
        print ($key);
        if ($key == 'price')
            $price = $value;
        print ($value);
      
    }   

}


//$sql = 'select * from product';
//$products = $db1->Select($sql);
//print ('after product ');

print_r ($products); 

$arrTb = new ArrTb($products);

$str = $arrTb->listBuy();
//$str = $arrTb->list();

print ($str);



exit();


//$price = $arr['price'];

print ($price);

//$GLOBALS['a'] = 'localhost';

$subTotal =  $price * $quantity;

print ($subTotal);

// insert a record in command
//

/*
$newCommand = $db1->getNewCommand();

print ('<br>');
print ($newCommand);
print ('<br>');
if ($newCommand == True)
    print ('true');
else
    print ('false');

// insert a new command
//if ($newCommand == True)

*/

//print ('<br>this->dbCommandId ');
//print ($this->dbCommandId);

if ($db1->dbCommandId == 0)
{
    //$db1->newCommand == False;
    //$now = new DateTime();
    $now1 = date('Y-m-d H:i:s');
    print ($now1);

    print ('now = ');
    print ($now1);
//    $sql = 'insert into command (now, total) values (now(), 0)';
//    $sql = "insert into command (now, total) values ('2022/05/05', 0)";
    $sql = "insert into command (now, total) values ('$now1', 0)";
//    $sql = "insert into command (now, total) values ('2023-03-30 15:02:03', 0)";
    print ($sql);	
//    $this->dbCommandId = $db1->Insert($sql);
    //$this->dbCommandId = $db1->Insert($sql);
    $db1->dbCommandId = $db1->Insert($sql);
    print ('db1->dbCommandId = ');    
    print ($db1->dbCommandId);
    //print ($dbCommandId);
    //$this->dbCommandId = $dbCommandid;
    //print ($this->dbCommandId);
/*
    $newCommandFalse = $db1->setNewCommandFalse();
    print ('<br>');
    if ($newCommandFalse == True)
        print('true');
    else 
        print ('false');
    print ($newCommandFalse);
    print ('after false');
*/
}

// come commandLine
print ('sql = '); 

$sql = "insert into commandLine (fkCommand, fkProduct, howMany, subTotal) values ($db1->dbCommandId, $id, $quantity, $subTotal)";

print ('sql = '); 
print ($sql);

$db1->insert($sql);



$sql = 'select * from commandLine where fkCommand = ' . $db1->dbCommandId;

//$db1->list
$commandLines = $db1->Select($sql);
print ('<br> commandLines <br>');
print_r ($commandLines);

$arrTb = new ArrTb($commandLines);

$str = $arrTb->listCommandLines();
//$str = $arrTb->list();

print ($str);

//$products = $db1->listProduct.php;
$sql = 'select * from product';
$products = $db1->Select($sql);
//print ('after product ');

//print_r ($products); 

$arrTb = new ArrTb($products);

$str = $arrTb->listBuy();
//$str = $arrTb->list();

print ($str);





?>
