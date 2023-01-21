<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DJ & FCOC</title>
    <link rel="stylesheet" type="text/css" href="styles/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="images/login/logo_black%20(1).jpg" type="image/x-icon">
    <!-- protect against xss -->




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





    ?>

</section>

</body>

<div id="footer-dark"></div>
</html>