<?php

$id = strtoupper($_POST['id']);
$pass  = $_POST['pass'];

if (empty($id) || empty($pass) )
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
    $SELECT = "SELECT id From cregister Where id = ? Limit 1";

    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->bind_result($id);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    $stmt->close();

    if ($rnum==1) {
        $result = mysqli_query($conn,"SELECT * FROM cregister where id='" . $_POST['id'] . "'");
        $row = mysqli_fetch_assoc($result);
        $dbpass = $row['pass1'];
        $pass = md5($pass);
        if($pass == $dbpass){
            header('Location: ../../dashboard/cindex.html');
        }
        else{
            $m = "Incorrect Password";
            $l = "../html/cindex.html";
            $t = "error";
            pop($l,$m,$t);
        }
    }
    if($rnum!=1){
        $m = "User does not exist";
        $l = "../html/cindex.html";
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