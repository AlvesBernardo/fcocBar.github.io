

<?php


if (isset($_POST["data_send"])){


    require_once 'db_credentials.php';

    //  Connect to database server and select database
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PW, DB_NAME);

    // Test if the connection was successfully established
    // and if necessary, abort the script with a suitable error message
    if(mysqli_connect_errno())
        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());


    // set charset
    mysqli_set_charset($dbc, 'utf8');



    $name = $_POST["data_name"];
    $worker = $_POST["data_worker"];
    $passwd= $_POST["data_passwd"];

    $hash = password_hash($passwd,PASSWORD_BCRYPT);



        $query = "INSERT INTO tbluser (dtName, dtPassword, dtType) VALUES (?,?,?)";

        // Prepared Statement für eine spätere Ausführung vorbereiten
        $statement = mysqli_prepare($dbc, $query);

        // Testen ob der Prepared Statement erfolgreich vorbereitet wurde
        // und gegebenenfalls den Skript mit einer geeignete Fehlermeldung abbrechen
        if (!$statement)
            die("Wrong SQL: $query Error: " . mysqli_error($dbc));

        // Der Parameter $lastname und Platzhalter (?) im Prepared Statement binden
        mysqli_stmt_bind_param($statement, "ssi", $name, $hash, $worker);

        // Prepared Statement mit den aktuellen Wert in $lastname ausführen
        mysqli_stmt_execute($statement);

        // Das Ergebnis des Prepared Statement in $result "abspeichern"
        $result = mysqli_stmt_get_result($statement);

        // Freigeben der Ressourcen die für das Ausführen
        // des Prepared Statement benutzt wurden

        mysqli_stmt_close($statement);

    // Verbindung zum Datenbankserver schließen
    mysqli_close($dbc);



}


?>

<div class="register_page">
    <p class="sign" align="center">Register</p>
    <form method="post" class="form1">


        <input type="text" name="data_name" id="Username" maxlength="50" class="un" placeholder="Name"><br>




        <select class="selectWorker" id="techniker" name="data_worker" >
            <option value="1">Bar Service</option>
            <option value="2">Finance</option>
            <option value="3">Admin</option>
        </select>




        <input type="password" id="passwd" name="data_passwd" maxlength="50" class="un" placeholder="Password"><br>
        <input type="submit" name="data_send" class="submit">

    </form>

</div>

</body>
</html>