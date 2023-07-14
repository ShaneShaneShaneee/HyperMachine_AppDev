<?php
    require_once('pokeconnect.php');
    require_once('pokeget.php');
    if (isset($_POST['password']) && isset($_POST['npassword']) && isset($_POST['cpassword']) && isset($_POST['email']) ) {
        $email = $_POST['email'];
        $pass = mysqli_query($conn, "SELECT pass FROM pokeusers WHERE email = '$email'");
        foreach ($pass-> fetch_array () as $x => $y){
            $row[$x] = $y;
        };

        $password = $_POST['password'];
        $npassword = $_POST['npassword'];
        $cpassword = $_POST['cpassword'];

        if ($password == $npassword) {
            echo "New password cannot be the same as the current password";
        } elseif ($password != $y) {
            echo "Then current password you entered is incorrect";
        } elseif ($npassword != $cpassword) {
            echo "Passwords do not match. Please try again";
        } elseif ($npassword == $cpassword) {
            $query = "UPDATE pokeusers SET pass = '$npassword' WHERE email = '$email'";
            $result = $conn->query($query);
            if($result){
                echo "Password changed successfully";
                header("Location: ../login.php");
            } else {
                echo "Failed to change password";
            }
        }
    } else {
        $deleteQuery = "DELETE FROM pokeusers WHERE email = '$email'";
            $deleteResult = $conn->query($deleteQuery);
            
            if ($deleteResult) {
                echo "Account deleted successfully.";
                // Redirect to a desired page after successful deletion
                header("Location: ../login.php");
                exit();
            } else {
                echo "Failed to delete the account.";
            }
        }

    //ITO YUNG ORIGINAL
?>