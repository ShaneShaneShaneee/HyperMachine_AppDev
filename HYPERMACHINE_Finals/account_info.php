<?php 
    session_start();
    
    require("include/head.inc");
    require("include/navlogin.inc");
    require("include/home_bg.inc");
    require("database/pokeget.php");

    if (isset($_SESSION['email']) && isset($_SESSION['id'])) {
        $pokemail = $_SESSION['email'];
        $pokeid = $_SESSION['id'];
        $query = "SELECT email FROM pokeusers WHERE email = '$pokemail'";
        $idquery = "SELECT player_id FROM pokeusers WHERE player_id = '$pokeid'";
        $result = mysqli_query($conn, $query);
        $idresult = mysqli_query($conn, $idquery);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $idrow = mysqli_fetch_assoc($idresult);
            $email = $row['email'];
            $id = $idrow['player_id'];
            }
        mysqli_free_result($result);
        } else {
            echo "Error executing the query: " . mysqli_error($conn);
        }
    }
    
?>

<style>
    .w-80 {
        background-image: linear-gradient(to bottom right, rgba(255, 255, 255, .8), rgba(238, 252, 234, .8));
    }

    .account-screen {
        padding: 10px 30px 20px;
    }

    h1 {
        color: #555;
    }

    .bl-ul {
        border-bottom: 2px solid #555;
    }

    .bl-rl {
        border-right: 2px solid #555;
    }

    .side-col-item {
        margin-bottom: 10px;
    }

    .side-col-item a {
        color: #555;
        text-decoration: none;
    }

    .acc-info div {
        margin-bottom: 20px;
    }

    .acc-chpass {
        color: #009575;
        text-decoration: none;
    }

    .acc-delacc {
        color: red;
        text-decoration: none;
    }
</style>

<div class="container flex-1 w-80">
    <div class="account-screen">
        <div class="row bl-ul"><h1>Account</h1></div>
        <div class="row">
            <div class="col-3 mt-4 bl-rl">
                <div class="side-col-item">
                    <a href="account_info.php" style="text-decoration: underline;">Account Details</a>
                </div>
                <div class="side-col-item">
                    <a href="account_transaction.php">Transaction History</a>
                </div>
            </div>
            <div class="col mt-4 acc-info">
                <div>
                    Email: <?php echo $email ?>
                </div>
                <div>
                    Player ID: <?php echo $id ?>
                </div>
                <div>
                    <a class="acc-chpass" href="modify.php">Change Password</a>
                </div>
                <div>
                    <a class="acc-delacc" href="delete.php">Delete Account</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    require("include/foot.inc");
?>