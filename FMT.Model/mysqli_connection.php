<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// This file provides the information for accessing the database.and connecting 
//to MySQL. It also sets the language coding to utf-8
// First we define the constants: #1
//DEFINE ('db_host', 'localhost');
//DEFINE ('db_pass', '');
//DEFINE ('db_user', 'root');
//DEFINE ('db_name', 'facilityMdb');

DEFINE ('db_host', 'us-cdbr-azure-central-a.cloudapp.net');
DEFINE ('db_pass', '77132848');
DEFINE ('db_user', 'bab6f319dbd8e0');
DEFINE ('db_name', 'aeadb');
// Next we assign the database connection to a variable that we will call $conn: #2
$conn = new mysqli (db_host, db_user, db_pass, db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
 } 
// Finally, we set the language encoding.as utf-8
mysqli_set_charset($conn, 'utf8');
