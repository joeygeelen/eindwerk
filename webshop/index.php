<?php
require_once 'lib/authenticate.php';
require_once 'lib/Dbconnection.php';


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
header("Content-Type: application/json; charset=UTF-8");

$sql = "SELECT * FROM bier 
                            INNER JOIN kleur ON bie_kle_id = kle_id
                            INNER JOIN streek ON bie_str_id = str_id";
$result = SQLexec($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["bie_id"] . "<br>Naam: " . $row["bie_naam"] . "<br>Prijs: €" . $row["bie_prijs"] .
            "<br>Percentage: " . $row["bie_percentage"] . "%<br>";
    }
} else {
    echo "0 results";
}

