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
    $sql = '';
    $id = '';
    if (!empty($_POST['choice'])) {
        if ($_POST['choice'] === 'f') {
            if (!empty($_POST['id'])) {
                $id = mysqli_real_escape_string($conn, trim($_POST['id']));
            }
            $sql = "DELETE FROM Facilitator WHERE fac_id = '$id'";
        }
        if ($_POST['choice'] === 'b') {
            if (!empty($_POST['id'])) {
                $id = mysqli_real_escape_string($conn, trim($_POST['id']));
            }
            $sql = "DELETE FROM Building WHERE bui_id = '$id'";
        }
        if ($_POST['choice'] === 'c') {
            if (!empty($_POST['id'])) {
                $id = mysqli_real_escape_string($conn, trim($_POST['id']));
            }
            $sql = "DELETE FROM Customer WHERE cus_id = '$id'";
        }
        if ($_POST['choice'] === 'l') {
            if (!empty($_POST['id'])) {
                $id = mysqli_real_escape_string($conn, trim($_POST['id']));
            }
            $sql = "DELETE FROM Lease WHERE lse_id = '$id'";
        }
        if ($_POST['choice'] === 'm') {
            if (!empty($_POST['id'])) {
                $id = mysqli_real_escape_string($conn, trim($_POST['id']));
            }
            $sql = "DELETE FROM Complaint WHERE com_id = '$id'";
        }
    }


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
        <style>
            section{
                margin: 75px;
            }
            table{
                
            }
            </style>
    </head>
    <body style="background: #428bca">
        <?php include("./FMT.View.Header/header_1.php"); ?>
        <?php
        // put your code here
        ?>
        <div class="container">
            <section id='facilitator'>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Facilitator's Registered</h2>
                        <hr class="star-primary">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <table class="table table-striped" style="margin: auto">
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
                                        echo "<input type='hidden' name='choice' value='f'>";
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
                </div>
            </section>
            <section id='building'>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Buildings Registered</h2>
                        <hr class="star-primary">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <h2></h2>
                        <table class="table table-bordered" style="margin: auto">
                            <thead>
                            <th>BID</th>
                            <th>Building Name</th>
                            <th>Type</th>
                            <th>Address</th>
                            <th>Description</th>
                            <th>Registration Date</th>
                            <th>FID</th>
                            <th></th>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM Building";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<form method='post' action='adminview.php'>";
                                        echo "<input type='hidden' name='id' value={$row["bui_id"]}>";
                                        echo "<input type='hidden' name='choice' value='b'>";
                                        echo '<tr>'
                                        . '<td>' . $row["bui_id"] . '</td>'
                                        . '<td>' . $row["bui_name"] . '</td>'
                                        . '<td>' . $row["bui_type"] . '</td>'
                                        . '<td>' . $row["bui_address"] . '</td>'
                                        . '<td>' . $row["bui_description"] . '</td>'
                                        . '<td>' . $row["registration_date"] . '</td>'
                                        . '<td>' . $row["fac_id"] . '</td>'
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
                </div>
            </section>
            <section id='customer'>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Customers Registered</h2>
                        <hr class="star-primary">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <table class="table table-bordered" style="margin: auto">
                            <thead>
                            <th>BID</th>
                            <th>Customer Name</th>
                            <th>Type</th>
                            <th>Email</th>
                            <th>Detail</th>
                            <th>Registration Date</th>
                            <th>FID</th>
                            <th></th>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM Customer";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<form method='post' action='adminview.php'>";
                                        echo "<input type='hidden' name='id' value={$row["cus_id"]}>";
                                        echo "<input type='hidden' name='choice' value='c'>";
                                        echo '<tr>'
                                        . '<td>' . $row["cus_id"] . '</td>'
                                        . '<td>' . $row["cus_name"] . '</td>'
                                        . '<td>' . $row["cus_type"] . '</td>'
                                        . '<td>' . $row["cus_email"] . '</td>'
                                        . '<td>' . $row["cus_detail"] . '</td>'
                                        . '<td>' . $row["registration_date"] . '</td>'
                                        . '<td>' . $row["fac_id"] . '</td>'
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
                </div>
            </section>
            <section id='lease'>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Lease Information</h2>
                        <hr class="star-primary">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <table class="table table-bordered" style="margin: auto">
                            <thead>
                            <th>LID</th>
                            <th>BID</th>
                            <th>CID</th>
                            <th>Lease start</th>
                            <th>Lease end</th>
                            <th>FID</th>
                            <th></th>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM Lease";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<form method='post' action='adminview.php'>";
                                        echo "<input type='hidden' name='id' value={$row["lse_id"]}>";
                                        echo "<input type='hidden' name='choice' value='l'>";
                                        echo '<tr>'
                                        . '<td>' . $row["lse_id"] . '</td>'
                                        . '<td>' . $row["bui_id"] . '</td>'
                                        . '<td>' . $row["cus_id"] . '</td>'
                                        . '<td>' . $row["lease_start"] . '</td>'
                                        . '<td>' . $row["lease_end"] . '</td>'
                                        . '<td>' . $row["fac_id"] . '</td>'
                                        . "<td><button type='submit' class='btn  btn-primary' name='submit' id='submit'  style='background-color: #5cb85c;border-color: #5cb85c'>delete</button></td>"
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
                </div>
            </section>
            <section id='complaint'>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Complaint Messages</h2>
                        <hr class="star-primary">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <table class="table table-bordered" style="margin: auto">
                            <thead>
                            <th>CoID</th>
                            <th>CID</th>
                            <th>Category</th>
                            <th>Messgae</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>BID</th>
                            <th>FID</th>
                            <th></th>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM Complaint";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<form method='post' action='adminview.php'>";
                                        echo "<input type='hidden' name='id' value={$row["com_id"]}>";
                                        echo "<input type='hidden' name='choice' value='m'>";
                                        echo '<tr>'
                                        . '<td>' . $row["com_id"] . '</td>'
                                        . '<td>' . $row["cus_id"] . '</td>'
                                        . '<td>' . $row["com_category"] . '</td>'
                                        . '<td>' . $row["com_message"] . '</td>'
                                        . '<td>' . $row["com_date"] . '</td>'
                                        . '<td>' . $row["com_status"] . '</td>'
                                        . '<td>' . $row["bui_id"] . '</td>'
                                        . '<td>' . $row["fac_id"] . '</td>'
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
                </div>
            </section>
        </div>
        <div id="footer" class="text-center text-danger" style="padding: 100px; margin-top: 50px;background: #005983">
            <p>Admin management</p>
        </div>
        
        <script src='adminview.js' type='text/javascript'></script>
    </body>
</html>
