<?php
session_start();
$name = $_POST['name'];
$email  = $_POST['email'];
$mno = $_POST['mno'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

if (!empty($name) || !empty($email) || !empty($mno) || !empty($pass1) || !empty($pass2))
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
  $SELECT = "SELECT email From register Where email = ? Limit 1";
  $SELECTM = "SELECT mno From register Where mno = ? Limit 1";
  $INSERT = "INSERT Into register (name , email ,mno, pass1, pass2)values(?,?,?,?,?)";
//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     $stmt->close();

     $stmt = $conn->prepare($SELECTM);
     $stmt->bind_param("s", $mno);
     $stmt->execute();
     $stmt->bind_result($mno);
     $stmt->store_result();
     $rnumm = $stmt->num_rows;

     //checking username
      if ($rnum==0 && $rnumm==0) {
        if ($pass1==$pass2) {
          $pass1=$pass2=md5($pass1);
          $stmt->close();
          $stmt = $conn->prepare($INSERT);
          $stmt->bind_param("sssss", $name , $email ,$mno, $pass1, $pass2);
          $stmt->execute();
          $m = "Account created";
          $l = "../html/index.html";
          $t = "success";
          pop($l,$m,$t);
        }
        else {
          $m = "Password mismatch";
          $l = "../html/index.html";
          $t = "error";
          pop($l,$m,$t);
        }
      }
      if ($rnum!=0) {
        $m = "Exail exists already";
        $l = "../html/index.html";
        $t = "error";
        pop($l,$m,$t);
    }
    if ($rnumm!=0) {
        $m = "Mobile exists already";
        $l = "../html/index.html";
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