<?php

$conn = mysqli_connect("localhost", "root", "", "bio");
$sid = 1;
$sql1 = "UPDATE finger SET verify='-' WHERE temp='$sid'";
$conn->query($sql1);
$sql1 = "UPDATE finger SET error='-' WHERE temp='$sid'";
$conn->query($sql1);

ini_set('MAX_EXECUTION_TIME', '-1');
session_start();
$id = $_SESSION['id'];

$conn = mysqli_connect("localhost", "root", "", "bio");

$sql = "UPDATE finger SET id='$id' where temp=1";
$conn->query($sql);

putenv('PYTHONPATH=');
echo shell_exec("C:/Users/Arvind/AppData/Local/Programs/Python/Python37/python.exe ../finger/fpr.py");

$sid = 1;
$sql = "SELECT * FROM finger where temp='$sid'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$verify = $row['verify'];
$error = $row['error'];

if($verify == 'true'){
    #resetdb();
    if(strlen($id)==4){
        $_SESSION['id'] = $id;
        $m = "Fingerprint authenticated";
        $l = "../../dashboard/merchant/index.php";
        $t = "success";
        pop($l,$m,$t);
    }
    else{
        $_SESSION['id'] = $id;
        $m = "Fingerprint authenticated";
        $l = "../../dashboard/user/cindex.php";
        $t = "success";
        pop($l,$m,$t);
    }
}
elseif($verify == 'false'){
    if($error == 'Invalid ID'){
        #resetdb();
        $m = $error;
        $l = "../html/finlogin.html";
        $t = "error";
        pop($l,$m,$t);
    }
    elseif($error == 'Fingerprint image not properly uploaded'){
        #resetdb();
        $m = $error;
        $l = "../html/finlogin.html";
        $t = "error";
        pop($l,$m,$t); 
    }
    else{
        #resetdb();
        $m = "Fingerprint mismatch";
        $l = "../html/finlogin.html";
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