<?php

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

    $_SESSION['i1'] = $i1;
    $_SESSION['i2'] = $i2;
    $_SESSION['i3'] = $i3;
    $_SESSION['i4'] = $i4;
    $_SESSION['del'] = $del;

    header("Location: sverify.php");
?>