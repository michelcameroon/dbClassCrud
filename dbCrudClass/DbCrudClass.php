<?php  
echo "begin outside class";
/*
class DB
{
    public $pdo;
    //echo "inside class";
    public function __construct($db, $username = NULL, $password = NULL, $host = '127.0.0.1', $port = 3306, $options = [])
    {
        print ('in constructor');
        $default_options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        ];
        $options = array_replace($default_options, $options);
        $dsn = "mysql:host=$host;dbname=$db;port=$port;charset=utf8mb4";

        try {
            $this->pdo = new \PDO($dsn, $username, $password, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    public function run($sql, $args = NULL)
    {
        if (!$args)
        {
            return $this->pdo->query($sql);
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($args);
        print ('end of run');
        return $stmt;
    }
}

*/

    

//class DbClass extends PDO
class DbClass
{
    //public var tableName = 'users';
    //public $tableName = 'users';
    //echo "comes begin class";
    //protected string $dbName; 
    protected string $dbHost; 
    protected string $dbUser; 
    protected string $dbPasswd; 

    protected $dsn;
    public $pdo; 
    //print ('in var class'); 
    protected string $dbName; 

    //public $tableName = '';
    //protected $tableFieldNames = array(); 
    
//    public function __construct(string $dbName = null, string $dbHost = null, string $dbUser = null, string $dbPasswd = null) 
    public function __construct($dbName, $dbHost, $dbUser, $dbPasswd) 
    {
        echo "comes in __construct";
        /*
        //$this->dbName = $dbName;
        //$this->dbHost = $dbHost;
        //$this->dbUser = $dbUseer;
        //$this->dbPasswd = $dbPasswd;
        */
        //$this->dsn = "mysql:dbname=$this->dbName; host=$dbHost";
        //$this->dsn = "mysql:dbname='qrcode1'; host='localhost'";
        $this->dsn = "mysql:dbname=qrcode1; host=localhost";
        echo "comes 2 in __construct";

        //$options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=> PDO::FETCH_ASS>);

        //private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);


        //$this->dsn = "mysql:host=$host;dbname=$db;port=$port;charset=utf8mb4";
        //$this->dsn = "mysql:host=$host;dbname=$db;port=$port;charset=utf8mb4";
        //$this->dsn = "mysql:host=localhost;dbname=$db;port=$port;charset=utf8mb4";
        print ('test pdo');
        try 
        {
            /*
            print ('1 test pdo');
            print ($this->dsn);
            print ('2 test pdo');
            print ($this->dbUser);
            print ('3 test pdo');
            print ($this->dbPasswd);
            */
            //$this->pdo = new \PDO($this->dsn, $this->dbUser, $this->dbPasswd, $options);
            //$this->pdo = new PDO($this->dsn, $this->dbUser, $this->dbPasswd, $options);
            //$this->pdo = new PDO($this->dsn, $this->dbUser, $this->dbPasswd);
            //$this->pdo = new \PDO($this->dsn, 'qrcode1', 'qrcode1');
            $this->pdo = new PDO($this->dsn, 'qrcode1', 'qrcode1');
            print ('pdo ok');
        } 
        catch (\PDOException $e) 
        {
            print ('in execption');
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }



    }


    public function listTables()
    {
        print ('begin listTaables');
//        $this->db = $this->open();

        $sql = 'SHOW TABLES';
        //if($this->is_connected)
        //<C3>{
        $query = $this->pdo->query($sql);
        return $query->fetchAll(PDO::FETCH_COLUMN);
        //}
        //return FALSE;
    }


    public function queryListAll($query)
    {
        //echo "begin listOne";
        //$stmt = $this->db->prepare('select * from users where id= ?');
        $stmt = $this->pdo->prepare($query);
//        $stmt->execute([$id]);
        $stmt->execute();

        $arrs = $stmt->fetchAll();

        //print ("arrs = ");
        //print_r($arrs);
        return $arrs;


    }

    


}





/*   
    public function Open()
    {
        try 
        {
            $dsn      = "mysql:dbname=qrcode1; host=localhost";
            //$dsn      = "mysql:dbname=$dbName; host=$host";
            $user     = "qrcode1";
            //$user     = $dbUser;
            $password = "qrcode1";
            //$password = $dbPwd";
 
            $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE                      => PDO::FETCH_ASS>
            );
 
 
 
            $this->db = new PDO($dsn, $user, $password, $options);

            return $this->db;
        } 
        catch (PDOException $e) 
        {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

*/ 
