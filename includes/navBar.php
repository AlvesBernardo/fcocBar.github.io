<?php
session_start();
?>
<input type="checkbox" id="active">
<label for="active" class="menu-btn"><span></span></label>
<label for="active" class="close"></label>
<div class="wrapper">
    <ul>
        <?php
        // in this page we will define our navbar. Some pages will only be displayed at certain times other will only be displayed if you are a specific user,
            if (!isset($_SESSION["worker"])) {
                echo '<li><a href="index.php?page=login">Login</a></li>';
            }
            if (isset($_SESSION["worker"]) && $_SESSION["worker"] == 3 || $_SESSION["worker"] == 2) {
                echo '<li><a href="index.php?page=bar">Bar Service</a></li>';
                echo '<li><a href="index.php?page=register">Admin</a></li>';
                echo '<li><a href="index.php?page=register">Charts</a></li>';

            }
    if (isset($_SESSION["worker"]) && $_SESSION["worker"] == 1) {
        echo '<li><a href="index.php?page=bar">Bar Service</a></li>';


    }


       echo "</ul>";
echo "</div>";
?>