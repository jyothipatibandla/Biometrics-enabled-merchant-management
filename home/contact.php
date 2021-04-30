<?php

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['message'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $msg = $_POST['message'];
}
else{
    $m = "Empty feild";
    $l = "index.html";
    $t = "error";
    pop($l,$m,$t);
}

$conn = new mysqli ("localhost", "root", "", "bio");
$sql = "SELECT no from contact ORDER BY no DESC LIMIT 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$no = $row["no"];

$nid = (int)$no;
$nid = $nid+1;
$INSERT = "INSERT Into contact (no)values(?)";
$stmt = $conn->prepare($INSERT);
$stmt->bind_param("s", $nid);
$stmt->execute();

$sql = "UPDATE contact SET name='$name' where no='$nid'";
$conn->query($sql);
$sql = "UPDATE contact SET email='$email' where no='$nid'";
$conn->query($sql);
$sql = "UPDATE contact SET phone='$phone' where no='$nid'";
$conn->query($sql);
$sql = "UPDATE contact SET msg='$msg' where no='$nid'";
$conn->query($sql);

$m = "Message sent";
$l = "index.html";
$t = "success";
pop($l,$m,$t);

function pop ($l,$m,$t){
    echo '<script src="../dashboard/js/jquery-3.6.0.min.js"></script>';
    echo '<script src="../dashboard/js/sweetalert2.all.min.js"></script>';
    echo '<script type="text/javascript">';
    echo "setTimeout(function () { Swal.fire('','$m','$t').then(function (result) {if (result.value) {window.location = '$l';}})";
    echo '},100);</script>';
}
?>