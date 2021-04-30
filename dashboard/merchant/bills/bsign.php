<?php
ini_set('MAX_EXECUTION_TIME', '-1');
session_start();
$fname = $_SESSION['fname'];

putenv('PYTHONPATH=');
echo shell_exec("C:/Users/Arvind/AppData/Local/Programs/Python/Python37/python.exe ../../../sign/sr.py");

$conn = mysqli_connect("localhost", "root", "", "bio");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    
$sid = 1;
$sql = "SELECT * FROM sverify where sid='$sid'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$sign = $row['verify'];
$error = $row['error'];

if($sign == 'true'){
    #resetdb();
    header("Location: bgenerate.php");
}
elseif($sign == 'false'){
    if($error == 'Invalid ID'){
        #resetdb();
        $m = $error;
        $l = "sverify.php";
        $t = "error";
        pop($l,$m,$t);
    }
    elseif($error == 'Signature image not uploaded properly'){
        #resetdb();
        $m = $error;
        $l = "sverify.php";
        $t = "error";
        pop($l,$m,$t); 
    }
    else{
        #resetdb();
        $m = "Signature mismatch";
        $l = "sverify.php";
        $t = "error";
        pop($l,$m,$t); 
    }
}

function pop ($l,$m,$t){
    echo '<script src="../../js/jquery-3.6.0.min.js"></script>';
    echo '<script src="../../js/sweetalert2.all.min.js"></script>';
    echo '<script type="text/javascript">';
    echo "setTimeout(function () { Swal.fire('','$m','$t').then(function (result) {if (result.value) {window.location = '$l';}})";
    echo '},100);</script>';
}

function resetdb(){
    $conn = mysqli_connect("localhost", "root", "", "bio");
    $sid = 1;
    $sql1 = "UPDATE sverify SET verify='-' WHERE sid='$sid'";
    $conn->query($sql1);
    $sql1 = "UPDATE sverify SET error='-' WHERE sid='$sid'";
    $conn->query($sql1);
}

?>