<?php 
    session_start();
    require("include/head.inc");
    require("include/navlogin.inc");
    require("include/home_bg.inc");
    require_once('database/pokeconnect.php');
    require_once('database/pokeget.php');

    $dateTime = date("F j, Y, g:i a"); // Get the current date and time
    $total = $_SESSION['total'];
?>
<style>
    .receipt-card {
        margin: 6.25rem auto;
        width: 60%;
        background-color: #fff;
        border-radius: 15px;
        text-align: center !important;
    }

    .receipt-header {
        text-align: center;
        padding: 20px 0;
        color: white;
        background-image: linear-gradient(to bottom right, #a9e092, #35918e);
        border-top-right-radius: 15px;
        border-top-left-radius: 15px;
    }

    .receipt-header h1 {
        font-size: 42px;
        margin: 0;
    }

    .receipt-body {
        padding: 20px 0px;
    }

    .date-time {
        font-size: 16px;
        margin-bottom: 0;
        color: #ebedec;
    }

    .total {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .receipt-pic-body img {
        max-width: 70%;
        height: auto;
    }

    .goback button[type="submit"] {
        padding: 10px 20px;
        background-image: linear-gradient(to bottom right, #a9e092, #35918e);
        color: #f4f8f6 ;
        border: 4px white outset;
        border-radius: 30px;
        cursor: pointer;
        font-weight: bold;
        text-decoration: none !important;
        font-size: 24px;
        margin: 10px 10px;
    }
    
    .goback button[type="submit"]:hover {
        color: #35918e;
        border: 4px white inset;
    }

    .goback a {
        text-decoration: none;
        color: inherit;
    }
</style>

<div class="container flex-1">
    <div class="receipt-card w-80">
        <div class="receipt-header">
            <h1>THANK YOU!</h1>
            <p class="date-time"><?php echo $dateTime; ?></p>
        </div>
        <div class="receipt-body">
            <div class ="receipt-statement">
                <h3>Your transaction was successful</h3>
                <p class="total">Total: <?php echo $total; ?></p>
                <div class="receipt-pic-body">
                    <img src="https://i.postimg.cc/bwhmCzJh/ash.png" alt="pikachu-bye"/>
                </div>
                <h4>Go catch them all trainer!</h4>
                <div class="goback">
                    <button type="submit" onclick="addOrder()"><a class="back-button" href="index.php">Continue Shopping</a></button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="foot">  
    <?php 
        require("include/foot.inc");
    ?>
</div>
<script>
    function addOrder() {
        <?php
            if (!isset($_SESSION['new_row']) && isset($_SESSION['first'])) {
                $orderQuery = "INSERT INTO pokeorder (email) VALUES ('$email')";
                $insertResult = $conn->query($orderQuery);
                if ($insertResult) {
                    $norderid = $conn->insert_id;
                    $_SESSION['new_id'] = $norderid;
                }
                unset($_SESSION['order_inserted']);
                $_SESSION['new_row'] = true;
            }  
        ?>
    }
</script>