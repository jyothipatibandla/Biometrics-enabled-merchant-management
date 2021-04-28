<?php

session_start();
$bno = $_SESSION['bno'];

$conn = new mysqli ("localhost", "root", "", "bio");

$sql = "SELECT * FROM bill where bno='$bno'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
    while($row = $result->fetch_assoc()) {
        $nid = $row['bno'];
        $date = $row['date'];
        $time = $row['time'];
        $id = $row['id'];
        $i1 = $row['i1'];
        $d1 = $row['ip1'];
        $i2 = $row['i2'];
        $d2 = $row['ip2'];
        $i3 = $row['i3'];
        $d3 = $row['ip3'];
        $i4 = $row['i4'];
        $d4 = $row['ip4'];
    }
}


$msg = $nid.$date.$time.$id.$i1.$d1.$i2.$d2.$i3.$d3.$i4.$d4;
#echo $msg;
#echo 'Done';
$hash = hash("sha512", $msg);
#echo $hash;
$hash = base_convert($hash, 16, 10);
#echo 'CHECK';
#echo $hash;
echo shell_exec("python verify.py $nid $hash");

$sql = "SELECT * FROM ds where bno='$bno'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
    while($row = $result->fetch_assoc()) {
        $verify = $row['verify'];
    }
}

$sql = "UPDATE ds SET verify='-' where bno='$bno'";
$conn->query($sql);

if($verify == 'true'){
    echo '<script src="../../js/jquery-3.6.0.min.js"></script>';
    echo '<script src="../../js/sweetalert2.all.min.js"></script>';
    echo '<script type="text/javascript">';
    echo "setTimeout(function () { Swal.fire('Digitally verified','Signed on - Date:$date Time:$time','success').then(function (result) {if (result.value) {window.location = 'fcbill.php';}})";
    echo '},100);</script>';
}
else{
    echo '<script src="../../js/jquery-3.6.0.min.js"></script>';
    echo '<script src="../../js/sweetalert2.all.min.js"></script>';
    echo '<script type="text/javascript">';
    echo "setTimeout(function () { Swal.fire('','Signature mismatch','error').then(function (result) {if (result.value) {window.location = 'fcbill.php';}})";
    echo '},100);</script>';
}

?>