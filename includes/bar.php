<?php

$name = $_SESSION["name"];

?>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="javascript" src="../jquery.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <script>
    
$(document).ready(function() {
    

        let drinkMenu = [
            "Peach liquor",
            "Vodka shot",
            "Beer",
            "Cider",
            "Tequila",
            "Berliner Luft",
            "Rocket shot",
            "Vodka energy",
            "Black vodka energy",
            "Vodka sprite",
            "Energy drinks",
            "Mochito"
        ];

        let availableTags = ["Alicia SPA",
            "Andreas CYP",
            "Anastasia MAC",
            "Anais LUX",
            "Alikhan KAZ",
            "Alex VNM",
            "Alin ROM",
            "Andrii UKR",
            "Anna ROM",
            "Anne-Sophie GER",
            "Aurelien FRA",
            "Bao VNM",
            "Bohdan UKR",
            "Caterina MOL",
            "Caterina ITA",
            "Clarissa ITA",
            "David SLO",
            "Dany POR",
            "Dennis LAT",
            "Dyanne NED",
            "Egg TUR",
            "Ekatrina BUL",
            "Filipe POR",
            "Franken NED",
            "Francisco ARG",
            "Gabby TAW",
            "Gabriel ARU",
            "Helen FRA",
            "Iarina ROM",
            "Ilario SOA",
            "Isabella USA",
            "Jermain NED",
            "Jan MEX",
            "Joe LUX",
            "Julian NED",
            "Justin ROM",
            "Kryss MOL",
            "Kelvin EST",
            "Kenan FRA",
            "Lenox ZW",
            "Lorand BUL",
            "Lucas POR",
            "Laura ROM",
            "Luis NED",
            "Marian EST",
            "Marit NED",
            "Maria UKR",
            "Martin NED",
            "Martin BUL",
            "Max GER",
            "Max BOL",
            "Melany COL",
            "Michael MAL",
            "Mitch ROM",
            "Neo TAW",
            "Nico ARG",
            "Nikolay LAT",
            "Nathan POR",
            "Nathan R.POR",
            "Olek POL",
            "Oliver NOR",
            "Patric ROM",
            "Peter HUN",
            "Paul UKR",
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
            "Malika NED",
            "Matthew Rus",
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
<section id="menuSec">

<h1 id="menuTitle">Bar service</h1>


<form method="post" autocomplete="on" class="barInput">



    <input id="nameData" name="nameData" type="text">


    <label for="drink">Drink</label>
    <select id="drink" name="selectDrink">
    </select>


    <input type="number" name="dataMany" placeholder="How many drink" id="dataAmount">



    <input type="submit" name="dataSend" id="dataSend">
    
</form>



<?php


if (isset($_POST["dataSend"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    //$name = $_POST["selectName"];
    $drink = $_POST["selectDrink"];
    $try = $_POST["nameData"];
    $amount = $_POST["dataMany"];
    if (empty($amount)){
        $amount = 1;
    }
    echo $amount. "<br>";;



    echo $drink . "<br>";
    echo $try . "<br>";


    $name = $_SESSION["name"];

    date_default_timezone_set('Europe/Luxembourg');

// Then call the date functions
    $date = date('H:i:s');



    $combo = $try . ';' . $drink . ";" . $date . "\n";




    $filename = "stock.csv";



    // open csv file for writing
    $f = fopen( $filename, 'w+');

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
       var_dump($id);
        for ($i=0; $i <$amount ; $i++) { 
            $qry = "INSERT INTO `tblBar` (`dtServedTo`, `dtDrink`, `fiServer`, `dtTime`) VALUES (?,?,?,?)";

            $statement = mysqli_prepare($dbc, $qry);
    
            mysqli_stmt_bind_param($statement, "ssis", $try,$drink,$id,$dat);
    
    
            mysqli_stmt_execute($statement);
    
            $result = mysqli_stmt_get_result($statement);
        }
     
}

?>
    </div>
</section>
</body>
</html>