<?php 
    require_once('pokeconnect.php');
    $email = $_SESSION['email'];
    $query = "SELECT * FROM pokeusers";
    $orquery = "SELECT * FROM pokeorder where email = '$email'";

    $result = $conn->query($query);
    $orresult = $conn->query($orquery);

    if(!$result){
        die ("Query failed: " . $conn->error);
    } else {
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $orrows = $orresult->fetch_all(MYSQLI_ASSOC);
    }
?>