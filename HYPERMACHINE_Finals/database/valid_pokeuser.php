 <?php
    session_start();
    require_once('pokeconnect.php');

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $query = "SELECT email FROM pokeusers WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        $p_query = "SELECT pass FROM pokeusers WHERE email = '$email'";
        $p_result = mysqli_query($conn, $p_query);
        $idquery = "SELECT player_id FROM pokeusers WHERE email = '$email'";
        $idresult = mysqli_query($conn, $idquery);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($p_result);
            $storedPass = $row['pass'];
            $erow = mysqli_fetch_assoc($result);
            $storedemail = $erow['email'];
            $idrow = mysqli_fetch_assoc($idresult);
            $storedid = $idrow['player_id'];

            if ($pass === $storedPass) {
                // Password is correct
                if ($email === $storedemail && $pass === $storedPass) {
                    // Store the username in the session
                    $_SESSION['email'] = $email;

                    $_SESSION['id'] = $storedid;
                    $orderQuery = "INSERT INTO pokeorder (email) VALUES ('$email')";
                    $insertResult = $conn->query($orderQuery);

                header("Location: ../index.php");
            } else {
                // Password is incorrect
               $_SESSION['err_pass'] = "Incorrect Email or password";
            }
        } else {
            // Email does not exist in the database
             $_SESSION['no_email'] = "Invalid Email or Email does not exist";
        }
    if (isset($_SESSION['no_email']) || $_SESSION['err_pass']) {
         header("Location: ../login.php");
        }
    }
}
?>