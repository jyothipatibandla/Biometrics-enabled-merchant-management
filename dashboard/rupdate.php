<?php

session_start();
$bno = $_SESSION['bno'];

if(isset($_POST['review'])){
    $r = 'r';
}
else{
    $r = 'ur';
}

$conn = new mysqli ("localhost", "root", "", "bio");

if($r == 'r'){
    $sql = "UPDATE status SET user='r' where bno='$bno'";
    $conn->query($sql);

    $l = "fcbill.php";
    $m = "Update successful";
    $t = "success";
    pop($l,$m,$t);
}

else{
    $l = "fcbill.php";
    $m = "No change";
    $t = "error";
    pop($l,$m,$t);
}



function pop ($l,$m,$t){
    echo '<script src="../login/js/jquery-3.6.0.min.js"></script>';
    echo '<script src="../login/js/sweetalert2.all.min.js"></script>';
    echo '<script type="text/javascript">';
    echo "setTimeout(function () { Swal.fire('','$m','$t').then(function (result) {if (result.value) {window.location = '$l';}})";
    echo '},100);</script>';
}

?>