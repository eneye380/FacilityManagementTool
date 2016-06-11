
<?php
include '../FMT.Model/mysqli_connection.php';
session_start();
$from = "";
if (!isset($_SESSION['from_page'])) {
    $_SESSION['from_page'] = "2";
} else {
    $from = $_SESSION['from_page'];
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error = [];
    if (!empty($_POST['username'])) {
        $u = mysqli_real_escape_string($conn, trim($_POST['username']));
    } else {
        $u = FALSE;
        $error[] = "you forgot to enter your username";
    }
    if (!empty($_POST['password'])) {
        $p = mysqli_real_escape_string($conn, trim($_POST['password']));
    } else {
        $p = FALSE;
        $error[] = "you forgot to enter your password";
    }
    if ($u && $p) {//no problem
        $sql = "SELECT fac_id, fac_name, fac_email FROM Facilitator WHERE fac_email='$u' and fac_password=SHA('$p')";
        $result = $conn->query($sql);
        if ($result->num_rows === 1) {
            session_start();
            $row = $result->fetch_assoc();
            $_SESSION['facid'] = $row['fac_id'];
            $_SESSION['facname'] = $row['fac_name'];
            $_SESSION['facemail'] = $row['fac_email'];
            //$_SESSION = mysql_fetch_array($result, MYSQL_ASSOC);
            //$url = "/FMT.View/buildingform.php";
            //header('Location: ' . $url);
            //exit();
            if ($from === "1") {
                
                $url = "/FMT.Admin/pages/adminfm.php";
                //$url = "/FMT.View/buildingform.php";
                die(header('Location: ' . $url));
            } else if ($from === "2") {
                
                die("ok");
            }
        } else {
            if ($from === "1") {
                $error[] = "email or password incorrect, please try again or register";
                
            } else if ($from === "2") {
                
                die("notok");
            }
        }
    } else {
        
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <?php require("./FMT.View.Header/lib.php"); ?>
        <link href="../FMT.View/css/style.css" rel="stylesheet">
        <script type="text/javascript" src="../FMT.Controller/login.js"></script>
         <script type=text/javascript src="../FMT.Controller/facility.js"></script>
    </head>
    <body>
        <?php include("./FMT.View.Header/header_nav_1.php"); ?>

        <div class="container">
            <div class="row">
                <div class="col-lg-8 form-group-sm" style='border-color: white'>
                    <form class="form-horizontal" role='form' style='padding: 100px' method="post" onsubmit="return entry(this)">
                        <h3 class='text-center' style='color: #122b40;font-weight: bold'>Login</h3>
                        <h5 class='text-center' style='color: #122b40;font-weight: bold'>Manage Facilities</h5>
                        <?php
                        if (!empty($error)) {
                            $_SESSION['from_page'] = "2";
                            $from = $_SESSION['from_page'];
                            foreach ($error as $value) {
                                echo('<p class="error text-center" id="hint" style="color:red">' . $value . '</p>');
                            }
                            $error = [];
                        }
                        ?>
                        <p class="error text-center" id="hint" style="color:red"></p>
                        <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" placeholder="Email Address" name="fusername" id="email" 
                                          value="<?php if(isset($_POST['username'])){echo $_POST['username'];}?>" required data-validation-required-message="Please enter your email address.">
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" id="password" name="fpassword"
                                           value="<?php if(isset($_POST['password'])){echo $_POST['password'];}?>" required data-validation-required-message="Please enter your phone number.">
                                </div>
                            </div>
                        <div class="text-center" style='margin-top: 20px'>
                            <button type="submit" class="btn btn-primary" name='submit' id='submit'  style="background-color: #122b40;border-color: #122b40">Login</button>
                            <span id=""></span>
                            <?php //$_SESSION['from_page'] = "2";?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
