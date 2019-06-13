<?session_start();
require_once( "lib/Dbconnection.php" );
print '<!DOCTYPE html>';
print '<html lang="en">';
$title = "Register";
require_once ("lib/header.php");

print '<body>';


print '<div class="container">';
print '<div class="jumbotron text-center">';
print '<h1>Registratie</h1>';
print '</div>';
print '<div class="row">';
print '<div class="col-sm-12">';

//begin form
print "<form method=POST action='lib/reg_save.php'>";

//inputs voor alle velden
$arr_fields = array(
        "Gebruikersnaam" => "log_usrname",
        "Wachtwoord" => "log_passwd",
        "Email" => "log_email"
        );

foreach( $arr_fields as $caption => $field )
{
    print '<div class="form-group row">';
    print '<label for="' . $field . '" class="col-sm-2 col-form-label">' . $caption . '</label>';
    print '<div class="col-sm-6">';
    $type = "text";
    if ( $field == "log_passwd" ) $type = "password";
    print '<input type="' . $type . '" class="form-control" id="' . $field . '" name="' . $field . '" value="" required>';
    print '</div>';
    print '</div>';
}

//Save button
print '<div class="form-group row">';
print '<label class="col-sm-2 col-form-label"></label>';
print '<div class="col-sm-10">';
print '<input type="submit" name="Save" value="Opslaan">' ;
print '&nbsp;';
print '<a href="login.php">Ik heb al een account</a>';
print '</div>';
print '</div>';

print '</form>';

print '</div>';
print '</div>';
print '</body>';
print '</html>';
?>
