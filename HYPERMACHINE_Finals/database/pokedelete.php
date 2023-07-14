<?php
require_once('pokeconnect.php');
require_once('pokeget.php');

if (isset($_POST['igid-1']) && isset($_POST['igid-2']) && isset($_POST['igid-3']) && isset($_POST['email']) && isset($_POST['password'])) {
    $igid1 = $_POST['igid-1'];
    $igid2 = $_POST['igid-2'];
    $igid3 = $_POST['igid-3'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Verify if the Player ID, email, and password match
    $verifyQuery = "SELECT * FROM pokeusers WHERE player_id = '$igid1-$igid2-$igid3' AND email = '$email' AND pass = '$password'";
    $result = $conn->query($verifyQuery);
    
    if ($result && $result->num_rows > 0) {
        // Delete the account from the database
        $deleteQuery = "DELETE FROM pokeusers WHERE player_id = '$igid1-$igid2-$igid3' AND email = '$email'";
        $deleteResult = $conn->query($deleteQuery);
        
        if ($deleteResult) {
            echo "Account deleted successfully.";
            // Redirect to a desired page after successful deletion
            header("Location: ../login.php");
            exit();
        } else {
            echo "Failed to delete the account.";
        }
    } else {
        echo "Invalid Player ID, email, or password.";
    }
} else {
    echo "Error: Please provide the required information.";
}
?>