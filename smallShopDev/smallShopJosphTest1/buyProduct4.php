<?php
echo '<br>begin buyProduct3<br>';
$post = $_POST;
$price = $post['price'];
$howMany = $post['howMany'];

print_r ($post);


//print_r ($post);

$idProduct = $post['idProduct'];
//$howMany = $post['howMany'];
$commandId = $post['commandId'];

//echo '<br>begin buy<br>';
include_once 'menu.php';
include_once 'databaseClass/DatabaseClass.php';
//include_once 'databaseClass/ArrTb.php';

print ('<h1>buyProduct1</h1>');


$pwd = '';
$pwd = getcwd();
//print ($pwd);
//print ($pwd);
chdir('databaseClass');
$pwd = getcwd();
//print ($pwd);

exit();

$db1 = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname);




// list commandLine

$sql = 'select * from commandLine where fkCommand = ' . $commandId;
//$sql = 'select product.name, product.price, commandLine.howMany from product,>
//$sql = 'select product.name, product.price, commandLine.howMany, subTotal fro>


$commandLines = $db1->Select($sql);



if (empy($commandLines))
{
    print ('basket is empty);

}
else
{

}

/*
//print_r ($commandLines);


// insert in commandLine

$subTotal = $howMany * $price;

//print ($subTotal);
 
$sql = "insert into commandLine (fkCommand, fkProduct, howMany, subtotal) value>
//print ($sql);

$commandLineInsertId = $db1->insert($sql);




//print ($commandLineInsertId); 

// list commandLine
//$sql = 'select * from commandLine where fkCommand = ' . $commandId;
//$sql = 'select product.name, product.price, commandLine.howMany, subTotal fro>
//$sql = 'select product.name, product.price, commandLine.howMany, subTotal fro>
$sql = 'select product.name, product.price, commandLine.howMany, subTotal from >




//print ($sql);


$commandLines = $db1->Select($sql);


//print_r ($commandLines);



//$commandId = $commandLines['fkCommand'];

//print  ($commandId);

print  ('<table border=1>');
print ( '<tr>');
print ( '<td>');

// th header of table

//if ($commandTotal == 0)
//    $commandTotal = $subTotal;


print ('<br>list commandLines<br>');

print ('<table border=1');
print ( '<tr>');

print ('<td>'); 

print ('</td>');
print ('<td>');
print ('</td>');
print ('<td>');
print ('</td>');

print ( '</tr>');


// titel in table th

print ( '<tr>');
print ('<th>');
print ('name');
print ('</th>');
print ('<th>');
print ('price');
print ('</th>');
print ('<th>');
print ('howMany');
print ('</th>');
print ('<th>');
print ('subTotal');
print ('</th>');

print ( '/<tr>');



print ('<tr>');


print ('<td>'); 
foreach ($commandLines as $row)
{
  
    print ('<tr>');




    print ("<form action= 'buyUpdate.php' method= 'POST' >");            

    $th = 0;
    foreach ($row as $key => $value)
    {


        if ($key== 'id')
        {
            $id = $value;
            //print ('<br>$id<br>');
            //print ($value);
        }
        else
        else
        {
            print ('<td>'); 
            //print ($value);
            if ($key == 'fkCommand')
            {
                $commandId = $value;
            }
            if ($key == 'subTotal')
            {
                 $commandTotal = $commandTotal + $value;
                 //print ($commandTotal);

            }
            print ($value);
            print ('</td>');
        }
  

    }
    print ('<td>'); 
    //print ("<input type='text' name= 'quantity' value=1 />");
    print ('</td>'); 
    print ("<input type='hidden' name='idProduct' value=$id />");
    print ("<input type='hidden' name='commandId' value=$commandId />");
    print ('</td>'); 
    print ('<td>'); 

    print ("<input type='submit' value='update' />");
    print ("</form>");
    print ('</td>'); 

    print ('<td>'); 

    print ("<form action= 'buydelete.php' method= 'POST' >");            
    print ("<input type='hidden' name='idProduct' value=$id />");
    print ("<input type='submit' value='delete' />");
    print ("</form>");
    print ('</td>'); 






//        $str .= '</form>';
*/
//}










?>
