

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include './DatabaseConnection.php';

use DatabaseConnection;

/**
 * Description of Facilitator
 *
 * @author eneye380
 */
class Customer {

    //put your code here
    private $cus_id;
    private $cus_name;
    private $cus_email;
    private $cus_type;
    private $cus_detail;
    private $registration_date;
    private $fac_id;
    private $connection_to_db;
    private static $idnum = 10000;

    function __construct() {
        
    }

    function upload($id, $name, $email, $type, $detail,$fid) {
        
        $sql = "SELECT * FROM Customer WHERE cus_email='$this->cus_email'";
        $result = $this->connection_to_db->query($sql);

        if ($result->num_rows > 0) {

            echo '<br><h3>Email Exist, please register using a different email</h3>';
            echo "<br> <a href='../FMT.Admin/pages/add_customer.php'>Click to go back</a>";
        } else {
            $date = date("Y-m-d h:i:s");
            $sql = "INSERT INTO Customer (cus_id,cus_name,cus_email,cus_type,cus_detail,registration_date,fac_id) 
		VALUES ('$id','$name','$email','$type','$detail','$date','$fid')";

            if ($this->connection_to_db->query($sql) === TRUE) {
                echo "<br>registered succesfully";
                echo "<br> <a href='../FMT.Admin/pages/add_customer.php'>Go Back</a>";
            } else {
                echo "<br>Error: " . $sql . "<br>" . $this->connection_to_db->error;
            }
        }



        $this->connection_to_db->close();
    }

    function createConnectionToDb() {
        $conn = new DatabaseConnection();
        $this->connection_to_db = $conn->getConnectionToDB();
    }

    function generateCus_id() {
        
        $digit = null;
        if (!$this->doesEmailExist()) {
            $cus_ids = $this->retrieveCus_ids();
            if (!is_bool($cus_ids)) {
                $digit = $this->extractNum($cus_ids);
                $max = max($digit);
                //print_r($digit);
                $max++;
                $id = "C" . $max;
                $this->setCus_id($id);
                //echo '<br>FID: ' . $this->getFac_id();
            } else {
                Customer::$idnum++;
                $id = "C" . Customer::$idnum;
                $this->setCus_id($id);
                //echo '<br>first FID: ' . $this->getFac_id();
            }
        } else {
            //echo '<br>email already exist';
        }
    }

    function doesEmailExist() {
        if ($this->cus_email != "") {
            if ($this->connection_to_db->connect_error) {
                die("Connection failed: " . $this->connection_to_db->connect_error);
            }
            $sql = "SELECT * FROM Customer WHERE cus_email='$this->cus_email'";
            $result = $this->connection_to_db->query($sql);

            if ($result->num_rows == 0) {
                //echo '<br>email does not exist';
                return false;
            } else {
                //echo '<br>email exists';
                return true;
            }

            $this->connection_to_db->close();
        }
    }

    function retrieveCus_ids() {
        if ($this->connection_to_db->connect_error) {
            die("Connection failed: " . $this->connection_to_db->connect_error);
        }
        $sql = "SELECT cus_id FROM Customer";
        $result = $this->connection_to_db->query($sql);
        $arr = [];
        //$arr[] = "F1000";
        //$arr[] = "F1001";
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row["cus_id"];
            }
            return $arr;
        } else {
            //echo "<br>none existence of record<br>";
            return false;
        }
        $this->connection_to_db->close();
    }

    function extractNum(Array $arr) {
        $num = [];
        foreach ($arr as $value) {
            $num[] = (int) (explode("C", $value)[1]);
        }
        return $num;
    }

    function setCus_id($id) {
        $this->cus_id = $id;
    }

    function setCus_name($na) {
        $this->cus_name = $na;
    }

    function setCus_email($em) {
        $this->cus_email = $em;
    }

    function setCus_type($ty) {
        $this->cus_type = $ty;
    }
      function setCus_detail($de) {
        $this->cus_detail = $de;
    }
    function setFac_id($id) {
        $this->fac_id = $id;
    }
    function setRegistration_date($rd) {
        $this->registration_date = $rd;
    }

    function setConnectionToDb($co) {
        $this->connection_to_db = $co;
    }

    function getCus_id() {
        return $this->cus_id;
    }

    function getCus_name() {
        return $this->cus_name;
    }

    function getCus_email() {
        return $this->cus_email;
    }

    function getCus_type() {
        return $this->cus_type;
    }
    function getCus_detail() {
        return $this->cus_detail;
    }
    function getFac_id() {
        return $this->fac_id;
    }

    function getRegistration_date() {
        return $this->registration_date;
    }

    function getConnectionToDb() {
        return $this->connection_to_db;
    }

}
