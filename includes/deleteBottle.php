<?php
  $drink = $_POST['drink']; 


  
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


      $qry = "UPDATE `tbldrink` SET `dtCount` = `dtCount`  - 1   WHERE `idDrink` = ".  $drink ;

      if ($dbc->query($qry) === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: ";
      }
?>