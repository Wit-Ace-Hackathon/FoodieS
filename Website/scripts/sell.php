<?php

require "_DBConnect.php";

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['fname'] != '') {
   /* $sql1 = "INSERT INTO acc_req values('".$_POST['name']."','".$_POST['city']."','".$_POST['email']."','".$_POST['address']."',current_timestamp());";

    $res1 = mysqli_query($conn,$sql1)*/;

    $fname = $_POST['fname'];
    $contact = $_POST['contact'];
    $iname = $_POST['iname'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $day = $_POST['day'];
    $address = $_POST['add'];
    $code = $_POST['code'];
    $atime = $_POST['atime'];
    $vessel = $_POST['vessel'];
    $vehicle = $_POST['vehicle'];


    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    $fileExt = explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg','jpeg','png','pdf');

    if(in_array($fileActualExt,$allowed)){
        if($fileError === 0) {

            if($fileSize < 1000000) {

                $fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination = "../uploads/".$fileNameNew;

                $sql = "INSERT INTO food VALUES ('".$fname."','".$contact."','".$iname."','".$quantity."','".$price."','".$day."','".$address."','".$code."','".$atime."','".$vessel."','".$vehicle."','".$fileNameNew."') ";
                echo $sql;
                $result = mysqli_query($conn, $sql);
                if($result) {
                    move_uploaded_file($fileTmpName, $fileDestination);
                        header("Location: ../home.php");

                }else {
                    echo 'Error uploading to db';
                }




            }else {
                echo 'Your file is too large';

            }

        }else {
            echo "There was an error uploading";
        }
    }else {
        echo "you can't upload files of this type";
    }
}

?>