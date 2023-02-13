<?php

class Connection
{
 
    protected $db =null;
 
    protected $conn =null;
 
    public function Open()
    {
        try {
//        $dsn      = "mysql:dbname=pdotutorial; host=localhost";
        $dsn      = "mysql:dbname=qrcode1; host=localhost";
        $user     = "qrcode1";
        $password = "qrcode1";
 
        $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE                      => PDO::FETCH_ASSOC,
        );
 
 
 
            $this->db = new PDO($dsn, $user, $password, $options);
//            $this->conn = new PDO($dsn, $user, $password, $options);
 
            return $this->db;
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

/*  

  public function list()
    {
        echo "<br/>begin list<br/>";
        $arrList =  $this->query();

 
    }

    public function query()
    {
        echo "<br/>begin list<br/>";
        $arrList =  $this->query();

 
    }

*/
    public function queryList($query)
    {
        echo "<br/>begin querylist<br/>";

        // select
//        $stmt = $this->conn->prepare('select * from users');
        $con = $this->conn;
//        echo $con;
//        $stmt = $con->prepare('select * from users');
        $stmt = $this->db->prepare('select * from users');
        $stmt->execute();

        $arrs = $stmt->fetchAll(PDO::FETCH_ASSOC);


        print_r($arrs);
//        foreach ($arrs as $row)

//        print ("<form action='update.php' method='POST' >");


print ("<table border=1>");
//foreach ($arrs as $key => $value) {
foreach ($arrs as $arr) 
{
    print ("<tr>");

    print ("<form action='update.php' method='POST' >");


    foreach ($arr as $key => $value) 
    {
    // $arr[3] will be updated with each value from $arr...
    //echo "{$key} => {$value} ";
        //print ("{$key} => {$value} ");


        print ("<td>");
        print ("{$key}");
        if ($key == 'id')
           $id = $value;
        print ("</td>");
        print ("<td>");
        print ("{$value}");
        print ("</td>");



  

/*
        print ("<td>");
        print ("{$key}");
        print ("</td>");
        print ("<td>");
        print ("{$value}");
        print ("</td>");
*/
 


 
 
    //print_r($arr);
    }


    print ("<td>");
    print ("<input type='hidden' name= 'id' value= $id />");
    print ("<input type='submit' value= 'update' />");
    print ("</td>");
    print ("</form>");       

    print ("<form action='delete.php' method='POST' >");
   

    print ("<td>");
    print ("<input type='hidden' name= 'id' value= $id />");


    print ("<input type='submit' value= 'delete'/>");

    print ("</td>");
    print ("</form>");       



    print ("</tr>");
}
print ("</table>");

 //       print ("</form>");       


/*
        foreach ($arrs as $key => $value)
        { 
            echo {$key};
            echo {$values};
            //print ({$key}) . "\t";
            //print ({$value}) . "\t";
            //print $row['fistName'] . "\t";
            //print $row['lastName'] . "\t";


        }
*/
/*
        $sql = 'SELECT firstname, lastName FROM users';
        foreach ($this->query($sql) as $row) 
        {
            print $row['fistName'] . "\t";
            print $row['lastName'] . "\t";
//            print $row['calories'] . "\n";
        } 
        //$arrList =  $this->query();
*/
 
    }


 
    public function Close()
    {
        $this->db = null;
        return true;
    }
}


?>
