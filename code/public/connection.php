<?php

class dbConfig {     

    public $connect;

    function __construct() {
        $this->connect = new mysqli("db", "root", "mypassword", "myDB");
        
        if ($connect->connect_error) {
            die ('Ошибка подключения ('  . $connect->connect_errno . ')'
                . $connect->connect_error);
        }    
    }    
}

class User extends dbConfig {

    public function getRecords() {
        $sql = "SELECT * FROM USER";
        $result = mysqli_query($this->connect, $sql) or die ("Err: " . mysqli_error($this->connect));
        return $result;
    }

    public function getSignleRec($id) {
        $sql = "SELECT * FROM USER WHERE id = " .$id;
        $result = mysqli_query($this->connect, $sql) or die ("Err: " . mysqli_error($this->connect));
        return $result;
    }

    public function create(){
        $sql = "INSERT INTO USER (firstname, lastname, email, permission) values ('".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['email']."', '".$_POST['permission']."')";
        $result = mysqli_query($this->connect, $sql) or die ("Err: " . mysqli_error($this->connect));  
    }
    
    public function update ($id) {
        $sql = "UPDATE USER SET firstname = '".$_POST['firstname']."', lastname = '".$_POST['lastname']."', email = '".$_POST['email']."', permission = '".$_POST['permission']."' WHERE id = " .$id;
        $result = mysqli_query($this->connect, $sql) or die ("Err: " . mysqli_error($this->connect));   
    }

    public function delete($id) {
        $sql = "DELETE FROM USER WHERE id = " .$id;
        $result = mysqli_query($this->connect, $sql) or die ("Err: " . mysqli_error($this->connect));
    }

}

?>
