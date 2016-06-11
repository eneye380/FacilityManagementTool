
<?php
include '../FMT.Model/mysqli_connection.php';
session_start();

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
            
            $_SESSION['login']='yes';
            //$_SESSION = mysql_fetch_array($result, MYSQL_ASSOC);
            //$url = "/FMT.View/buildingform.php";
            //header('Location: ' . $url);
            //exit();
            
                
                //$url = "/FMT.Admin/pages/adminfm.php";
                //$url = "/FMT.View/buildingform.php";
                //die(header('Location: ' . $url));
            
                
                die("ok");
            
        } else {
            
                
                die("notok");
            
        }
    } else {
        
    }
}
