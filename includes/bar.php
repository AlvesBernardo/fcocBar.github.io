<?php

$name = $_SESSION["name"];
?>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="javascript" src="../jquery.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <script>
    
$( document ).ready(function() {
    

        let drinkMenu = [
            "Peach liquor",
            "Vodka shot",
            "Beer",
            "Cider",
            "Tequila",
            "Berliner Luft",
            "Slovakian drink",
            "Vodka energy",
            "Black vodka energy",
            "Vodka sprite",
            "Energy drinks"
        ];

        let availableTags = ["Alicia SPA",
            "Alin ROM",
            "Andrii UKR",
            "Anna ROM",
            "Anne-Sophie GER",
            "Aurelien FRA",
            "Bao VNM",
            "Bogdan UKR",
            "Caterina ITA",
            "Clarissa ITA",
            "Dennis LAT",
            "Dyanne NED",
            "Egg TUR",
            "Ekatrina BUL",
            "Francisco ARG",
            "Gabby TAW",
            "Gabriel ARU",
            "Helen FRA",
            "Iarina ROM",
            "Ilario SOA",
            "Isabella USA",
            "Jan MEX",
            "Kelvin EST",
            "Kenan FRA",
            "Lenox ZW",
            "Lorand BUL",
            "Lucas POR",
            "Maria UKR",
            "Martin NED",
            "Max GER",
            "Melany COL",
            "Michael MAL",
            "Neo TAW",
            "Nico ARG",
            "Nikolay LAT",
            "Olek POL",
            "Oliver NOR",
            "Patric ROM",
            "Peter HUN",
            "Poul UKR",
            "Radu ROM",
            "Rares ROM",
            "Rares ROM 2",
            "Sara LUX",
            "Sasithorne NED",
            "Saule Westra NED",
            "Sebastien GER",
            "Steffi BUL",
            "Stijn NED",
            "Theodore ROM",
            "Zoe GER",
            "Dion NED",
            "Matthwer Rus",
            "Ayomide Nig"];

        $("#nameData").autocomplete({
            source: availableTags,

        });

        $.each(drinkMenu, function(key, value) {
            $('#drink')
                .append($("<option></option>")
                    .attr("value", key)
                    .text(value));
        });





 
    });
</script>

<h1>Bar service</h1>


<form method="post" autocomplete="on">



    <input id="nameData" name="nameData" type="text">


    <label for="drink">Drink</label>
    <select id="drink" name="selectDrink">
    </select>


    <input type="submit" name="dataSend" id="dataSend">
</form>


<?php


if (isset($_POST["dataSend"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    //$name = $_POST["selectName"];
    $drink = $_POST["selectDrink"];
    $try = $_POST["nameData"];
    


    echo $drink . "<br>";
    echo $try . "<br>";



    date_default_timezone_set('Europe/Luxembourg');

// Then call the date functions
    $date = date('H:i:s');



    $combo = $try . ';' . $drink . ";" . $date . "\n";




    $filename = $name ."-stock.csv";


  
    // open csv file for writing
    $f = fopen( $filename, 'a+');

    if ($f === false) {
        die('Error opening the file ' . $filename);
    }

    // write each row at a time to a file
    fwrite($f, $combo);


// close the file
    fclose($f);

    require_once 'db_credentials.php';

    //  Connect to database server and select database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);

    // Test if the connection was successfully established
    // and if necessary, abort the script with a suitable error message
    if(mysqli_connect_errno())
        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());


    // set charset
    mysqli_set_charset($dbc, 'utf8');



        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);

        if (mysqli_connect_errno()) {
            die("Connect Error (" . mysqli_connect_errno() . ") " . mysqli_connect_error());
        }


        mysqli_set_charset($dbc, 'utf8');

       $id= $_SESSION["id"];

        $qry = "INSERT INTO `tblBar`(`dtServedTo`, `dtDrink`, `fiServer `) VALUES (?,?,?)";

        $statement = mysqli_prepare($dbc, $qry);

        mysqli_stmt_bind_param($statement, "sss", $try,$drink,$id);


        mysqli_stmt_execute($statement);

        $result = mysqli_stmt_get_result($statement);
}

?>
    </div>
</section>
</body>
</html>