<?php
//echo 'begin DatabaseClass';
include_once 'dbConfig.php';

class DatabaseClass{	
	
    private $connection = null;
    private $tableName = '';
    private $fieldDesc = null;
    private $fieldNames = array();

    //private $newCommand = True;
    //protected $newCommand = True;
    var $newCommand = True;
    var $dbCommandId = 0;

    // this function is called everytime this class is instantiated		
    //public function __construct( $dbhost = "localhost", $username = "qrcode1", $password = "qrcode1", $dbname = "qrcode1"){
    public function __construct( $dbhost, $dbuser, $dbpass, $dbname){
        $this->dbhost = $dbhost;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
        $this->dbname = $dbname;
        try{
	
            //$this->connection = new mysqli($dbhost, $username, $password, $dbname);
            $this->connection = new mysqli($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);

		
            if( mysqli_connect_errno() ){
                throw new Exception("Could not connect to database.");   
            }
		
        }catch(Exception $e){
            throw new Exception($e->getMessage());   
        }			
	
    }

    public function getNewCommand()
    {
        $newCommand = $this->newCommand;
        return $newCommand; 

    }

    public function setNewCommandFalse()
    {
        $this->newCommand = False;
        print ('<br>after falseeeee<br> ');
        print ($this->newCommand);
        if ($this->newCommand == True)
            print ('true');
        else
            print ('false');
        return $this->newCommand; 

    }


    // Insert a row/s in a Database Table
    public function Insert( $query = "" , $params = [] ){
	
        try{
		
        $stmt = $this->executeStatement( $query , $params );
            $stmt->close();
		
            return $this->connection->insert_id;
		
        }catch(Exception $e){
            throw New Exception( $e->getMessage() );
        }
	
        return false;
	
    }

    // Select a row/s in a Database Table
    public function Select( $query = "" , $params = [] ){
	
        try{
		
            $stmt = $this->executeStatement( $query , $params );
		
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);				
            $stmt->close();
		
            return $result;
		
        }catch(Exception $e){
            throw New Exception( $e->getMessage() );
        }
	
        return false;
    }

    // Update a row/s in a Database Table
    public function Update( $query = "" , $params = [] ){
        try{
		
            $this->executeStatement( $query , $params )->close();
		
        }catch(Exception $e){
            throw New Exception( $e->getMessage() );
        }
	
        return false;
    }		

    // Remove a row/s in a Database Table
    public function Remove( $query = "" , $params = [] ){
        try{
		
            $this->executeStatement( $query , $params )->close();
		
        }catch(Exception $e){
            throw New Exception( $e->getMessage() );
        }
	
        return false;
    }		

    // execute statement
    private function executeStatement( $query = "" , $params = [] ){
	
        try{
		
            $stmt = $this->connection->prepare( $query );
		
            if($stmt === false) {
                throw New Exception("Unable to do prepared statement: " . $query);
            }
		
            if( $params ){
                call_user_func_array(array($stmt, 'bind_param'), $params );				
            }
		
            $stmt->execute();
		
            return $stmt;
		
        }catch(Exception $e){
            throw New Exception( $e->getMessage() );
        }
	
    }

    // Select a row/s in a Database Table
    public function TableChoosed( $query = "" , $params = [], $tableName = '' ){
        try{
            $this->tableName = $tableName;
            
            $stmt = $this->executeStatement( $query , $params );

            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);           
            $stmt->close();
    
    

            return $result;

        }catch(Exception $e){
            throw New Exception( $e->getMessage() );
        }

        return false;

    }
    

    public function getTableName($tableName)
    {

        $this->tableName = $tableName;

    }


    public function fieldDesc($tableName)
    {
        $this->tableName = $tableName;
        // select for column name
//        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME= " >
//        $sql = "DESCRIBE " . $this->tablenName . "WHERE TABLE_NAME= " ;
        $sql = " DESCRIBE " . $this->tableName ;
        print ($tableName);
        print ($sql);


        $this->fieldDesc = $this->Select($sql);
        //print_r ($this->fieldDesc);
        return $this->fieldDesc;

    }

    public function fieldNames($tableName)
    {
        $this->tableName = $tableName;
        $this->fieldDesc = $this->fieldDesc($tableName);
        print ('<br>fieldDesc<br>');
        print_r ($this->fieldDesc); 
        // select for column name
//        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABL>
//        $sql = "DESCRIBE " . $this->tablenName . "WHERE TABLE_NAME= " ;
        $this->fieldNames = array();
        foreach ($this->fieldDesc as $field)
        {
            //print ($field); 
            print ($field['Field']);
            $this->fieldNames[] = $field['Field'];

/*
            foreach ($field as $key => $value)
            {
                print ('<br>in second loop<br>');
                //$this->fieldNames[] = $field['ID'];
                print ($key);  
                print ('<br>in second loop \after key<br>');

                print ($value);  
                $this->fieldNames[] = $value;         
 
            }
*/
        }
        print ('<br>fieldNames []<br>');
        //print_r ($this->fieldNames);
        


        return $this->fieldNames;

    }

		
}


//echo ' <br>end DatabaseClass<br>';
?>

