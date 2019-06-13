<?php
class RESTClient
{
    var $base_url = "http://localhost/webshop/restapi/" ;
    var $responses = array();
    var $simple_response = "";

    function __construct()
    {
    }

    function CurlInit( $url )
    {
        $curl = curl_init( $url );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
        return $curl;
    }

    function CurlExec( $curl )
    {
        $curl_response = curl_exec( $curl );
        if ( $curl_response === false )
        {
            $info = curl_getinfo( $curl );
            die('error occured during curl exec. Additioanl info: ' . var_export( $info ) );
        }
        curl_close( $curl );
        return $curl_response;
    }

    function GET_Bieren()
    {
        $url = $this->base_url . "bieren" ;
        $curl = $this->CurlInit($url);
        $this->simple_response = $this->CurlExec( $curl );
    }

    function GET_Bier($id)
    {
        $url = $this->base_url . "bier/$id" ;
        $curl = $this->CurlInit($url);
        $this->simple_response = $this->CurlExec( $curl );
    }
/*
    function POST_Speler($naam)
    {
        $data = array( "naam" => $naam ) ;
        $url = $this->base_url . "spelers" ;
        $curl = $this->CurlInit( $url );
        curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, "POST" );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt( $curl, CURLOPT_POSTFIELDS, $data );
        $this->simple_response = $this->CurlExec( $curl );
    }
*/
    function DELETE_Bier( $id )
    {
        $url = $this->base_url . "bier/$id";
        $curl = $this->CurlInit( $url );
        curl_setopt( $curl, CURLOPT_CUSTOMREQUEST, "DELETE" );
        curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true);
        $this->simple_response = $this->CurlExec( $curl );
    }
}
?>