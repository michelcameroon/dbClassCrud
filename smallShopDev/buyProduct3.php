<?php
echo 'aaa';
exit();


?>

<?php
echo '<br>begin buyProduct3<br>';

$post = $_POST;
$price = $post['price'];
$howMany = $post['howMany'];

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
chdir('databaseClass');
$pwd = getcwd();
//print ($pwd);


$db1 = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname);




// list commandLine

$sql = 'select * from commandLine where fkCommand = ' . $commandId;
//$sql = 'select product.name, product.price, commandLine.howMany from product, commandLine where fkCommand = ' . $commandId . ' and commandLine.fkCommand = product.id';
//$sql = 'select product.name, product.price, commandLine.howMany, subTotal from product, commandLine where fkCommand = ' . $commandId ;



//print ($sql);



$commandLines = $db1->Select($sql);


if ($commandLines.isempty())
{
    print ('basket is empty)
    // new command

}
else
{
/*
//print_r ($commandLines);


// insert in commandLine

$subTotal = $howMany * $price;

//print ($subTotal);
 
$sql = "insert into commandLine (fkCommand, fkProduct, howMany, subtotal) values ($commandId, $idProduct, $howMany, $subTotal)"; 
//print ($sql);

$commandLineInsertId = $db1->insert($sql);




//print ($commandLineInsertId); 

// list commandLine

//$sql = 'select * from commandLine where fkCommand = ' . $commandId;
//$sql = 'select product.name, product.price, commandLine.howMany, subTotal from product, commandLine where fkCommand = ' . $commandId . ' and fkProduct = product.id' ;
//$sql = 'select product.name, product.price, commandLine.howMany, subTotal from product, commandLine where fkCommand = ' . $commandId . ' and fkProduct = product.id order by product.id desc' ;
$sql = 'select product.name, product.price, commandLine.howMany, subTotal from product, commandLine where fkCommand = ' . $commandId . ' and fkProduct = product.id order by commandLine.id desc' ;




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



//foreach ($this->arrs as $row)

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
}

 
print ('</tr>');
print ('<tr>');
print ('<td>');
print ('</td>');
print ('<td>');
print ('</td>');
print ('<td>');
print ('</td>');
print ('<td>');

print ("<form action= 'commandEnd.php' method= 'POST' >");            
print ("<input type='text' name='commandTotal' value=$commandTotal />");
print ("<input type='submit' value='finish command' />");
print ("</form>");

print ('</td>'); 


print ('</tr>');

}
print ('</table>');

// new commandLine

print ('</td>');
print ('<td>');
print ('<br>new commandLine<br>');

$sql = 'select * from product';
//$sql = 'select * from commndLine';
$products = $db1->Select($sql);

print ('<table border=1');

//foreach ($this->arrs as $row)
$price = 0;
foreach ($products as $row)
{
  
    print ('<tr>');
    print ("<form action= 'buyProduct1.php' method= 'POST' >");            


    foreach ($row as $key => $value)
    {


        print ('<td>'); 
        if ($key== 'id')
        {
            $id = $value;
            //print ('<br>$id<br>');
        }
        else
        {
            if ($key == 'price')
            {

                $price = $value;
            }
            //print ($value);
            print ($value);
            print ('</td>');
        }







    }
    print ('<td>'); 
    print ("<input type='hidden' name= 'price' value=$price />" );
    print ("<input type='text' name= 'howMany' value=1 />" );
    print ('</td>'); 
    print ("<input type='hidden' name='idProduct' value=$id />");
    print ("<input type='hidden' name='commandId' value=$commandId />");
    print ('<td>'); 

    print ("<input type='submit' value='buy' />");
    print ("</form>");
    print ('</td>'); 




//        $str .= '</form>';

}
print ('</tr>');
print ('</table>');


print ('</td>');
print ('</tr>');
print ('</table>');



/*
//$sql = 'select * from  product where id = ' . $id;
$sql = 'select * from product';
$products = $db1->Select($sql);


print ($id);
print ($sql);

$arrs = $db1->Select($sql);

print_r ($arrs);  

*/

?>
