<?php
    $conn = new mysqli ("localhost", "root", "", "bio");

    $i1 = $_POST['i1'];
    $i2 = $_POST['i2'];
    $i3 = $_POST['i3'];
    $i4 = $_POST['i4'];
    
    $flag = 0;

    $sql = "SELECT * from price ORDER BY pid DESC LIMIT 1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $pid = $row["pid"];

    $d1 = $row['i1'];
    $d2 = $row['i2'];
    $d3 = $row['i3'];
    $d4 = $row['i4'];

    if($i1!=NULL || $i2!=NULL || $i3!=NULL || $i4!=NULL){
        $nid = (int)$pid;
        $nid = $nid+1;
        $INSERT = "INSERT Into price (pid)values(?)";
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("s", $nid);
        $stmt->execute();

        $date = date('d-m-y');
        $time = date('G:i:s');
        $sql = "UPDATE price SET date='$date',time='$time' where pid='$nid'";
        $conn->query($sql);
        $sql = "UPDATE price SET i1='$d1' where pid='$nid'";
        $conn->query($sql);
        $sql = "UPDATE price SET i2='$d2' where pid='$nid'";
        $conn->query($sql);
        $sql = "UPDATE price SET i3='$d3' where pid='$nid'";
        $conn->query($sql);
        $sql = "UPDATE price SET i4='$d4' where pid='$nid'";
        $conn->query($sql);
    }

    if($i1!=NULL){
        $flag = $flag+1;
        $sql = "UPDATE price SET i1='$i1' where pid='$nid'";
        $conn->query($sql);
    }
    if($i2!=NULL){
        $flag = $flag+1;
        $sql = "UPDATE price SET i2='$i2' where pid='$nid'";
        $conn->query($sql);
    }
    if($i3!=NULL){
        $flag = $flag+1;
        $sql = "UPDATE price SET i3='$i3' where pid='$nid'";
        $conn->query($sql);
    }
    if($i4!=NULL){
        $flag = $flag+1;
        $sql = "UPDATE price SET i4='$i4' where pid='$nid'";
        $conn->query($sql);
    }

    if($flag!=0){
        $l = "../../dashboard/price.php";
        $m = "Update successful";
        $t = "success";
        pop($l,$m,$t);
    }

    if($i1==NULL && $i2==NULL && $i3==NULL && $i4==NULL){
        $l = "../../dashboard/price.php";
        $m = "No change";
        $t = "error";
       pop($l,$m,$t);
    }

    function pop ($l,$m,$t){
        echo '<script src="../js/jquery-3.6.0.min.js"></script>';
        echo '<script src="../js/sweetalert2.all.min.js"></script>';
        echo '<script type="text/javascript">';
        echo "setTimeout(function () { Swal.fire('','$m','$t').then(function (result) {if (result.value) {window.location = '$l';}})";
        echo '},100);</script>';
    }
?>