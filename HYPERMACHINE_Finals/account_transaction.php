<?php 
    session_start();
    
    require("include/head.inc");
    require("include/navlogin.inc");
    require("include/home_bg.inc");
    require_once('database/pokeconnect.php');
    require('database/pokeget.php');

    if (isset($_SESSION['order'])) {
        if (isset($_SESSION['order'])) {
        $cart = $_SESSION['order'];
        $total = $_SESSION['total'];
        $email = $_SESSION['email'];
        $date = date('Y-m-d');
        $isFirstIteration = true;
        if (!isset($_SESSION['first'])){
            $_SESSION['first'] = $isFirstIteration;
        }
        foreach ($orrows as $row) {
            $orderid = $row['order_id'];
        }
            if ($isFirstIteration) {
                $cartUp = "UPDATE pokeorder SET items = '$cart', total = '$total', order_date = '$date' WHERE order_id = '$orderid'";
                $upResult = $conn->query($cartUp);
                
                $_SESSION['order_inserted'] = true;
            }
            if (isset($_SESSION['new_row'])) {
                $new_orderid = $_SESSION['new_id'];
                $cartUp = "UPDATE pokeorder SET items = '$cart', total = '$total', order_date = '$date' WHERE order_id = '$new_orderid'";
                $upResult = $conn->query($cartUp);
                
                $_SESSION['order_inserted'] = true;
                unset($_SESSION['new_row']);
            }
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

    .acc-orders-item p {
        margin-bottom: 4px;
    }

    .acc-orders-item {
        margin-bottom: 20px;
        padding-bottom: 20px;
    }

    .order-items {
        padding-left: 30px;
        margin-bottom: 4px;
        list-style-type: none;
    }

    .order-items span {
        font-weight: bold;
    }
</style>

<div class="container flex-1 w-80">
    <div class="account-screen">
        <div class="row bl-ul"><h1>Account</h1></div>
        <div class="row">
            <div class="col-3 mt-4 bl-rl">
                <div class="side-col-item">
                    <a href="account_info.php">Account Details</a>
                </div>
                <div class="side-col-item">
                    <a href="account_transaction.php" style="text-decoration: underline;">Transaction History</a>
                </div>
            </div>

            <div class="col mt-4 acc-orders">
                <?php foreach ($orrows as $row) :
                    if ($row['items'] != "") { ?>
                        <div class="acc-orders-item bl-ul">
                            <h5>Order #<?php echo $row['order_id'];?></h5>
                            <p>Date: <?php echo $row['order_date']; ?></p>
                            <p>Items:</p>
                            <ul class="order-items">
                                    <li>
                                        <span><?php echo $row['items'];?></span>
                                    </li>
                            </ul>
                            <p>Total: <?php echo $row['total'];?><img src="img/pkcoins.webp" width="21" height="20"></p>
                        </div>
                <?php }
                endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php 
    require("include/foot.inc");
?>