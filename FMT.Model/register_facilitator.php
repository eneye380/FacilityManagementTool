
<?php
include './mysqli_connection.php';
include './Facilitator.php';

use Facilitator;

$facilitator = new Facilitator;
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

            if (empty($_POST['fname'])) {
                $errors[] = 'You forgot to enter your agency name.';
            } else {
                $n = mysqli_real_escape_string($conn, trim($_POST['fname']));
            }
            // Check for a agency email
            if (empty($_POST['femail'])) {
                $errors[] = 'You forgot to enter your agency email.';
            } else {
                $e = mysqli_real_escape_string($conn, trim($_POST['femail']));
            }
            // Check for a password and match it against the confirmed password
            if (!empty($_POST['fpassword1'])) {
                if ($_POST['fpassword1'] != $_POST['fpassword2']) {
                    $errors[] = 'Your two passwords did not match.';
                } else {
                    $p = mysqli_real_escape_string($conn, trim($_POST['fpassword1']));
                }
            } else {
                $errors[] = 'You forgot to enter your password.';
            }
            if (empty($errors)) { // If it runs
                $facilitator->createConnectionToDb();
                $facilitator->setFac_email($e);
                $facilitator->generateFac_id();
                $id = $facilitator->getFac_id();
                $facilitator->upload($id, $n, $e, $p);

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
