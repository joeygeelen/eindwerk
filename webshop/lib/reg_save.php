<?php
session_start();
require_once( "Dbconnection.php" );

if ( $_POST["Save"] == "Opslaan" )
{
    unset($_POST['Save']);      //Save element uit $_POST verwijderen

    //sleutel-waardenparen opslaan met = en '
    foreach( $_POST as $key => $value )
    {
        $hash = hash("md5", $_POST["log_passwd"]);
        if ( $key == "log_passwd" ) $value = $hash;
        else $value = htmlentities($value, ENT_QUOTES);
        $pairs[] = $key . "=" . "'" . $value . "'" ;
    }
    $naam = htmlentities($_POST["log_usrname"], ENT_QUOTES);
    $email = htmlentities($_POST["log_email"], ENT_QUOTES);
    //update statement maken; gebruik implode()
    $sql = "INSERT INTO loginwebshop SET " . implode(", " , $pairs ) ;
    echo "SQL: " . $sql . "<br>";

    //SQL uitvoeren
    if ($conn->query($sql) === TRUE) {
        $hash = hash("md5", $_POST["log_passwd"]);
        $sql = "SELECT * FROM loginwebshop where log_usrname=" . "'" . $naam . "'" . " and log_passwd=" . "'" . $hash . "'";
        echo "SQL: " . $sql . "<br>";
        $result = $conn->query($sql);
        var_dump($result);
        if ( $result->num_rows == 1 )
        {
            $row = $result->fetch_assoc();
            $_SESSION["id"] = $row["log_id"];
            $_SESSION["authenticated"] = 'true';
            echo '<script type="text/javascript">
              window.location = "../index.php"
              </script>';
        } else echo "Oeps er is iets mis gegaan";
    } else {
        echo "Error updated record: " . $conn->error . "<br>";
    }

}
?>

