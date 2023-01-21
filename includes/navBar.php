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

            echo '<li><a href="index.php?page=login">Login</a></li>';
            echo '<li><a href="index.php?page=register">Bar Service</a></li>';

       echo "</ul>";
echo "</div>";
?>