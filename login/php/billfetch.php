<?php

    $conn = new mysqli ("localhost", "root", "", "bio");

    session_start();
    $id = $_SESSION['id'];

    $i1  = $_POST['i1'];
    $i2  = $_POST['i2'];
    $i3  = $_POST['i3'];
    $i4  = $_POST['i4'];

    $sql = "SELECT * from price ORDER BY pid DESC LIMIT 1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $d1 = $row['i1'];
    $d2 = $row['i2'];
    $d3 = $row['i3'];
    $d4 = $row['i4'];

    $sql = "SELECT bno from bill ORDER BY bno DESC LIMIT 1";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $bno = $row["bno"];

    if($i1!=NULL || $i2!=NULL || $i3!=NULL || $i4!=NULL){
        $nid = (int)$bno;
        $nid = $nid+1;
        $INSERT = "INSERT Into bill (bno)values(?)";
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("s", $nid);
        $stmt->execute();

        $date = date('d-m-y');
        $time = date('G:i:s');
        $sql = "UPDATE bill SET id='$id' where bno='$nid'";
        $conn->query($sql);
        $sql = "UPDATE bill SET date='$date',time='$time' where bno='$nid'";
        $conn->query($sql);
        $sql = "UPDATE bill SET ip1='$d1' where bno='$nid'";
        $conn->query($sql);
        $sql = "UPDATE bill SET ip2='$d2' where bno='$nid'";
        $conn->query($sql);
        $sql = "UPDATE bill SET ip3='$d3' where bno='$nid'";
        $conn->query($sql);
        $sql = "UPDATE bill SET ip4='$d4' where bno='$nid'";
        $conn->query($sql);

        $sql = "UPDATE bill SET i1='$i1' where bno='$nid'";
        $conn->query($sql);
        $sql = "UPDATE bill SET i2='$i2' where bno='$nid'";
        $conn->query($sql);
        $sql = "UPDATE bill SET i3='$i3' where bno='$nid'";
        $conn->query($sql);
        $sql = "UPDATE bill SET i4='$i4' where bno='$nid'";
        $conn->query($sql);
    }

?>