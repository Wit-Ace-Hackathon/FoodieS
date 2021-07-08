<?php
session_start();
if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true){
    header("location: ../index.php");
}

require "scripts/_DBConnect.php";

if($_SERVER['REQUEST_METHOD'] == 'POST' ) {

    $search = $_POST['search'];

    $sql = "SELECT * from food where code = '$search';";
    $result = mysqli_query($conn, $sql);


}


?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Foodies</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" , intital-scale="1.0" />
    <link rel="stylesheet" href="style.css" />
    <!--<link rel="stylesheet" href="css/bootstrap.css" />-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        $(document).ready(function () {
            $("#icon").click(function () {
                $("ul").toggleClass("show");
            });
        });
    </script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>

<body>



<nav>
    <label class="logo">FoodieS</label>
    <ul>
        <li><a class="active">Home</a></li>
        <li><a href="#Form">Seller</a></li>
        <li><a href="#Search">Buyer</a></li>
        <li><a href="#Blog">Blogs</a></li>
        <li><a href="#Contact">Contact Us</a></li>
        <li><a href="../Login/scripts/logout.php">Log Out</a></li>
    </ul>
    <label id="icon">
        <i class="fas fa-bars"></i>
    </label>
</nav>


<!--------------------Slider----------------------->
<section>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/bgg.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Welcome to FoodieS</h5>
                    <p>Zero Hunger is our GOAL.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/background-buyer.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5> Want to check Food Availability?</h5>
                    <p>Drop In your area's pin code in the search bar below and you are good to go.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/eee.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Are you a seller?</h5>
                    <p>Fill in the Seller form and become one of our trusted sellers.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
<br>

<!-----search bar ------>
<a id="Search"> </a>
<div class="header2">
    <h2> ENTER YOUR PINCODE </h2> </div>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['search'] != '') {
    $num = mysqli_num_rows($result);
    if($num == 0) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Sorry!</strong> No Search results available in your region.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }

}?>
<form action="home.php" method="post" class="box">
    <input type="text" name="search" id="search" placeholder="Search Here...">
    <button for="check" type="submit" name = "sub" id = "sub"> <i class="fas fa-search"></i></button>


</form>
<br>
<div class="container">


    <div class="row row-cols-3">


        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['search'] != '') {


            if($num >0) {
                while ($row = mysqli_fetch_array($result)) {
                    echo '
                        <div class="col card my-3 mx-3" style="width: 18rem;">
          <img src="uploads/'.$row['image'].'" style = "width:250px; height: 250px;" class="card-img-top" alt="...">
          <div class="card">
              <h5 class="card-body">'.$row['iname'].'</h5>
              <p class="card-text">Seller Name: '.$row['fname'].'</p>
              <p class="card-text">Price: '.$row['price'].'</p>
              <p class="card-text">Available Till: '.$row['atime'].'</p>
              <p class="card-text">Address: '.$row['address'].'</p>              
              <p class="card-text">Vessel Needed: '.$row['vessel'].'</p>
              <p class="card-text">Vehicle Requirement: '.$row['vehicle'].'</p>
          </div>
        </div>
                ';
                }
            }


        }

        ?>



    </div>
</div>

<br>
<!-----Seller Form----->

<a id="Form"> </a>
<div class="header1">
    <h2> FOOD DETAILS </h2> </div>
<br> <br> <br>
<div class="background"> <form name="Seller Form" action = "scripts/sell.php" method="post" enctype="multipart/form-data">
        <table background = "images/Fooodd.jpg" align="center" border="2s" bordercolor="black" cellspacing="4" cellpadding="10">
            <tr>
                <td> <label for="fname" class="required"> Full name: </label> <br>
                    <input type="text" id="fname" name="fname"></td>
                <td><label for="contact" class="required">Contact No.:</label><br>
                    <input type="text" id="contact" name="contact"></td>
            </tr>
            <tr>
                <td><label for="iname" class="required"> Food Item Name:</label><br>
                    <input type="text" id="iname" name="iname"></td>
                <td><label for="quantity" class="required"> Sufficient For:</label><br>
                    <input type="text" id="quantity" name="quantity"></td>
            </tr>
            <tr>
                <td><label for="price"class="required"> Price per Plate:</label><br>
                    <input type="text" id="price" name="price"></td>
                <td><label for="day" class="required"> Best Before:</label><br>
                    <input type="date" id="day" name="day"></td>
            </tr>
            <tr>
                <td><label for="add" class="required"> Address:</label><br>
                    <input type="text" id="add" name="add"></td>
                <td><label for="code" class="required"> Pin Code:</label><br>
                    <input type="text" id="code" name="code"></td>
            </tr>
            <tr>
                <td><label for="atime" class="required"> Food Available Till:</label><br>
                    <input type="datetime-local" id="atime" name="atime"></td>
                <td> <label for="img" class="required"> Food Image: </label><br>
                    <input type="file" id="file" name="file" ></td>
            </tr>
            <tr>
                <td><label for="vessel" class="required"> Need Vessels: </label><br>
                    <select name="vessel">
                        <option style="opacity:0.4" value="Y"> Yes </option>
                        <option value="N"> No </option>
                    </select></td>
                <td><label for="vehicle" class="required" > Vehicle Required: </label><br>
                    <select name="vehicle">
                        <option value="2W"> 2 Wheeler</option>
                        <option value="4W"> 4 Wheeler </option>
                    </select></td>
            </tr>

            <tr>
                <td><input type="submit" name="submit" value="Submit" /></td>
                <td><input type="reset" name="reset" value="Reset" /></td>
            </tr>
        </table>
</div>
</form>


<!-------Blog--------->


<br><br><br>
<a id="Blog"></a>
<div class="header">
    <h2>BLOGS</h2>
</div>
<br><br><br>
<div class="container">
    <div class="column-left">
        <div class="card1">
            <h2 style="color:lightblue">  Alternatives To Plastic  </h2>
            <h5 style="color:grey">June 17, 2020</h5>

            <p style="color:white">Today, plastic is everywhere, from homes to oceans, from bottles and plastic bags to plastic cups and straws.
                This versatile material is in our appliances, computers, clothing, and so much more. Some of the most common places we find plastic are wrapped around the things we buy every day.
                After all, it’s an effective way to keep food and cosmetics clean and fresh.
                <a href="Foodies%20Blogs.html#blog1"> Read More </a>
            </p>
        </div>
    </div>

    <div class="column-center">
        <div class="card2">
            <h2 style="color:lightblue">How Not To Waste Food? </h2>
            <h5 style="color:grey">June 16, 2020</h5>
            <p style="color:white">Food is something that provides nutrients, energy for activity, growth, and all body functions such as breathing, digesting food, keeping warm; materials for the growth andrepair of the body, and keeping the immune system healthy.
                Around the world, more than enough food is produced to feed the global population—but more than 690
                <a href="Foodies%20Blogs.html#blog2"> Read More </a> </p>
        </div>
    </div>

    <div class="column-right">
        <div class="card3">
            <h2 style="color:lightblue">Sustainable Development?</h2>
            <h5 style="color:grey">June 17, 2020</h5>
            <p style="color:white">>The concept of needs, comprising of the conditions for maintaining an acceptable life standard for all people.<br>
                >The concept of limits of the capacity of the environment to fulfil the needs of the present and the future, determined by the state of technology and social organization.<br>
                >There are many ways to designing <br>
                <a href="Foodies%20Blogs.html#blog3"> Read More </a> </p>
        </div>
    </div>


</div>

<!-----------Contact Me---------------->
<section>
    <br><br>
    <a id="Contact"> </a>
    <div class="contact-me"  >
        <p>If You Have Any Problem, feel free to Contact Us</p>
        <button><a href=" mailto: foodieCustomerSupport@gmail.com">  Contact Us  </a></button>
    </div>

    <!-----------Footer-------------->

    <footer>
        <p>
            Going-To Internet. Thank you for Visiting.
        </p>
        <br>
        <p>Hope you liked our website and food. Do leave your Valuable feedback.

        </p>
        <!-----------Social Handles------->

        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i> </a>
            <a href="#"><i class="fab fa-whatsapp"></i> </a>
            <a href="#"><i class="fab fa-linkedin"></i> </a>
            <a href="#"><i class="fab fa-twitter"></i> </a>

            <!----CopyRight------>
            <p class="copyright">Copyright by Going-to Internet</p>

        </div>

    </footer>
    <!---------Attached Social Bar------>
    <div class="a-social-bar">
        <a href="#"><i class="fab fa-facebook"></i> </a>
        <a href="#"><i class="fab fa-whatsapp"></i> </a>
        <a href="#"><i class="fab fa-linkedin"></i> </a>
        <a href="#"><i class="fab fa-twitter"></i> </a>

    </div>
</section>


<!-------------------Bot------------->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<!----<script src="js/bootstrap.js"></script>---->
<script>

    window.watsonAssistantChatOptions = {
        integrationID: "cee605b5-b04c-44cf-bf98-304a85a96794", // The ID of this integration.
        region: "us-south", // The region your integration is hosted in.
        serviceInstanceID: "31ebd00c-4579-45ed-ae55-cb37621891ac", // The ID of your service instance.
        onLoad: function(instance) { instance.render(); }
    };
    setTimeout(function(){
        const t=document.createElement('script');
        t.src="https://web-chat.global.assistant.watson.appdomain.cloud/loadWatsonAssistantChat.js";
        document.head.appendChild(t);
    });

</script>

</body>

</html>
