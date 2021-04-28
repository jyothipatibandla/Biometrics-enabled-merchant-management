<?php

    $conn = new mysqli ("localhost", "root", "", "bio");

    session_start();
    $id = $_SESSION['id'];

    $i1  = $_POST['i1'];
    $i2  = $_POST['i2'];
    $i3  = $_POST['i3'];
    $i4  = $_POST['i4'];

    if(isset($_POST['del']) && $_POST['del'] == "True") 
        {
            $del = 1;
        }
        else
        {
            $del = 0;
        }	

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

    if($i1!=0 || $i2!=0 || $i3!=0 || $i4!=0){
        $nid = (int)$bno;
        $nid = $nid+1;
        $INSERT = "INSERT Into bill (bno)values(?)";
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("s", $nid);
        $stmt->execute();

        $INSERT = "INSERT Into status (bno)values(?)";
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("s", $nid);
        $stmt->execute();

        $INSERT = "INSERT Into ds (bno)values(?)";
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("s", $nid);
        $stmt->execute();
        
        date_default_timezone_set('Asia/Kolkata'); 
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

        $sql = "UPDATE status SET pay='up' where bno='$nid'";
        $conn->query($sql);
        $sql = "UPDATE status SET user='ur' where bno='$nid'";
        $conn->query($sql);
        if($del == 0){
            $sql = "UPDATE status SET bill='ip' where bno='$nid'";
            $conn->query($sql);
        }
        else{
            $sql = "UPDATE status SET bill='dl' where bno='$nid'";
            $conn->query($sql);
        }

        $msg = $nid.$date.$time.$id.$i1.$d1.$i2.$d2.$i3.$d3.$i4.$d4;
        #echo $msg;
        #echo 'Done';
        $hash = hash("sha512", $msg);
        #echo $hash;
        $hash = base_convert($hash, 16, 10);
        #echo 'CHECK';
        #echo $hash;
        echo shell_exec("python test.py $nid $hash");
        #echo 'Done';

        echo '<script src="../../js/jquery-3.6.0.min.js"></script>';
        echo '<script src="../../js/sweetalert2.all.min.js"></script>';
        echo '<script type="text/javascript">';
        echo "setTimeout(function () { Swal.fire('Bill generated','Digitally signed','success').then(function (result) {if (result.value) {window.location = 'bill.php';}})";
        echo '},100);</script>';
    }

    if($i1==0 && $i2==0 && $i3==0 && $i4==0){
        $m = "Empty bill";
        $l = "bill.php";
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