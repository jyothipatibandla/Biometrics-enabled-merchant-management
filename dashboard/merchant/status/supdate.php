<?php
    session_start();

    $bno = $_SESSION['bno'];

    $conn = new mysqli ("localhost", "root", "", "bio");


    if(isset($_POST['bill'])){
        $bill = $_POST['bill'];
    }
    else{
        $bill = "nan";
    }
    if(isset($_POST['pay'])){
        $pay = $_POST['pay'];
    }
    else{
        $pay = "nan";
    }
    
    $flag = 0;

    $sql = "SELECT * from status where bno='$bno'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $dbill = $row["bill"];
    $dpay = $row["pay"];
    $user = $row["user"];

    if($bill == $dbill && $pay == $dpay){
        $l = "mstatus.php";
        $m = "No change";
        $t = "error";
        pop($l,$m,$t);
    }
    else{
        if($dbill=="ip" && $bill=="nan" || $dbill=="ip" && $bill=="ip"){
            if($pay=="p"){
                $l = "mstatus.php";
                $m = "Payment update invalid";
                $t = "error";
                pop($l,$m,$t);
            }
            if($pay=="nan"){
                $l = "mstatus.php";
                $m = "No change";
                $t = "error";
                pop($l,$m,$t);
            }
            if($pay==$pay){
                $l = "mstatus.php";
                $m = "No change";
                $t = "error";
                pop($l,$m,$t);
            }
        }
        else{
            if($user=="r" && $bill=="ip"){
                $l = "mstatus.php";
                $m = "Customer reviewed";
                $t = "error";
                pop($l,$m,$t);
            }
            elseif($dpay=="p" && $bill=="ip"){
                $l = "mstatus.php";
                $m = "Bill paid";
                $t = "error";
                pop($l,$m,$t);
            }
            else{
                if($pay=="nan" && $bill==$dbill){
                    $l = "mstatus.php";
                    $m = "No change";
                    $t = "error";
                    pop($l,$m,$t);
                }
                if($bill=="nan" && $pay==$dpay){
                    $l = ".mstatus.php";
                    $m = "No change";
                    $t = "error";
                    pop($l,$m,$t);
                }
                if($bill != "nan"){
                    $bill = $_POST['bill'];
                    $sql = "UPDATE status SET bill='$bill' where bno='$bno'";
                    $conn->query($sql);
                    $flag = $flag+1;
                }
                if($pay != "nan"){
                    $pay = $_POST['pay'];
                    $sql = "UPDATE status SET pay='$pay' where bno='$bno'";
                    $conn->query($sql);
                    $flag = $flag+1;
                }
            }
        }
    }

    if($flag!=0){
        $l = "mstatus.php";
        $m = "Update successful";
        $t = "success";
        pop($l,$m,$t);
    }

    if($bill=="nan" && $pay=="nan"){
        $l = "mstatus.php";
        $m = "No change";
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