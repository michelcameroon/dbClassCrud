<?php
//echo '<br><h1>begin ArrTb.php</h1><br>';

class ArrTb
{


    var $arrs;
    
    public function __construct($arrs)
    {
        print ('<br>cccccome in __contruct<br>');
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
        //$str = 'abcdf';
        //print ($srt);

        $str ='<table border=1';
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
                 //print ($value);
                 $str .= $value;
                 $str .='</td>';
             }
/*
 

             $str .= '<td>';
             $str .= "<form action='update.php' method='POST' >";
             $str .= "<input type='hidden' name= 'id' value= $id / >";
             $str .= "<input type='hidden' name='tableName' value=$tableName>";

             $str .= "<input type='submit' value= 'update' / >";
*/             $str .= '</form>';

        }
        $str .= '</tr>';
        $str .= '</table>';


        return $str;
    }

    public function insert($fieldNames)
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
        $str .= " <input type= 'hidden' name= 'tableName' value= $this->tableName > ";



        $str .= " <input type= 'submit' value= 'insert' > ";
        $str .= ' </td> ';    
        $str .= ' </tr> ';    
        $str .= " </form > ";
        $str .= ' </table> ';
        return $str;
    }


}








?>
