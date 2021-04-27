<?php

session_start();

$bill = "";
if(isset($_POST['bill'])){
    $bno = $_POST['bill'];
    $_SESSION['bno'] = $bno;
    header('Location: ../invoice/fbill.php');
}
else{
    $m = "Select a bill";
    $l = "bstatus1.php";
    $t = "error";
    pop($l,$m,$t);
}

function pop ($l,$m,$t){
    echo '<script src="../../js/jquery-3.6.0.min.js"></script>';
    echo '<script src="../../js/sweetalert2.all.min.js"></script>';
    echo '<script type="text/javascript">';
    echo "setTimeout(function () { Swal.fire('','$m','$t').then(function (result) {if (result.value) {window.location = '$l';}})";
    echo '},100);</script>';
}
?>