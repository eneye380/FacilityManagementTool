
<?php
session_start();
include './mysqli_connection.php';
include './Building.php';

use Building;

$building = new Building();
?>
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
// The link to the database is moved to the top of the PHP code.
        // This query INSERTs a record in the users table.
// Has the form been submitted?
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = array(); // Initialize an error array.
            // Check for a agency name:

            if (empty($_POST['bname'])) {
                $errors[] = 'You forgot to enter your building name.';
            } else {
                $n = mysqli_real_escape_string($conn, trim($_POST['bname']));
            }
            // Check for a agency email
            if (empty($_POST['btype'])) {
                $errors[] = 'You forgot to enter your building type.';
            } else {
                $t = mysqli_real_escape_string($conn, trim($_POST['btype']));
            }
            if (empty($_POST['baddress'])) {
                $errors[] = 'You forgot to enter your building address.';
            } else {
                $a = mysqli_real_escape_string($conn, trim($_POST['baddress']));
            }
            if (empty($_POST['bdesc'])) {
                $errors[] = 'You forgot to enter your building description.';
            } else {
                $d = mysqli_real_escape_string($conn, trim($_POST['bdesc']));
            }
            /**Check for a password and match it against the confirmed password
            if (!empty($_POST['fpassword1'])) {
                if ($_POST['fpassword1'] != $_POST['fpassword2']) {
                    $errors[] = 'Your two passwords did not match.';
                } else {
                    $p = mysqli_real_escape_string($conn, trim($_POST['fpassword1']));
                }
            } else {
                $errors[] = 'You forgot to enter your password.';
            }*/
            if (empty($errors)) { // If it runs
                $facid = $_SESSION['facid'];
                $building->createConnectionToDb();
                $building->setBui_name($n);
                $building->generateBui_id();
                $id = $building->getBui_id();
                $building->upload($id, $n, $t, $a, $d, $facid);

                $conn->close();
            } else { // Report the errors.
                echo '<h2>Error!</h2>
 <p class="error">The following error(s) occurred:<br>';
                foreach ($errors as $msg) { // Extract the errors from the array and echo them
                    echo " - $msg<br>\n";
                }
                echo '</p><h3>Please try again.</h3><p><br></p>';
            }// End of if (empty($errors))
        } // End of the main Submit conditional.
        ?>
    </body>
</html>
