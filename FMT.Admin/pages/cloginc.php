<?php

session_start();
include '../../FMT.Model/mysqli_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = [];
    if (!empty($_POST['username'])) {
        $e = mysqli_real_escape_string($conn, trim($_POST['username']));
        //die($e);
    } else {
        $e = FALSE;
        $error[] = "you forgot to enter your email";
    }
    if (!empty($_POST['password'])) {
        $p = mysqli_real_escape_string($conn, trim($_POST['password']));
    } else {
        $p = FALSE;
        $error[] = "you forgot to enter your password";
    }
    if ($e && $p) {//no problem
        $sql = "SELECT cus_id, cus_name, cus_email, fac_id FROM Customer WHERE cus_email='$e' and fac_id='$p'";
        $result = $conn->query($sql);
        if ($result->num_rows === 1) {

            $row = $result->fetch_assoc();

            $_SESSION['cusid'] = $row['cus_id'];
            $_SESSION['cusname'] = $row['cus_name'];
            $_SESSION['cusemail'] = $row['cus_email'];
            //$_SESSION = mysql_fetch_array($result, MYSQL_ASSOC);
            //$url = "/FMT.View/buildingform.php";
            //header('Location: ' . $url);
            //exit();
            $sq = "SELECT fac_id, fac_name, fac_email FROM Facilitator WHERE fac_id='$p'";
            $res = $conn->query($sq);
            if ($res->num_rows === 1) {
                
                $ro = $res->fetch_assoc();
                
                $_SESSION['facid'] = $ro['fac_id'];
                $_SESSION['facname'] = $ro['fac_name'];
                $_SESSION['facemail'] = $ro['fac_email'];
            }

            die("ok");
        } else {


            die("notok");
        }
    } else {
        
    }
}
