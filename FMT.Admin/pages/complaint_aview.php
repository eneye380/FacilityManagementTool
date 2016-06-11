<?php
include '../../FMT.Model/mysqli_connection.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
$id = 'all';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (!empty($_POST['idparam'])) {
        $id = mysqli_real_escape_string($conn, trim($_POST['idparam']));
    }
    //die ($id);
}
?>



<html>
    <head>
        <meta charset="UTF-8">
        <title> Complaint Message</title>
<?php include '../pages/top_lib.php'; ?>
    </head>
    <body>
<?php
// put your code here
include '../pages/navigation.php';
?>


        <section>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-4">
                        <form class="form-horizontal" action="../../FMT.Admin/pages/complaint_aview.php" role="form" method="post" onselect="show(this)">
                            <div class="row page-1 control-group">
                                <div class="form-group col-xs-10 floating-label-form-group controls">
                                    <label for="type">Customer ID</label>
                                    <select class="form-control" name='idparam' id="type" required data-validation-required-message="Please select customer id.">
                                        <option class="p_level" value='all' onclick="show(this)">All</option>
<?php
$s = "SELECT * FROM Customer WHERE fac_id = '$fid'";
$r = $conn->query($s);
if ($r->num_rows > 0) {
    // output data of each row
    while ($row = $r->fetch_assoc()) {

        echo '<option class="p_level" value="' . $row['cus_id'] . '" onclick="show(this)">' . $row['cus_id'] . '</option>';
    }
} else {
    echo '<option class="p_level" value="">empty</option>';
}
?>
                                    </select>
                                    <p class="help-block text-danger" id="option"></p>
                                </div>
                                <div class="col-xs-2" style="position: relative;top:24px"><button class="btn btn-group-sm" type="submit">view</button></div>
                            </div>
                            
                        </form>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-12">
                        <h2>Customer Complaints</h2>
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
                            <tbody id="body">
<?php
//echo 'hmmm: s'.$id;
    if ($id == 'all') {
        
        $sql = "SELECT * FROM Complaint WHERE fac_id = '$fid'";
    } else {
       
        $sql = "SELECT * FROM Complaint WHERE fac_id = '$fid' and cus_id = '$id'";
    }

//$sql = "SELECT * FROM Complaint WHERE cus_id = '$cid'";
//$sql = "SELECT * FROM Complaint WHERE fac_id = '$fid'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo ("<!--form method='post' action='adminview.php'-->"
        . "<input type='hidden' name='id' value={$row["cus_id"]}>" 
        . '<tr>' 
        . '<td>' . $row["com_id"] . '</td>'
        . '<td>' . $row["cus_id"] . '</td>'
        . '<td>' . $row["com_category"] . '</td>'
        . '<td>' . $row["com_message"] . '</td>'
        . '<td>' . $row["com_date"] . '</td>'
        . '<td>' . $row["com_status"] . '</td>'
        . '<td>' . $row["bui_id"] . '</td>'
        . '<td>' . $row["fac_id"] . '</td>'
        . "<td><button type='submit' class='btn hidden btn-primary' name='submit' id='submit'  style='background-color: #5cb85c;border-color: #5cb85c'>delete</button></td>"
        . '</tr>'
        . '<!--/form-->');
    }
} else {
    echo ('<tr><td>No message</td><td></td><td></td><td></td><td></td</tr>');
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
        <script src="../../FMT.Admin/js/aview.js" type="text/javascript"></script>
    </body>
</html>
