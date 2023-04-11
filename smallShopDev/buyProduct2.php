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

print_r ($products); 



print ('<table border=1');

//foreach ($this->arrs as $row)
foreach ($products as $row)
{
  
    print ('<tr>');
    print ("<form action= 'buyProduct.php' method= 'POST' >");            
            
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
            //print ($value);
            print ($value);
            print ('</td>';
        }
  

    }
    print ('<td>'; 
    print ("<input type='text' name= 'quantity' value=1 />");
    print ('</td>'); 
    print ("<input type='hidden' name='idProduct' value=$id />)";
    print ("<input type='hidden' name='dbCommandId' value=$id />";

    print ('<td>'); 

    print ("<input type='submit' value='buy' />");
    print ("</form>";
    print ('</td>'); 
          
             


//        $str .= '</form>';

}
print ('</tr>');
print ('</table>';



?>
