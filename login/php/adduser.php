<?php

$name = $_POST['name'];
$place  = $_POST['place'];

if (empty($name) || empty($place) )
{
    die('Details Missing');
}

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bio";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}

else{
    $SELECT = "SELECT name From users Where name = ? Limit 1";
    $INSERT = "INSERT Into users (name , place)values(?,?)";

    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $stmt->bind_result($name);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    $stmt->close();

    if ($rnum==0) {
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("ss", $name , $place);
        $stmt->execute();
        echo 'User added';
    }
    else{
        echo 'User already exists';
    }
}