<?php
session_start();
$id = strtoupper($_POST['id']);
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

if (!empty($id) || !empty($pass1) || !empty($pass2))
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bio";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
    $SELECT = "SELECT id From cregister Where id = ?";
    $ID_FIND = "SELECT id From users Where id = ?";
    $INSERT = "INSERT Into cregister (id, pass1, pass2)values(?,?,?)";
//Prepare statement
     $stmt = $conn->prepare($ID_FIND);
     $stmt->bind_param("s", $id);
     $stmt->execute();
     $stmt->bind_result($id);
     $stmt->store_result();
     $unum = $stmt->num_rows;
     $stmt->close();

     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $id);
     $stmt->execute();
     $stmt->bind_result($id);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     $stmt->close();

     //checking id
     if ($unum == 1){
         if($rnum == 0){
            if ($pass1==$pass2) {
                $_SESSION['id'] = $id;
                $pass1=$pass2=md5($pass1);
                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("sss", $id, $pass1, $pass2);
                $stmt->execute();
                $m = "Account created";
                $l = "../html/fregister.html";
                $t = "success";
                pop($l,$m,$t);
            }
            else {
                $m = "Password mismatch";
                $l = "../html/cindex.html";
                $t = "error";
                pop($l,$m,$t);
            }
        }
    }

    if ($rnum!=0) {
        $m = "Account exists already";
        $l = "../html/cindex.html";
        $t = "error";
        pop($l,$m,$t);
    }
    if ($unum == 0) {
        $m = "ID does not exist";
        $l = "../html/cindex.html";
        $t = "error";
        pop($l,$m,$t);
    }
}
}


function pop ($l,$m,$t){
  echo '<script src="../js/jquery-3.6.0.min.js"></script>';
  echo '<script src="../js/sweetalert2.all.min.js"></script>';
  echo '<script type="text/javascript">';
  echo "setTimeout(function () { Swal.fire('','$m','$t').then(function (result) {if (result.value) {window.location = '$l';}})";
  echo '},100);</script>';
}

?>