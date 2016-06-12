<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Database
 *
 * @author eneye380
 */
class Database {

    //put your code here
    private $connection;
    private $localhost;
    private $username;
    private $password;
    private $database;
    
    function __construct($l, $u, $p, $db) {
        $this->localhost = $l;
        $this->username = $u;
        $this->password = $p;
        $this->database = $db;
        echo "Object Created\n\n";
    }

    function setLocahost($l) {
        $this->localhost = $l;
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

    function getLocahost() {
        return $this->localhost;
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

    function createConnection() {
        // Checking db connection
        if ($this->database == "") {
            $this->connection = new mysqli($this->localhost, $this->username, $this->password);
        } else {
            $this->connection = new mysqli($this->localhost, $this->username, $this->password, $this->database);
        }
    }

    function createDatabase($string) {
        echo 'dd';
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
        // Create database
        if ($this->connection->query($string) === TRUE) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . $this->connection->error;
        }
        //closing db connection
        $this->connection->close();
    }

    function createTable($string) {
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
        // Create table

        if ($this->connection->query($string) === TRUE) {
            echo "Table created successfully";
        } else {
            echo "Error creating table: " . $this->connection->error;
        }
        //closing db connection
        $this->connection->close();
    }

}

//$localhost = "localhost";
//$username = "root";
//$password = "";
//$db = "facilityMdb";

 $localhost = "us-cdbr-azure-central-a.cloudapp.net";
     $username = "bab6f319dbd8e0";
     $password = "77132848";
     $db = "aeadb";
//$db1 = "facilityMdb";
//$sql1 = "CREATE DATABASE " . $db1 . "";
/***$sql = "CREATE TABLE Reviews (
	username VARCHAR(80),
	placeID VARCHAR(40),
	comment VARCHAR(255),	
	time TIMESTAMP,
	PRIMARY KEY(username,placeID),
	FOREIGN KEY(username) REFERENCES Users(username),
	FOREIGN KEY(placeID) REFERENCES Restaurants(placeID)
)";*/
$facilitator = "CREATE TABLE Facilitator (
	fac_id VARCHAR(10),
	fac_name VARCHAR(80),
	fac_email VARCHAR(50),
        fac_password CHAR (40),
        registration_date DATETIME,
	PRIMARY KEY(fac_id)
)";
$building = "CREATE TABLE Building (
	bui_id VARCHAR(10),
	bui_name VARCHAR(80),
	bui_type VARCHAR(30),
        bui_address VARCHAR(255),
	bui_description TEXT,
        registration_date DATETIME,
        fac_id VARCHAR(10),
	PRIMARY KEY(bui_id),
	FOREIGN KEY(fac_id) REFERENCES Facilitator(fac_id)
)";
$customer = "CREATE TABLE Customer (
	cus_id VARCHAR(10),
	cus_name VARCHAR(80),
        cus_email VARCHAR(50),
	cus_type VARCHAR(30),
        cus_detail TEXT,
	registration_date DATETIME,
        fac_id VARCHAR(10),
	PRIMARY KEY(cus_id),
        FOREIGN KEY(fac_id) REFERENCES Facilitator(fac_id)
)";
$lease = "CREATE TABLE Lease (
	lse_id VARCHAR(10),
	bui_id VARCHAR(10),
	cus_id VARCHAR(10),
        lease_start DATE,
        lease_end DATE,
        fac_id VARCHAR(10),
	PRIMARY KEY(lse_id,bui_id,cus_id),
	FOREIGN KEY(bui_id) REFERENCES Building(bui_id),
	FOREIGN KEY(cus_id) REFERENCES Customer(cus_id),
        FOREIGN KEY(fac_id) REFERENCES Facilitator(fac_id)
)";
$complaint = "CREATE TABLE Complaint (
	com_id VARCHAR(10),
	cus_id VARCHAR(10),
	com_category VARCHAR(30),
        com_message TEXT,
	com_date DATETIME,
        com_status VARCHAR(15),
        fac_id VARCHAR(10),
        bui_id VARCHAR(10),
	PRIMARY KEY(com_id,cus_id),
	FOREIGN KEY(cus_id) REFERENCES Customer(cus_id),
        FOREIGN KEY(fac_id) REFERENCES Facilitator(fac_id),
        FOREIGN KEY(bui_id) REFERENCES Building(bui_id)
)";
$views = "CREATE TABLE Views (
	vie_id VARCHAR(10),
	com_id VARCHAR(10),
        cus_id VARCHAR(10),
        fac_id VARCHAR(10),
	view_date DATETIME,
	PRIMARY KEY(vie_id,com_id,cus_id,fac_id),
	FOREIGN KEY(com_id) REFERENCES Complaint(com_id),
        FOREIGN KEY(cus_id) REFERENCES Customer(cus_id),
        FOREIGN KEY(fac_id) REFERENCES Facilitator(fac_id)
)";
$asset = "CREATE TABLE Asset (
	ass_id VARCHAR(10),
	bui_id VARCHAR(10),
	asset VARCHAR(100),
        fac_id VARCHAR(10),
	PRIMARY KEY(ass_id,bui_id),
	FOREIGN KEY(bui_id) REFERENCES Building(bui_id),
        FOREIGN KEY(fac_id) REFERENCES Facilitator(fac_id)
)";
$drop = "DROP TABLE Complaint";
$objd = new Database($localhost, $username, $password, $db);
//echo $objd->getLocahost();
$objd->createConnection();
//$objd->createDatabase($sql1);
//$objd->createTable($drop);

//$objd->createTable($facilitator);
//$objd->createTable($building);
//$objd->createTable($customer);
//$objd->createTable($lease);
//$objd->createTable($complaint);
$objd->createTable($views);
//$objd->createTable($asset);
//echo eneye;

