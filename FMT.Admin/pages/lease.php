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
        <title>Add New Building</title>
        <?php include '../pages/top_lib.php'; ?>

        <script src="../js/customer.js" type="text/javascript"></script>

        <style>            

        </style>
    </head>
    <body>
        <?php
        // put your code here
        include '../pages/navigation.php';
        ?>

        <section id="register">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Lease Registration</h2>
                        <hr class="star-primary">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-2">
                        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                        <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                        <!--form name="sentMessage" id="contactForm" novalidate-->
                        <form class="form-horizontal" action="../../FMT.Model/add_lease.php" style='padding: 50px' role="form" method="post" onsubmit="return click_submit(this)">
                            <div class="row page-1 control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label for="type">Customer ID</label>
                                    <select class="form-control" name='cid' id="type" required data-validation-required-message="Please select customer id.">
                                        <option class="p_level" value='' selected="true">select customer id</option>
                                        <?php
                                        $sql = "SELECT * FROM Customer WHERE fac_id = '$fid'";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while ($row = $result->fetch_assoc()) {

                                                echo '<option class="p_level" value="' . $row['cus_id'] . '">' . $row['cus_id'] . '</option>';
                                            }
                                        } else {
                                            echo '<option class="p_level" value="">empty</option>';
                                        }
                                        ?>
                                    </select>
                                    <p class="help-block text-danger" id="type-hint"></p>
                                </div>
                            </div>
                            <div class="row page-1 control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label for="type">Building ID</label>
                                    <select class="form-control" name='bid' id="type" required data-validation-required-message="Please select customer id.">
                                        <option class="p_level" value='' selected="true">select building id</option>
                                        <?php
                                        $sql = "SELECT * FROM Building WHERE fac_id = '$fid'";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            // output data of each row
                                            while ($row = $result->fetch_assoc()) {

                                                echo '<option class="p_level" value="' . $row['bui_id'] . '">' . $row['bui_id'] . '</option>';
                                            }
                                        } else {
                                            echo '<option class="p_level" value="">empty</option>';
                                        }
                                        ?>
                                    </select>
                                    <p class="help-block text-danger" id="type-hint"></p>
                                </div>
                            </div>
                            <div class="row page-1 control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Lease Start Date</label><span> <i>yyyy-mm-dd</i></span>
                                    <input type="date" class="form-control" placeholder="Lease Start Date" name="lstart" id="email" 
                                           value="<?php
                                        if (isset($_POST['lstart'])) {
                                            echo $_POST['lstart'];
                                        }
                                        ?>" required data-validation-required-message="Please enter lease start date.">
                                    <p class="help-block text-danger" id="address-hint"></p>
                                </div>
                            </div>
                            <div class="row page-1 control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Lease End Date</label><span> <i>yyyy-mm-dd</i></span>
                                    <input type="date" class="form-control" placeholder="Lease End Date" name="lend" id="email" 
                                           value="<?php
                                           if (isset($_POST['lend'])) {
                                               echo $_POST['lend'];
                                           }
                                        ?>" required data-validation-required-message="Please enter lease end date.">
                                    <p class="help-block text-danger" id="address-hint"></p>
                                </div>
                            </div>
                            <br>
                            <div id="success"></div>
                            <div class="row page-1">
                                <div class="form-group col-xs-12">
                                    <button type="submit" class="btn btn-success pull-right" name='submit' id='submit'  style="background-color: #245269;border-color: #245269">Add</button>
                                </div>
                            </div>

                        </form>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <h2>Lease Information</h2>
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
                                $sql = "SELECT * FROM Lease WHERE fac_id = '$fid'";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<!--form method='post' action='adminview.php'-->";
                                        echo "<input type='hidden' name='id' value={$row["cus_id"]}>";
                                        echo '<tr>'
                                        . '<td>' . $row["lse_id"] . '</td>'
                                        . '<td>' . $row["bui_id"] . '</td>'
                                        . '<td>' . $row["cus_id"] . '</td>'
                                        . '<td>' . $row["lease_start"] . '</td>'
                                        . '<td>' . $row["lease_end"] . '</td>'
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
