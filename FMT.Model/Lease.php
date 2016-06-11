

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
class Lease {

    //put your code here
    private $lse_id;
    private $bui_id;
    private $cus_id;
    private $fac_id;
    private $lease_start;
    private $lease_end;
    private $connection_to_db;
    private static $idnum = 10000;

    function __construct() {
        
    }

    function upload($lid, $bid, $cid, $ls, $le,$fid) {
        
        $sql = "SELECT * FROM Lease WHERE cus_id='$this->cus_id' AND bui_id='$this->bui_id'";
        $result = $this->connection_to_db->query($sql);

        if ($result->num_rows > 0) {

            echo '<br><h3>Lease between Customer and Building Exist, please register using a different email</h3>';
            echo "<br> <a href='../FMT.Admin/pages/lease.php'>Click to go back</a>";
        } else {
            $sql = "INSERT INTO Lease (lse_id,bui_id,cus_id,lease_start,lease_end,fac_id) 
		VALUES ('$lid','$bid','$cid','$ls','$le','$fid')";

            if ($this->connection_to_db->query($sql) === TRUE) {
                echo "<br>registered succesfully";
                echo "<br> <a href='../FMT.Admin/pages/lease.php'>Go Back</a>";
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

    function generateLse_id() {
        
        $digit = null;
        
            $lse_ids = $this->retrieveLse_ids();
            if (!is_bool($lse_ids)) {
                $digit = $this->extractNum($lse_ids);
                $max = max($digit);
                //print_r($digit);
                $max++;
                $id = "L" . $max;
                $this->setLse_id($id);
                //echo '<br>FID: ' . $this->getFac_id();
            } else {
                Lease::$idnum++;
                $id = "L" . Lease::$idnum;
                $this->setLse_id($id);
                //echo '<br>first FID: ' . $this->getFac_id();
            }
        
    }

    function retrieveLse_ids() {
        if ($this->connection_to_db->connect_error) {
            die("Connection failed: " . $this->connection_to_db->connect_error);
        }
        $sql = "SELECT lse_id FROM Lease";
        $result = $this->connection_to_db->query($sql);
        $arr = [];
        //$arr[] = "F1000";
        //$arr[] = "F1001";
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row["lse_id"];
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
            $num[] = (int) (explode("L", $value)[1]);
        }
        return $num;
    }

    function setLse_id($id) {
        $this->lse_id = $id;
    }
    function setBui_id($id) {
        $this->bui_id = $id;
    }
    function setCus_id($id) {
        $this->cus_id = $id;
    }
    function setFac_id($id) {
        $this->fac_id = $id;
    }
    
    function setLease_start($ls) {
        $this->lease_start = $ls;
    }
    function setLease_end($le) {
        $this->lease_end = $le;
    }

    function setConnectionToDb($co) {
        $this->connection_to_db = $co;
    }

    function getLse_id() {
        return $this->lse_id;
    }
    function getCus_id() {
        return $this->cus_id;
    }
    function getBui_id() {
        return $this->bui_id;
    }
    function getFac_id() {
        return $this->fac_id;
    }
    function getLease_start() {
        return $this->lease_start;
    }
    function getLease_end() {
        return $this->lease_end;
    }
    
    function getConnectionToDb() {
        return $this->connection_to_db;
    }

}
