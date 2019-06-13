<?session_start();
require_once( "lib/Dbconnection.php" );
print '<!DOCTYPE html>';
print '<html lang="en">';
$title = "Login";
require_once ("lib/header.php");

print '<body>';



print '<div class="container">';
print '<div class="jumbotron text-center">';
print '<h1>Login</h1>';
print '</div>';
print '<div class="row">';



if ($_SESSION["authenticated"] == 'true'){
    header("Location: index.php");
}


print '<div class="col-sm-12">';

print "<form method=POST action='lib/login_controle.php'>";

//inputs voor alle andere velden
$arr_fields = array(
    "Gebruikersnaam" => "log_usrname",
    "Wachtwoord" => "log_passwd"
);

foreach( $arr_fields as $caption => $field )
{
    print '<div class="form-group row">';
    print '<label for="' . $field . '" class="col-sm-2 col-form-label">' . $caption . '</label>';
    print '<div class="col-sm-6">';
    $type == "text";
    if ( $field == "log_passwd" ) $type = "password";
    print '<input type="' . $type . '" class="form-control" id="' . $field . '" name="' . $field . '" value="" required>';
    print '</div>';
    print '</div>';
}

//Save button
print '<div class="form-group row">';
print '<label class="col-sm-4 col-form-label"></label>';
print '<div class="col-sm-6">';
print '<input type="submit" name="Login" value="Login">';
print '&nbsp;';
print '<a href="register.php">Registreren</a>';
print '</div>';
print '</div>';

if ($_SESSION["falselogin"] == 'true'){
    print '<p style="color: red">Foutieve login gegevens</p>';
}

print '</form>';

print '</div>';
print '</div>';
print '</body>';
print '</html>';
?>
