

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
class Complaint {

    //put your code here
    private $com_id;
    private $cus_id;
    private $com_category;
    private $com_message;
    private $com_date;
    private $com_status;
    private $fac_id;
    private $connection_to_db;
    private static $idnum = 10000;

    function __construct() {
        
    }

    function upload($coid, $cid, $cat, $msg,$sta,$fid,$bid) {
        
        
            $date = date("Y-m-d h:i:s");
            $sql = "INSERT INTO Complaint (com_id,cus_id,com_category,com_message,com_date,com_status,fac_id,bui_id) 
		VALUES ('$coid','$cid','$cat','$msg','$date','$sta','$fid','$bid')";

            if ($this->connection_to_db->query($sql) === TRUE) {
                echo "<br>registered succesfully";
                echo "<br> <a href='../FMT.Admin/pages/customerfm.php#complaint'>Go Back</a>";
            } else {
                echo "<br>Error: " . $sql . "<br>" . $this->connection_to_db->error;
            }
        



        $this->connection_to_db->close();
    }

    function createConnectionToDb() {
        $conn = new DatabaseConnection();
        $this->connection_to_db = $conn->getConnectionToDB();
    }

    function generateCom_id() {
        
        $digit = null;
        
            $com_ids = $this->retrieveCom_ids();
            if (!is_bool($com_ids)) {
                $digit = $this->extractNum($com_ids);
                $max = max($digit);
                //print_r($digit);
                $max++;
                $id = "M" . $max;
                $this->setCom_id($id);
                //echo '<br>FID: ' . $this->getFac_id();
            } else {
                Complaint::$idnum++;
                $id = "M" . Complaint::$idnum;
                $this->setCom_id($id);
                //echo '<br>first FID: ' . $this->getFac_id();
            }
        
    }

    function retrieveCom_ids() {
        if ($this->connection_to_db->connect_error) {
            die("Connection failed: " . $this->connection_to_db->connect_error);
        }
        $sql = "SELECT com_id FROM Complaint";
        $result = $this->connection_to_db->query($sql);
        $arr = [];
        //$arr[] = "F1000";
        //$arr[] = "F1001";
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $arr[] = $row["com_id"];
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
            $num[] = (int) (explode("M", $value)[1]);
        }
        return $num;
    }

    function setCom_id($id) {
        $this->com_id = $id;
    }

    function setCus_id($id) {
        $this->cus_id = $id;
    }

    function setCom_category($ca) {
        $this->com_category = $ca;
    }
    
    function setCom_message($me) {
        $this->com_message = $me;
    }
      function setCom_date($da) {
        $this->com_date = $da;
    }
    
    function setCom_status($st) {
        $this->com_status = $st;
    }
    
    function setFac_id($id) {
        $this->fac_id = $id;
    }

    function setConnectionToDb($co) {
        $this->connection_to_db = $co;
    }

    function getCom_id() {
        return $this->com_id;
    }
    
    function getCus_id() {
        return $this->cus_id;
    }

    function getCom_category() {
        return $this->com_category;
    }

    function getCom_message() {
        return $this->com_message;
    }

    function getCom_date() {
        return $this->com_date;
    }
    function getCom_status() {
        return $this->com_status;
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
