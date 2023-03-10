<?php
    // Blockonmics API stuff
    $apikey = "g5T8kWc2f2OAYICZrvezv2g18cZIK7Hs3Xer4Z5KSSk";
    $url = "https://www.blockonomics.co/api/";
    
    $options = array( 
        'http' => array(
            'header'  => 'Authorization: Bearer '.$apikey,
            'method'  => 'POST',
            'content' => '',
            'ignore_errors' => true
        )   
    );

    // Connection info
    $conn = mysqli_connect("localhost", "root", "", "db_shop"); // enter your info
?>