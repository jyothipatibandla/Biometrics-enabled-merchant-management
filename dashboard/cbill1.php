<?php

session_start();

$bill = "";
if(isset($_POST['bill'])){
    $id = $_POST['bill'];
    $_SESSION['id'] = $id;
    header('Location: cbillpage.php');
}
else{
    $m = "Select a user";
    $l = "cbill.php";
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