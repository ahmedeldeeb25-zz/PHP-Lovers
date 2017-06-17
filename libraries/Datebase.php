<?php


class DB{
    
    public $host = DB_host;
    public $username= DB_user;
    public $password = DB_pass;
    public $db_name = DB_name;

    
    public $link;
    public $error;
    
    
    ///   Class Constructor
    public function __construct(){
       
        $this->connect();
    }
    
    // Connect function
    private function connect(){
      $this->link = new mysqli($this->host,$this->username,$this->password,$this->db_name);
    
       if(!$this->link){
         $this->error = "connection Failed : ".$this->link->connect_error;
           return false;
       } 
    }
    
    /// Select function
    
    public function select($query){
        $result= $this->link->query($query) or die($this->link->error.__LINE__);
        if($result->num_rows >0){
         return $result;
        }
            else
                return false;
        
    }
    
    // Insert function
    
    public function insert($query){
        
        $insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
        
        if($insert_row){
            header("Location: index.php?msg=".urlencode("Record Added"));
            exit();
        }else{
            die("Error : (".$this->link->errno.')'.$this->link->error);
        }
    }
    
     // Update function
    
    public function update($query){
        
        $update = $this->link->query($query) or die($this->link->error.__LINE__);
        
        if($update){
            header("Location: index.php?msg=".urlencode("Record updated"));
            exit();
        }else{
            die("Error : (".$this->link->errno.')'.$this->link->error);
        }
    }
    
     // Delete function
    
    public function delete($query){
        
        $delete = $this->link->query($query) or die($this->link->error.__LINE__);
        
        if($delete){
            header("Location: index.php?msg=".urlencode("Record Deleted"));
            exit();
        }else{
            die("Error : (".$this->link->errno.')'.$this->link->error);
        }
    }
}
?>