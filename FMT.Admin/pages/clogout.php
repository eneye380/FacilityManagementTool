<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        session_destroy();
        include '../pages/clogin.php';
        //session_start();
        //$_SESSION['from_page'] = '2';
        $url = "../pages/clogin.php";
        die(header('Location: ' . $url));
        ?>
        // put your code here
        ?>
    </body>
</html>
