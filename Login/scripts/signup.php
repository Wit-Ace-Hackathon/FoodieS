<?php
include "_DBConnect.php";
$error = false;
$passwordDontMatch = false;
$exists = false;
$showAlert = false;
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

  $hash = password_hash($password,PASSWORD_DEFAULT);
    $exists = false;

    $existsquery = "select * from user where username = '$username';";
    $result = mysqli_query($conn,$existsquery);
    $numRows = mysqli_num_rows($result);
    if($numRows > 0) {
        $error = "username already exists";
    }else {
        if($password == $cpassword && $username != "") {
//        INSERT INTO `users` (`sno`, `username`, `password`, `dt`) VALUES (NULL, 'aman', '1234', current_timestamp());
            $sql = "insert into `user` (`Name`,`username`,`password`,`email`) values ('".$name."','".$username."', '".$hash."','".$email."');";
            $result = mysqli_query($conn,$sql);

            if($result) {
                $showAlert =true;
            }else {
                $error = "Something went wrong";
            }

        }else if($password != $cpassword ){
            $passwordDontMatch = true;
        }
    }


}
?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<?php
if($showAlert) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your account is now created you can now log in.<strong> <a style="text-decoration: none; color: seagreen" href="../../index.php" >Click here</a></strong> to go back
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
else if($passwordDontMatch) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> possibly passwords do not match. <strong><a style="text-decoration: none; color: indianred" href="../index.php" >Click here</a></strong> to go back
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}

else if($error != false) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> '.$error.'<strong> <a style="text-decoration: none; color: indianred" href="../index.php" >Click here</a></strong> to go back
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}


?>


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>
</html>
