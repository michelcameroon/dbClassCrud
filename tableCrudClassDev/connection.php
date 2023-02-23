<?php

class Connection
{
 
    protected $db =null;
 
    protected $conn =null;

    var $tableName = '';
    var $tableFieldNames = array(); 


 
    public function Open()
    {
        try 
        {
            $dsn      = "mysql:dbname=qrcode1; host=localhost";
            $user     = "qrcode1";
            $password = "qrcode1";
 
            $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE                      => PDO::FETCH_ASSOC,
            );
 
 
 
            $this->db = new PDO($dsn, $user, $password, $options);

            return $this->db;
        } 
        catch (PDOException $e) 
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }


    public function getTableName($tableName)
    {
        $this->tableName = $tableName;   

    }

    public function fieldNames($tableName)
    {
        //echo "begin fielldNames";         
        $this->db = $this->open();

        $stmt = $this->db->prepare("DESCRIBE $tableName");

        //$stmt->bindValue(':table', $tableName, PDO::PARAM_STR);
        //$columnsquery = $stmt->execute();
        
        $stmt->execute();
        $table_fields = $stmt->fetchAll(PDO::FETCH_COLUMN);
        //print_r ($table_fields);
        
        $this->tableFieldNames = $table_fields;


        $columns = array();
        foreach ($columnsquery as $k) {
            $columns[] = $k['name'];
        }

        return $this->tableFieldNames;
    }






    public function queryList($query)
    {
        //echo "<br/>begin querylist<br/>";

        //print ("<h1> $this->tableName </h1>");
        print ("<h1> users </h1>");

        $con = $this->conn;

        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $arrs = $stmt->fetchAll(PDO::FETCH_ASSOC);



        //echo "here comes the insert new record";

        print ("<form action= 'insert.php' method= 'POST' >");


        print (" click on the next button to insert a new record");

        print (" <input type= 'submit' value= 'insert' />" );

        print ("</form>");

        //print_r ($this->tableFieldNames);
        //$fieldNames = $this->db->fieldNames($this->tableName);

        print ("<table border=1>");
        print ("<tr>");

        foreach ($this->tableFieldNames as $tableFieldName)
        {
            print ("<th>");
            print ($tableFieldName);
            print ("</th>");


        }


        print ("/<tr>");

        foreach ($arrs as $arr) 
        {
            print ("<tr>");

            print ("<form action='update.php' method='POST' >");


            foreach ($arr as $key => $value) 
            {
                if ($key == 'id')
                   $id = $value;
        
                print ("<td>");
                print ("{$value}");
                print ("</td>");
            }

            //print ("<form action='update..php' method='POST' >");

            print ("<td>");
            print ("<input type='hidden' name= 'id' value= $id />");
            print ("<input type='hidden' name= 'firstName' value= $firstName />");
            print ("<input type='hidden' name= 'lstaName' value= $lastName />");
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

    }


    public function queryListOne($id)
    {
        //echo "begin listOne";
        $stmt = $this->db->prepare('select * from users where id= ?');
        $stmt->execute([$id]);

        $arrs = $stmt->fetch();

        print ("arrs = ");
        print_r($arrs);
        return $arrs;


    }

    public function delete($id)
    { 

        //echo "begin delete";
        $sql = "DELETE FROM users WHERE id=?";
        $stmt= $this->db->prepare($sql);
        $stmt->execute([$id]);
    }
 
    public function update($firstName, $lastName, $id)
    { 
        //echo "begin update";
        $sql = "UPDATE users SET firstName=?, lastName=? WHERE id=?";
        $stmt= $this->db->prepare($sql);
        $stmt->execute([$firstName, $lastName, $id]);
        
    }
 

 
    public function Close()
    {
        $this->db = null;
        return true;
    }
}


?>
