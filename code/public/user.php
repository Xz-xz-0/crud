<?php

    

    class Db {

        public $connect;

        function __construct() {
            $this->connect = new mysqli("db", "root", "mypassword", "myDB");
            
            if ($connect->connect_error) {
                die ('Ошибка подключения ('  . $connect->connect_errno . ')'
                    . $connect->connect_error);
            }    
        }  
        
        public function fetchAll() {
            $sql = "SELECT * FROM " . $this->_table;
            $result = mysqli_query($this->connect, $sql) or die ("Err: " . mysqli_error($this->connect));

            while ($row = mysqli_fetch_array($result)) {
                print_r($row) . "<br>";
            }
        }

        public function save() {
            if ($this->getId() != null)
            {
                $this->update();
            } else {
                $this->insert();
            }
        }

        public function insert() {
            $sql = "INSERT INTO " .$this->_table . " ";
            $sql .= " (" . implode(', ', $this->_cols) . ") VALUES ('";

            $vals = array();
            foreach ($this->_cols as $col) {
                $method = 'get' . ucfirst($col);
                $vals[] = $this->$method();
            }
            echo $sql .=implode("','", $vals) . "')";
            $result = mysqli_query($this->connect, $sql) or die ("Err: " . mysqli_error($this->connect));
        }
        
    }

    class User extends Db {

        protected $_table = 'USER';
        protected $_cols = array('firstname', 'lastname', 'email', 'permission');

        private $_id;
        private $_firstname;
        private $_lastname;
        private $_email;
        private $_permission;

        public function setId ($_id) {
            $this->_id = $_id;
        }

        public function getId() {
            return $this->_id;
        }

        public function setFirstname ($_firstname) {
            $this->_firstname = $_firstname;
        }

        public function getFirstname () {
            return $this->_firstname;
        }

        public function setLastname ($_lastname) {
            $this->_lastname = $_lastname;
        }

        public function getLastname () {
            return $this->_lastname;
        }

        public function setEmail ($_email) {
            $this->_email = $_email;
        }

        public function getEmail () {
            return $this->_email;
        }

        public function setPermission ($_permission) {
            $this->_permission = $_permission;
        }

        public function getPermission () {
            return $this->_permission;
        }

    }

    $user = new User();
    $user->setFirstname('t');
    $user->setLastname('e') ;
    $user->setEmail('s');
    $user->setPermission('t');
    $user->save();

    $user->fetchAll();
?>