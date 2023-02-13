<script>
    $(document).ready(function() {


        $(".plus").click(function() {

            var alt = $(this).children("img").attr("alt");
           

            $.ajax({
                url: "includes/addDrink.php",
                type: "post",
                data: {
                    "drink": alt
                }
            })

            window.location.reload();

        });
        $(".minus").click(function() {


            var alt2 = $(this).children("img").attr("alt");


            $.ajax({
                url: "includes/deleteBottle.php",
                type: "post",
                data: {
                    "drink": alt2
                }
            })
            window.location.reload();
        });

    });
</script>

<section class="charts">
    <h1>How many where sold today</h1>


    <table class="customers">
        <tr>

            <th>Amount</th>
            <th>Drink Name</th>


        </tr>
        <?php



        require_once 'db_credentials.php';

        //  Connect to database server and select database
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);

        // Test if the connection was successfully established
        // and if necessary, abort the script with a suitable error message
        if (mysqli_connect_errno())
            die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());


        // set charset
        mysqli_set_charset($dbc, 'utf8');


        $dateYesterday = date('d.m.Y', strtotime("-1 days"));
        echo $dateYesterday;

        $sql = 'SELECT COUNT(tblbar.dtDrink) AS drink, tbldrink.dtName FROM `tbldrink` INNER JOIN tblbar on idDrink = tblbar.dtDrink WHERE tblbar.dtTime 
        LIKE "2023-02-12%"
        GROUP By tblbar.dtDrink';


        $result = $dbc->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>"  . $row["drink"] . "</td><td>  " . $row["dtName"] . "</td></tr>";
            }
        } else {
            echo "0 results";
        }




        ?>

    </table>

    <h1>Current stock</h1>
    <table class="customers">

        <tr>

            <th>ID</th>
            <th>Drink Name</th>
            <th>Amount</th>
            <th>+</th>
            <th>-</th>
        </tr>



        <?php

        require_once 'db_credentials.php';

        //  Connect to database server and select database
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);

        // Test if the connection was successfully established
        // and if necessary, abort the script with a suitable error message
        if (mysqli_connect_errno())
            die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());


        // set charset
        mysqli_set_charset($dbc, 'utf8');




        $sql = 'SELECT * FROM `tbldrink`';


        $result = $dbc->query($sql);

        $result = $dbc->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" .  $row["idDrink"] . "</td><td> " . $row["dtName"] . "</td><td>" . $row["dtCount"] . "</td>
                <td><a href='#' class='plus'><img src='PICS/plus.png' alt='" .  $row["idDrink"] . "'></a></td><td><a href='#'  class='minus'><img src='PICS/minus.png'  alt='" .  $row["idDrink"] . "'></a></td></tr>";
            }
        } else {
            echo "0 results";
        }
        $dbc->close();

        ?>

    </table>

</section>