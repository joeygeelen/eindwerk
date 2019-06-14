<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
header("Content-Type: application/json; charset=UTF-8");

require_once('../lib/database_functions.php');



$request = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];

$parts = explode("/", $request);
$parts_count = count($parts);

if ( $parts[$parts_count-1] == "bieren" )
{
    $mainpart = "bieren";
}
if ( $parts[$parts_count-1] == "bier" )
{
    $mainpart = "speler";
}
if ( $parts[$parts_count-2] == "bier" )
{
    $mainpart = "bier";
    $id = $parts[$parts_count-1];
}

//GET bieren: lijst van alle bieren geven
if ( $method == "GET" AND $mainpart == "bieren"  )
{
    $bieren = GetAllBieren();
    print json_encode( $bieren );
    /*print '{"results": [{
            "img": "kasteelrouge.png",
            "inhoud": "33",
            "kleur": "Rood",
            "merk": "Kasteel",
            "naam": "Rouge",
            "percentage": "8.00",
            "prijs": "3.80",
            "streek": "Izegem"
            },
        {
            "img": "maes.jpg",
            "inhoud": "25",
            "kleur": "Blond",
            "merk": "Maes",
            "naam": "Pils",
            "percentage": "4.50",
            "prijs": "2.20",
            "streek": "Opwijk"
            }]
    }';*/
}


//GET bier: een bier geven
if ( $method == "GET" AND $mainpart == "bier" )
{
    $ds = new DataSet("SELECT * FROM bier 
                            INNER JOIN kleur ON bie_kle_id = kle_id
                            INNER JOIN streek ON bie_str_id = str_id where bie_id=$id", $conn, true);
    $bier = array();
    foreach($ds->rows as $row)
    {
        $bier[$row["bie_id"]] = ["merk"=>$row["bie_merk"], "naam"=>$row["bie_naam"], "inhoud"=>$row["bie_inhoud"],
            "prijs"=>$row["bie_prijs"], "percentage"=>$row["bie_percentage"],"kleur"=>$row["kle_naam"], "streek"=>$row["str_naam"], "img"=>$row["bie_img"]];

    }
    print json_encode($bier);
}

//DELETE bier: een bier verwijderen
if ( $method == "DELETE" AND $mainpart == "bier" )
{
    $sql = "DELETE FROM bier WHERE bie_id=$id";
    $cmd = new SQLCommand($sql, $conn, true);

    //resultaat tonen
    $bieren = GetAllBieren();
    print json_encode( $bieren );
}

function GetAllBieren()
{
    global $conn;
    $ds = new DataSet("SELECT * FROM bier 
                            INNER JOIN kleur ON bie_kle_id = kle_id
                            INNER JOIN streek ON bie_str_id = str_id", $conn, true);
    $bier = array();
    $bieren = array();
    foreach($ds->rows as $row)
    {
        $bier = ["merk"=>$row["bie_merk"], "naam"=>$row["bie_naam"], "inhoud"=>$row["bie_inhoud"],
            "prijs"=>$row["bie_prijs"], "percentage"=>$row["bie_percentage"],"kleur"=>$row["kle_naam"], "streek"=>$row["str_naam"], "img"=>$row["bie_img"]];

        $bieren[] = $bier;
    }

    $result = array("results"=>$bieren);
    return $result;
}
?>
