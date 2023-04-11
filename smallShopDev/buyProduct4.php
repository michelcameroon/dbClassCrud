<?php
echo '<br>begin buyProduct4<br>';
$post = $_POST;
//$commandPrice = $post['commandPrice'];
//$commandPrice = $post['price'];
$price = $post['price'];
$howMany = $post['howMany'];

print_r ($post);


//print_r ($post);

$idProduct = $post['idProduct'];
print ('<br>');
print ($post['fkCommand']);
print ('<br>');
//$howMany = $post['howMany'];
$fkCommand = $post['fkCommand'];
//in_array('fkCommand', $post))
//if (in_array("fkCommand", $post))
if ($fkCommand > 0)
{
    $fkCommand = $post['fkCommand'];
    print ('in array ' . $fkCommand );
}
else
{
    $fkCommand = 0;
    print ('not in array' . $fkCommand);
}

print ($fkCommand);

//echo '<br>begin buy<br>';
include_once 'menu4.php';
include_once 'databaseClass/DatabaseClass.php';
//include_once 'databaseClass/ArrTb.php';

print ('<h1>buyProduct4</h1>');


$pwd = '';
$pwd = getcwd();
//print ($pwd);
//print ($pwd);
chdir('databaseClass');
$pwd = getcwd();
print ($pwd);



$db1 = new DatabaseClass($dbhost, $dbuser, $dbpass, $dbname);




// list commandLine

//$sql = 'select * from commandLine where fkCommand = ' . $commandId;
//$sql = 'select * from commandLine where fkCommand = 1000 ';
//$sql = 'select * from commandLine where fkCommand = 0';
$sql = 'select * from commandLine where fkCommand = ' . $fkCommand;

//$sql = 'select * from commandLine ';
//$sql = 'select product.name, product.price, commandLine.howMany from product,>
//$sql = 'select product.name, product.price, commandLine.howMany, subTotal fro>
print ($sql);

$commandLines = $db1->Select($sql);

//print_r ($commandLines);




if ($fkCommand == 0)
//if (empty($commandLines))
{
    print ('basket is empty');

    $now1 = date('Y-m-d H:i:s');
    //print ($now1);


    $sql = "insert into command (now, total) values ('$now1', 0)";

    //print ($sql);       

    $fkCommand = $db1->Insert($sql);



    print ('<br>new commandLine<br>');

    $sql = 'select * from product';
    //$sql = 'select * from commndLine';
    $products = $db1->Select($sql);

    print ('<table border=1');

//foreach ($this->arrs as $row)
    $commandPrice = 0;
    foreach ($products as $row)
    {
  
        print ('<tr>');
        print ("<form action= 'buyProduct4.php' method= 'POST' >");            


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

                    $commandPrice = $value;
                }
                //print ($value);
                print ($value);
                print ('</td>');
            }

    }
    print ('<td>'); 
    print ("<input type='hidden' name= 'price' value=$commandPrice />" );
    print ("<input type='text' name= 'howMany' value=1 />" );
    print ('</td>'); 
    print ("<input type='hidden' name='idProduct' value=$id />");
    print ("<input type='hidden' name='fkCommand' value=$fkCommand />");
    print ('<td>'); 

    print ("<input type='submit' value='buy' />");
    print ("</form>");
    print ('</td>'); 




    //        $str .= '</form>';

    }
    print ('</tr>');


    print ('</table>');
}




// insert in commandLine

$subTotal = $howMany * $price;

print ($howMany);
print ($price);
print ($subTotal);
 
$sql = "insert into commandLine (fkCommand, fkProduct, howMany, subtotal) values ( $fkCommand, $idProduct, $howMany, $subTotal ) ";
print ($sql);

$commandLineInsertId = $db1->insert($sql);





//print ($commandLineInsertId); 

// list commandLine
//$sql = 'select * from commandLine where fkCommand = ' . $commandId;
//$sql = 'select product.name, product.price, commandLine.howMany, subTotal fro>
//$sql = 'select product.name, product.price, commandLine.howMany, subTotal fro>
//$sql = 'select product.name, product.price, commandLine.howMany, subTotal from >

$sql = 'select commandLine.id, product.name, product.price, commandLine.howMany, subTotal, fkCommand, fkProduct from product, commandLine where fkCommand = ' . $fkCommand . ' and fkProduct = product.id order by commandLine.id desc' ;




print ('sql select comandLine');
print ($sql);


$commandLines = $db1->Select($sql);


//print_r ($commandLines);




//$commandId = $commandLines['fkCommand'];

//print  ($commandId);
/*
print  ('<table border=1>');
print ( '<tr>');
print ( '<td>');

// th header of table

//if ($commandTotal == 0)
//    $commandTotal = $subTotal;
*/


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
        if ($key == 'id')
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
                $fkCommand = $value;
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



    }


//        $str .= '</form>';

print ('</td>');
print ('</tr>');
print ('</table>');

//}


print ('<br>new commandLine<br>');

$sql = 'select * from product';
    //$sql = 'select * from commndLine';
$products = $db1->Select($sql);

print ('<table border=1');

//foreach ($this->arrs as $row)
$commandPrice = 0;

foreach ($products as $row)
{
  
    print ('<tr>');
    print ("<form action= 'buyProduct4.php' method= 'POST' >");            


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
                 $commandPrice = $commenPrice + $value;
            }
            //print ($value);
            print ($value);
            print ('</td>');

            
        }
    }
 
print ('<td>'); 
print ("<input type='hidden' name= 'price' value=$commandPrice />" );

print ("<input type='text' name= 'howMany' value=1 />" );
print ('</td>'); 
print ("<input type='hidden' name='idProduct' value=$id />");
print ("<input type='hidden' name='fkCommand' value=$fkCommand />");

print ('</td>');
print ("<input type='hidden' name='idProduct' value=$id />");
print ("<input type='hidden' name='fkCommand' value=$fkCommand />");
print ('<td>'); 

print ("<input type='submit' value='buy' />");
print ("</form>");
print ('</td>'); 
}

    //        $str .= '</form>';


print ('</tr>');
print ('</table>');





echo '<br> end buyProduct4';
?>
