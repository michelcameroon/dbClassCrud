<?php

class ArrInTb
{

        
    private $arrs = array();

    // this function is called everytime this class is instantiated             
    //public function __construct( $dbhost = "localhost", $username = "qrcode1", $password = "qrcode1", $dbname = "qrcode1"){
    public function __construct( $arrs)
    {
        print ('come in contruct');
        $this->arrs = $arrs;

    }


/*
    public function arrInRow($arrs)
    {
        print ('<table>');
        foreach($this=>arrs as $arr)
        {
            foreach ($arr as $key => $value)
            {


            }

        } 
 

    }

*/
     public function updateDelete($arrs)
     {
         print ('in updateDelete');
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

    }



}





?>

