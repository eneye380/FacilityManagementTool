<?php
include '../FMT.Model/mysqli_connection.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['id'])) {
        $id = mysqli_real_escape_string($conn, trim($_POST['id']));
    }

    $sql = "DELETE FROM Facilitator WHERE fac_id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:yellow'>deleted</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>admin</title>
        <?php require("./FMT.View.Header/lib.php"); ?>
    </head>
    <body>
        <?php include("./FMT.View.Header/header_1.php"); ?>
        <?php
        // put your code here
        ?>
        <div class="container">

            <table class="table" style="margin: auto">
                <thead>
                <th>FID</th>
                <th>Agency Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Registration Date</th>
                <th></th>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM Facilitator";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<form method='post' action='adminview.php'>";
                            echo "<input type='hidden' name='id' value={$row["fac_id"]}>";
                            echo '<tr>'
                            . '<td>' . $row["fac_id"] . '</td>'
                            . '<td>' . $row["fac_name"] . '</td>'
                            . '<td>' . $row["fac_email"] . '</td>'
                            . '<td>' . $row["fac_password"] . '</td>'
                            . '<td>' . $row["registration_date"] . '</td>'
                            . "<td><button type='submit' class='btn btn-primary' name='submit' id='submit'  style='background-color: #5cb85c;border-color: #5cb85c'>delete</button></td>"
                            . '</tr>';
                            echo '</form>';
                        }
                    } else {
                        echo '<tr><td>empty record</td><td></td><td></td><td></td><td></td</tr>';
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </body>
</html>
