<?php
require_once 'lib/authenticate.php';
require_once 'lib/Dbconnection.php';

$sql = "SELECT * FROM bier 
                            INNER JOIN kleur ON bie_kle_id = kle_id
                            INNER JOIN streek ON bie_str_id = str_id";
$result = SQLexec($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["bie_id"] . "<br>Naam: " . $row["bie_naam"] . "<br>Prijs: €" . $row["bie_prijs"] .
            "<br>Percentage: " . $row["bie_percentage"] . "%";
    }
} else {
    echo "0 results";
}

