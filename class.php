<?php

class dbconn 
{

    private $dbhost = "localhost",
            $dbuser = "root",
            $dbpass = "",
            $dbname = "db_assignment_sys";
    private $link;

    public function conn_open() 
    {


        $this -> link = mysqli_connect($this -> dbhost, $this-> dbuser, $this-> dbpass, $this-> dbname);
        

        if (!$this ->link) 
        {
            print 'This RAn';
            die(mysql_errno());
        } 
        else 
        {
        
            //echo "<br>---------------------<br>Connected to DB<br>---------------------<br>";
            return ($this -> link);
        }
    }
        
    public function conn_close() 
    {
  
        if (mysqli_close($this -> link))
        {
            //echo "<br>---------------------<br>Connection Disconnected!<br>---------------------<br>";
        }
        
        else
        {
            echo mysqli_connect_errno();
        }
        
    }
        
}

class login
{
    public function chk_id()
    {

    }
}


?>