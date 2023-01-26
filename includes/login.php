<section id="login">
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form class="login" method="post">
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" placeholder="User name / Email" name="dataName"
                               id="dataName">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" placeholder="Password" name="dataPassWd"
                               id="dataPassWd">
                    </div>


                        <input type="submit" name="dataSend" id="dataSend" >

                </form>
                <div class="social-login">
                    <h3>log in via</h3>
                    <div class="social-icons">
                        <a href="#" class="social-login__icon fab fa-instagram"></a>
                        <a href="#" class="social-login__icon fab fa-facebook"></a>
                        <a href="#" class="social-login__icon fab fa-twitter"></a>
                    </div>
                </div>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>
</section>



<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {


        require_once 'db_credentials.php';

        //  Connect to database server and select database
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);

        // Test if the connection was successfully established
        // and if necessary, abort the script with a suitable error message
        if(mysqli_connect_errno())
            die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());


        // set charset
        mysqli_set_charset($dbc, 'utf8');


        $mail = $_POST["dataName"];
        $passWd = $_POST["dataPassWd"];


        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);

        if (mysqli_connect_errno()) {
            die("Connect Error (" . mysqli_connect_errno() . ") " . mysqli_connect_error());
        }


        mysqli_set_charset($dbc, 'utf8');

        $qry = "SELECT `idUser` ,`dtName`  ,`dtPassword` , `dtType` FROM tbluser Where  `dtName` = ?";




        $statement = mysqli_prepare($dbc, $qry);


        // Testen ob die Abfrage ergfolgreich ausgeführt wurde
        // und gegebenenfalls der Skript mit einer geeignete Fehlermeldung abbrechen
        if (!$statement)
            die("Wrong SQL: $qry Error: " . mysqli_error($dbc));


        mysqli_stmt_bind_param($statement, "s", $mail);


        mysqli_stmt_execute($statement);

        $result = mysqli_stmt_get_result($statement);


        "numbers of rows" . mysqli_num_rows($result);


        'Number of rows: ' . mysqli_num_rows($result);

        //Check password
        $data = mysqli_fetch_assoc($result);
        $hash = $data["dtPassword"];
        $worker = $data["dtType"];

        if (password_verify($passWd, $hash)) {

            echo '<br>Valides Passwort!';
            $login = true;
            session_start();

            $_SESSION["name"] = $data["dtName"];
            $_SESSION["worker"]= $data["dtType"];
            $_SESSION["id"]= $data["idUser"];


        } else {
            echo '<br>Invalide Passwort.';

        }

        mysqli_free_result($result);
        mysqli_stmt_close($statement);

    }


?>