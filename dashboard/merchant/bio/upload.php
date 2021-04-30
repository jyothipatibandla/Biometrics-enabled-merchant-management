<?php
    $currentDirectory = getcwd();
    $uploadDirectory = "../uploads/";

    $errors = []; // Store errors here

    $fileExtensionsAllowed = ['jpeg','jpg','png']; // These will be the only file extensions allowed 

    $fileName = $_FILES['the_file']['name'];
    $fileSize = $_FILES['the_file']['size'];
    $fileTmpName  = $_FILES['the_file']['tmp_name'];
    $fileType = $_FILES['the_file']['type'];
    $fileExtension = strtolower(end(explode('.',$fileName)));

    $uploadPath = $currentDirectory . $uploadDirectory . basename($fileName); 

    if (isset($_POST['submit'])) {

      if (! in_array($fileExtension,$fileExtensionsAllowed)) {
        $m = "Invalid format";
        $l = "sign.php";
        $t = "error";
        pop($l,$m,$t);
        $errors[] = "1";
      }

      if ($fileSize > 4000000) {
        $m = "File exceeds maximum size";
        $l = "sign.php";
        $t = "error";
        pop($l,$m,$t);
        $errors[] = "1";
      }

      if (empty($errors)) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
            $m = "Signature updated";
            $l = "sign.php";
            $t = "success";
            pop($l,$m,$t);
        } else {
            $m = "Error occured. Contact admin";
            $l = "sign.php";
            $t = "error";
            pop($l,$m,$t);
        }
      }

    }
    function pop ($l,$m,$t){
        echo '<script src="../../js/jquery-3.6.0.min.js"></script>';
        echo '<script src="../../js/sweetalert2.all.min.js"></script>';
        echo '<script type="text/javascript">';
        echo "setTimeout(function () { Swal.fire('','$m','$t').then(function (result) {if (result.value) {window.location = '$l';}})";
        echo '},100);</script>';
    }
?>