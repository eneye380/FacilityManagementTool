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
        <title> Complaint Message</title>
        <?php include '../pages/top_lib.php'; ?>
    </head>
    <body>
        <?php
        // put your code here
        include '../pages/navigation_c.php';
        ?>


        <section>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <h2>My Complaints</h2>
                        <table class="table table-bordered" style="margin: auto">
                            <thead>
                            <th>CoID</th>
                            <th>CID</th>
                            <th>Category</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>BID</th>
                            <th>FID</th>
                            <th></th>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM Complaint WHERE cus_id = '$cid'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<!--form method='post' action='adminview.php'-->";
                                        echo "<input type='hidden' name='id' value={$row["cus_id"]}>";
                                        echo '<tr>'
                                        . '<td>' . $row["com_id"] . '</td>'
                                        . '<td>' . $row["cus_id"] . '</td>'
                                        . '<td>' . $row["com_category"] . '</td>'
                                        . '<td>' . $row["com_message"] . '</td>'
                                        . '<td>' . $row["com_date"] . '</td>'
                                        . '<td>' . $row["com_status"] . '</td>'
                                        . '<td>' . $row["bui_id"] . '</td>'
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
        </section>



        <?php include '../pages/footer.php'; ?>
        <?php include '../pages/bottom_lib.php'; ?>
    </body>
</html>
