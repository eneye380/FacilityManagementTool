

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
class Facilitator {

    //put your code here
    private $fac_id;
    private $fac_name;
    private $fac_email;
    private $fac_password;
    private $registration_date;
    private $connection_to_db;
    private static $idnum = 10000;

    function __construct() {
        
    }

    function upload($id, $email, $name, $password) {

        $sql = "SELECT * FROM Facilitator WHERE fac_email='$this->fac_email'";
        $result = $this->connection_to_db->query($sql);

        if ($result->num_rows > 0) {

            echo '<br><h3>Email Exist, please register using a different email</h3>';
            echo "<br> <a href='../index.php#register'>Click to go back</a>";
        } else {
            $date = date("Y-m-d h:i:s");
            $sql = "INSERT INTO Facilitator (fac_id,fac_email,fac_name,fac_password,registration_date) 
		VALUES ('$id','$name','$email',SHA1('$password'),'$date')";

            if ($this->connection_to_db->query($sql) === TRUE) {
                echo "<br>registered succesfully";
                echo "<br> <a href='../index.php#login'>Login here</a>";
            } else {
                echo "<br>Error: " . $sql . "<br>" . $this->connection_to_db->error;
            }
        }



        $this->connection_to_db->close();
    }

    function createConnectionToDb() {
    	echo " 8 \n";
        $conn = new DatabaseConnection();
        echo " 9 \n";
        $this->connection_to_db = $conn->getConnectionToDB();
        echo " 10 \n";
    }

    function generateFac_id() {
        $digit = null;
        if (!$this->doesEmailExist()) {
            $fac_ids = $this->retrieveFac_ids();
            if (!is_bool($fac_ids)) {
                $digit = $this->extractNum($fac_ids);
                $max = max($digit);
                //print_r($digit);
                $max++;
                $id = "F" . $max;
                $this->setFac_id($id);
                //echo '<br>FID: ' . $this->getFac_id();
            } else {
                Facilitator::$idnum++;
                $id = "F" . Facilitator::$idnum;
                $this->setFac_id($id);
                //echo '<br>first FID: ' . $this->getFac_id();
            }
        } else {
            //echo '<br>email already exist';
        }
    }

    function doesEmailExist() {
        if ($this->fac_email != "") {
            if ($this->connection_to_db->connect_error) {
                die("Connection failed: " . $this->connection_to_db->connect_error);
            }
            $sql = "SELECT * FROM Facilitator WHERE fac_email='$this->fac_email'";
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

    function retrieveFac_ids() {
        if ($this->connection_to_db->connect_error) {
            die("Connection failed: " . $this->connection_to_db->connect_error);
        }
        $sql = "SELECT fac_id FROM Facilitator";
        $result = $this->connection_to_db->query($sql);
        $arr = [];
        //$arr[] = "F1000";
        //$arr[] = "F1001";
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row["fac_id"];
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
            $num[] = (int) (explode("F", $value)[1]);
        }
        return $num;
    }

    function setFac_id($id) {
        $this->fac_id = $id;
    }

    function setFac_name($na) {
        $this->fac_name = $na;
    }

    function setFac_email($em) {
        $this->fac_email = $em;
    }

    function setFac_password($ps) {
        $this->fac_password = $ps;
    }

    function setRegistration_date($rd) {
        $this->registration_date = $rd;
    }

    function setConnectionToDb($co) {
        $this->connection_to_db = $co;
    }

    function getFac_id() {
        return $this->fac_id;
    }

    function getFac_name() {
        return $this->fac_name;
    }

    function getFac_email() {
        return $this->fac_email;
    }

    function getFac_password() {
        return $this->fac_password;
    }

    function getRegistration_date() {
        return $this->registration_date;
    }

    function getConnectionToDb() {
        return $this->connection_to_db;
    }

}
