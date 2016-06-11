<?php
include '../../FMT.Model/mysqli_connection.php';
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
        <title>Manage Customer</title>
        <?php include '../pages/top_lib.php'; ?>
    </head>
    <body>
        <div id="wrapper">
            <?php
            // put your code here
            include '../pages/navigation.php';
            ?>
            <div id="page-wrapper">
                <div class="row">
                    
                    <div class="col-xs-12">
                        <h2>Registered Customers</h2>
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
                                $sql = "SELECT * FROM Customer WHERE fac_id = '$fid'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<!--form method='post' action='adminview.php'-->";
                                        echo "<input type='hidden' name='id' value={$row["cus_id"]}>";
                                        echo '<tr>'
                                        . '<td>' . $row["cus_id"] . '</td>'
                                        . '<td>' . $row["cus_name"] . '</td>'
                                        . '<td>' . $row["cus_type"] . '</td>'
                                        . '<td>' . $row["cus_email"] . '</td>'
                                        . '<td>' . $row["cus_detail"] . '</td>'
                                        . '<td>' . $row["registration_date"] . '</td>'
                                        . '<td>' . $row["fac_id"] . '</td>'
                                        . "<td><button type='submit' class='btn hidden btn-primary' name='submit' id='submit'  style='background-color: #5cb85c;border-color: #5cb85c'>delete</button></td>"
                                        . '</tr>';
                                        echo '<!--/form-->';
                                    }
                                } else {
                                    echo '<tr><td>empty record</td><td></td><td></td><td></td><td></td</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>

            </div>
        </div>

        <?php include '../pages/footer.php'; ?>
        <?php include '../pages/bottom_lib.php'; ?>
    </body>
</html>
