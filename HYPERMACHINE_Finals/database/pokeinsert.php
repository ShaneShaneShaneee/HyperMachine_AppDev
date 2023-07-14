 <?php
    session_start();
    require_once('pokeconnect.php');
        $igid_1 = $_POST["igid-1"];
        $igid_2 = $_POST["igid-2"];
        $igid_3 = $_POST["igid-3"];
        $igid_4 = "$igid_1-$igid_2-$igid_3";
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $query = "SELECT email FROM pokeusers WHERE email = '$email'";
        $result = mysqli_query($conn, $query);

            if (!preg_match("/^([a-zA-Z]+[a-zA-Z0-9_\.]*[a-zA-Z0-9]+)@(pokemail).com$/", $_POST['email'])) {
                $_SESSION['invalid_email'] = "Invalid Email";
            }
            if ($password != $confirmPassword){
                $_SESSION['invalid_pass'] = "Passwords do not match";
            }

            if (mysqli_num_rows($result) > 0) {
                $_SESSION['email_exists'] = "Email already exists";
            } 

            if (isset ($igid_4)){
                $_SESSION['pokeid'] = $igid_4;
            }


    if (isset($_SESSION['invalid_email']) || isset($_SESSION['invalid_pass']) || isset($_SESSION['email_exists'])) {
         header("Location: ../signup.php");
        }
    else{
        // Insert the data into the database
        $insertQuery = "INSERT INTO pokeusers (player_id, email, pass) VALUES ('$igid_4', '$email', '$password')";
        $insertResult = $conn->query($insertQuery);


    // Check if the query was successful
            if(!$insertResult){
                die("Query failed: " . $conn->error);
            }else{
                // Redirect to login.php
                header("Location: ../login.php");
                exit();
            }
        }

?>