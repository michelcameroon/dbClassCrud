<?php


class ArrTb
{


    var $arrs;
    
    public function __construct($arrs)
    {
        //print ('<br>cccccome in __contruct<br>');
        $this->arrs = $arrs;
        //return $this->arrs;
        //print_r ($this->arrs);

    }

    public function getArrs()
    {

        return $this->arrs;
    }
    public function list()
    {
/*

        //$str = 'abcdf';
        //print ($srt);
        $str ='<table border=1';
        foreach ($this->arrs as $row)
        {
                 else

            $str .= '<tr>';

            foreach ($row as $key => $value)
            {
                 $str .= '<td>'; 
                 if ($key== 'id')
                 {
                     $id = $value;
                     //print ('<br>$id<br>');
                 }
                 else
                 {
                     //print ($value);
                     $str .= $value;
                     $str .='</td>';
                 }
             }
*/
/*
 

             $str .= '<td>';
             $str .= "<form action='update.php' method='POST' >";
             $str .= "<input type='hidden' name= 'id' value= $id / >";
             $str .= "<input type='hidden' name='tableName' value=$tableName>";

             $str .= "<input type='submit' value= 'update' / >";
*/  
/*



        }
        $str .= '</tr>';
        $str .= '</table>';


        return $str;
*/
    }


//    public function listBuy()dbCommandId
    public function listBuy()
    {
        //$str = 'abcdf';
        //print ($srt);
        $str ='<table border=1';

        foreach ($this->arrs as $row)
        {
  
            $str .= '<tr>';
            $str .= "<form action= 'buy1.php' method= 'POST' >";            
            

            foreach ($row as $key => $value)
            {


                 $str .= '<td>'; 
                 if ($key== 'id')
                 {
                     $id = $value;
                     //print ('<br>$id<br>');
                 }
                 else
                 {
                     //print ($value);
                     $str .= $value;
                     $str .='</td>';
                 }
  

             }
             $str .= '<td>'; 
             $str .= "<input type='text' name= 'quantity' value=1 />";
             $str .= '</td>'; 
             $str .= "<input type='hidden' name='idProduct' value=$id />";
             $str .= "<input type='hidden' name='dbCommandId' value=$id />";

             $str .= '<td>'; 

             $str .= "<input type='submit' value='buy' />";
             $str .= "</form>";
             $str .= '</td>'; 
          
             


//        $str .= '</form>';

        }
        $str .= '</tr>';
        $str .= '</table>';


        return $str;
    }


    public function listCommandLines()
    {

        $str ='<table border=1';

        $str .= "<form action= 'buy1.php' method= 'POST' >";            

        $str .= '<tr>';


        foreach ($this->arrs as $row)
        {
  
            $str .= '<tr>';


            foreach ($row as $key => $value)
            {


                 $str .= '<td>'; 

                 if ($key== 'id')
                 {
                     $id = $value;
                     //print ('<br>$id<br>');
                 }
                 else
                 {
                    //print ($value);
                     $str .= $value;
                     $str .='</td>';
                 }


  

             }

             $str .= '<td>'; 
//             $str .= "<input type='text' name= 'quantity' value=1 />";
//             $str .= '</td>'; 
//             $str .= "<input type='hidden' name='idProduct' value=$id />";
             $str .= "<input type='hidden' name='dbCommandId' value=$dbCommandIdid />";

             $str .= '</td>'; 



             $str .= '<td>'; 

             $str .= "<input type='submit' value='buy' />";
             $str .= "</form>";
             $str .= '</td>'; 
          
             


//        $str .= '</form>';


        }


        $str .= '</tr>';
        $str .= '</table>';

        return $str;
    }



    public function insert($fieldNames, $tableName)
    {
        $this->fieldNames = $fieldNames;
        $str = ' <table border=1 > ';
        $str .= " <form action='insert1.php' method= 'POST' > ";
        foreach ($fieldNames as $key => $value)
        {
            if ($value != 'id')
            {
                $str .= ' <tr> ';    
                $str .= ' <th> ';    
                $str .= $value; 
                $str .= " <input type= 'text' name= $value placeholder= $value > ";
                $str .= ' </th> ';    
                $str .= ' </tr> ';    
            }
        }

        $str .= ' <tr> ';    
        $str .= ' <td> ';    
        $str .= " <input type= 'hidden' name= 'tableName' value= $tableName > ";



        $str .= " <input type= 'submit' value= 'insert' > ";
        $str .= ' </td> ';    
        $str .= ' </tr> ';    
        $str .= " </form > ";
        $str .= ' </table> ';
        return $str;
    }



}








?>
