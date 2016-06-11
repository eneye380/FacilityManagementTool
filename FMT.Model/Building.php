

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include './DatabaseConnection.php';
//include '../FMT.Admin/pages/add_building.php';
use DatabaseConnection;

/**
 * Description of Facilitator
 *
 * @author eneye380
 */
class Building {

    //put your code here
    private $bui_id;
    private $bui_name;
    private $bui_type;
    private $bui_address;
    private $bui_description;
    private $fac_id;
    private $registration_date;
    private $connection_to_db;
    private static $idnum = 10000;

    function __construct() {
        
    }

    function upload($id, $name, $type, $addr, $desc, $fid) {

        $sql = "SELECT * FROM Building WHERE bui_name='$this->bui_name'";
        $result = $this->connection_to_db->query($sql);

        if ($result->num_rows > 0) {

            echo '<br><h3>Name Exist, please register using a different building name</h3>';
            echo "<br> <a href='../FMT.Admin/pages/add_building.php'>Click to go back</a>";
        } else {
            $date = date("Y-m-d h:i:s");
            $sql = "INSERT INTO Building (bui_id,bui_name,bui_type,bui_address,bui_description,fac_id,registration_date) 
		VALUES ('$id','$name','$type','$addr','$desc','$fid','$date')";

            if ($this->connection_to_db->query($sql) === TRUE) {
                echo "<br>registered succesfully";
                echo "<br> <a href='../FMT.Admin/pages/add_building.php'>Go back</a>";
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

    function generateBui_id() {
        $digit = null;
        if (!$this->doesNameExist()) {
            $bui_ids = $this->retrieveBui_ids();
            if (!is_bool($bui_ids)) {
                $digit = $this->extractNum($bui_ids);
                $max = max($digit);
                //print_r($digit);
                $max++;
                $id = "B" . $max;
                $this->setBui_id($id);
                //echo '<br>FID: ' . $this->getFac_id();
            } else {
                Building::$idnum++;
                $id = "B" . Building::$idnum;
                $this->setBui_id($id);
                //echo '<br>first FID: ' . $this->getFac_id();
            }
        } else {
            //echo '<br>email already exist';
        }
    }

    function doesNameExist() {
        if ($this->bui_name != "") {
            if ($this->connection_to_db->connect_error) {
                die("Connection failed: " . $this->connection_to_db->connect_error);
            }
            $sql = "SELECT * FROM Building WHERE bui_name='$this->bui_name'";
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

    function retrieveBui_ids() {
        if ($this->connection_to_db->connect_error) {
            die("Connection failed: " . $this->connection_to_db->connect_error);
        }
        $sql = "SELECT bui_id FROM Building";
        $result = $this->connection_to_db->query($sql);
        $arr = [];
        //$arr[] = "F1000";
        //$arr[] = "F1001";
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row["bui_id"];
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
            $num[] = (int) (explode("B", $value)[1]);
        }
        return $num;
    }

    function setBui_id($id) {
        $this->bui_id = $id;
    }

    function setBui_name($na) {
        $this->bui_name = $na;
    }

    function setBui_type($ty) {
        $this->bui_type = $ty;
    }

    function setBui_address($ad) {
        $this->bui_address = $ad;
    }
    function setBui_description($de) {
        $this->bui_description = $de;
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

    function getBui_id() {
        return $this->bui_id;
    }

    function getBui_name() {
        return $this->bui_name;
    }

    function getBui_type() {
        return $this->bui_type;
    }

    function getBui_address() {
        return $this->bui_address;
    }
    
    function getBui_description() {
        return $this->bui_description;
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
