<?php

$user = $_POST['user'];
$pass  = $_POST['pass'];

if (empty($user) || empty($pass) )
{
    die('Username or password missing');
}

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

    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $stmt->bind_result($user);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    $stmt->close();

    if ($rnum==1) {
        $result = mysqli_query($conn,"SELECT * FROM register where email='" . $_POST['user'] . "'");
        $row = mysqli_fetch_assoc($result);
        $dbpass = $row['pass1'];
        $pass = md5($pass);
        if($pass == $dbpass){
            header('Location: ../../dashboard/merchant/index.html');
        }
        else{
            $m = "Incorrect Password";
            $l = "../html/index.html";
            $t = "error";
            pop($l,$m,$t);
        }
    }
    if($rnum!=1){
        $m = "User does not exist";
        $l = "../html/index.html";
        $t = "error";
        pop($l,$m,$t);
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