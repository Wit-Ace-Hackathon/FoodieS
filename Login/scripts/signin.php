
<?php
include "_DBConnect.php";
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * from user where username = '$username';";
    $result = mysqli_query($conn,$sql);

    $num = mysqli_num_rows($result);
    if($num == 1 ){
        while($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'],)) {

                $login = true;
                session_start();
                $_SESSION['loggedIn'] = true;
                $_SESSION['username'] = $username;
                $name = $row["Name"];
                header("Location: ../../Website/home.php");

            }else {
                $showError = "Invalid Credentials";
            }
        }
    }else {
        $showError = "Invalid Credentials";
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

    <title>Log in!</title>
</head>
<body>
<?php
if($login) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Welcome!</strong> '.$name.'. <strong><a style="text-decoration: none; color: seagreen" href="logout.php" >Click here</a></strong> to log out
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if($showError != false) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error! </strong>Invalid credentials. <strong> <a style="text-decoration: none; color: indianred" href="../../index.php" >Click here</a></strong> to go back
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>




<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>
</html>


