<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DJ & FCOC</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="images/login/logo_black%20(1).jpg" type="image/x-icon">
    <!-- protect against xss -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="javascript" src="../jquery.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>



    <script>

        $(document).ready(function () {

            $("#navBar").load("includes/navBar.php");
            $("#footer-dark").load("includes/footer.html");


        })

    </script>



</head>
<body>

<section class="navPanel">

    <div id="navBar">


    </div>

</section>


<section class="mainBody">



    <?php


    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }


    if (!isset($_SESSION["worker"])){
        include_once "includes/login.php";

    }

    if (isset($_SESSION["worker"])){

        if ($page == "bar") {
            include_once "includes/bar.php";
        }else if ($page == "charts") {
            include_once "includes/chart.php";
        } else if ($page == "logout") {
            include_once "includes/logout.php";
        } else {
            include_once "includes/bar.php";
        }    

    }


    ?>

</section>

</body>

<div id="footer-dark"></div>
</html>