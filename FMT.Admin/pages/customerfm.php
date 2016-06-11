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
        <title>Customer Console</title>
        <?php include '../pages/top_lib.php'; ?>
    </head>
    <body>
        <div id="wrapper">
            <?php
            // put your code here
            include '../pages/navigation_c.php';
            ?>
            <div id="page-wrapper">
                <section id="dashboard">
                    <div class="row panel">
                        <div class="col-xs-6">
                            <div class="panel panel-heading">
                                <h2 class="panel-title">Facilitator Details</h2>
                            </div>
                            <div class="panel panel-body">
                                <h3 class="panel-primary">ID: <?php echo '' . $fid; ?></h3>
                                <h3 class="panel-primary">Name: <?php echo '' . $fna; ?></h3>
                                <h3 class="panel-primary">Email: <?php echo '' . $fem; ?></h3>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="panel panel-heading">
                                <h2 class="panel-title">Customer Details</h2>
                            </div>
                            <div class="panel panel-body">
                                <h3 class="panel-primary">ID: <?php echo '' . $cid; ?></h3>
                                <h3 class="panel-primary">Name: <?php echo '' . $cna; ?></h3>
                                <h3 class="panel-primary">Email: <?php echo '' . $cem; ?></h3>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="complaint" style="background: #a2aec7">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2>Complaint</h2>
                            <hr class="star-primary">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                            <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                            <!--form name="sentMessage" id="contactForm" novalidate-->
                            <form class="form-horizontal" action="../../FMT.Model/register_complaint.php" style='padding: 50px' role="form" method="post" onsubmit="return click_submit(this)">
                                <div class="row page-1 control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label for="type">Building ID</label>
                                        <select class="form-control" name='bid' id="type" required data-validation-required-message="Please select customer id.">
                                            <option class="p_level" value='' selected="true">select building id</option>
                                            <?php
                                            $sq = "SELECT * FROM Lease WHERE cus_id = '$cid'";
                                            $resul = $conn->query($sq);
                                            if ($resul->num_rows > 0) {
                                                // output data of each row
                                                while ($row = $resul->fetch_assoc()) {

                                                    echo '<option class="p_level" value="' . $row['bui_id'] . '">' . $row['bui_id'] . '</option>';
                                                }
                                            } else {
                                                echo '<option class="p_level" value="">empty</option>';
                                            }
                                            ?>
                                        </select>
                                        <p class="help-block text-danger" id="type-hint"></p>
                                    </div>
                                    <input type='hidden' name='facid' value='<?php echo $fid; ?>'>
                                </div>
                                <div class="row page-1 control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label for="type">Complaint Category</label>
                                        <select class="form-control" name='ccat' id="type">
                                            <option class="p_level" value='' selected="true">select complaint category</option>
                                            <a href="#"><option class="p_level" value='Repair'>Repair</option></a>
                                            <option class="p_level" value='Cleaning'>Cleaning</option>
                                            <option class="p_level" value='Renovation'>Renovation</option>
                                            <option class="p_level" value='Other'>Other</option>
                                        </select>
                                        <p class="help-block text-danger" id="type-hint"></p>
                                    </div>
                                </div>
                                <div class="row page-1 control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">

<!--input type='date' value='<?php echo (date("Y-m-d h:i:s")) ?>'-->
                                    </div>
                                </div>
                                <div class="row page-1 control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Complaint Message</label>
                                        <textarea rows="5" class="form-control" placeholder="Complaint Message" name="cmessage" id="detail" required data-validation-required-message="Please enter a description."></textarea>
                                        <p class="help-block text-danger" id="description-hint"></p>
                                    </div>
                                </div>
                                <br>
                                <div id="success"></div>
                                <div class="row page-1">
                                    <div class="form-group col-xs-12">
                                        <button type="submit" class="btn btn-success btn-lg pull-right" name='submit' id='submit'  style="background-color: #245269;border-color: #245269">Submit</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </section>
                <section id="lease">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2>My Lease Information</h2>
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
                                    $sql = "SELECT * FROM Lease WHERE cus_id = '$cid'";
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
                </section>
            </div>
        </div>

        <?php include '../pages/footer.php'; ?>
        <?php include '../pages/bottom_lib.php'; ?>
    </body>
</html>
