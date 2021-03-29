<?php

$name = $_POST['name'];

if (empty($name))
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

    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $stmt->bind_result($name);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    $stmt->close();

    if ($rnum==1) {
        header('Location: ../../html/bill/main.html');
    }
    else{
        echo "User doesn't exist";
    }
}