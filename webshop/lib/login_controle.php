<?php
session_start();
require_once( "Dbconnection.php" );

if ( $_POST["Login"] == "Login" )
{
    unset($_POST['Login']);      //Login knop uit $_POST verwijderen
    $hash = hash("md5", $_POST["log_passwd"]);
    $naam = htmlentities($_POST["log_usrname"], ENT_QUOTES);

    //controleer of login en wachtwoord bestaan in users
    $sql = "SELECT * FROM loginwebshop where log_usrname=" . "'" . $naam . "'" . " and log_passwd=" . "'" . $hash . "'";

    //SQL uitvoeren
    $result = $conn->query($sql);
    if ( $result->num_rows == 1 )
    {
        $row = $result->fetch_assoc();
        $_SESSION["user"] = $row;
        $_SESSION["id"] = $row["log_id"];
        $_SESSION["authenticated"] = 'true';
        $_SESSION["IsHuidig"] = $row["log_admin"];
        echo '<script type="text/javascript">
              window.location = "../index.php"
              </script>';

    } else {
        $_SESSION["falselogin"] = 'true';
        echo '<script type="text/javascript">
              window.location = "../login.php"
              </script>';
    }
}
?>

