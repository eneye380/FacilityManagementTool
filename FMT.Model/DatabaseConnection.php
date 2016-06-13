<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DatabaseConnection
 *
 * @author eneye380
 */
class DatabaseConnection {

    //put your code here
    //private $hostname = "localhost";
    //private $username = "root";
    //private $password = "";
    //private $database = "facilityMdb";
    
    private $hostname = "us-cdbr-azure-central-a.cloudapp.net";
    private $username = "bab6f319dbd8e0";
    private $password = "77132848";
    private $database = "aeadb";

    function __construct() {
        
    }

    function setLocahost($l) {
        $this->hostname = $l;
    }

    function setUsername($u) {
        $this->username = $u;
    }

    function setPassword($p) {
        $this->password = $p;
    }

    function setDatabase($db) {
        $this->database = $db;
    }

    function getLocalhost() {
        return $this->hostname;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getDatabase() {
        return $this->database;
    }

    function getConnection() {
        $conn = new mysqli($this->hostname, $this->username, $this->password);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            //echo '<br>created';
        }
        return $conn;
    }

    function getConnectionToDB() {
        
        $conn = new mysqli($this->hostname, $this->username, $this->password, $this->database);
        
        if ($conn->connect_error) {
            
            die("Connection failed: " . $conn->connect_error);
            
        } else {
            //echo '<br>created';
        
        }
        
        return $conn;
    }

}

//$s = new \database\DatabaseConnection();
//echo $s->getConnectionToDB();
