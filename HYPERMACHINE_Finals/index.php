<?php 
    session_start();
    if (!isset($_SESSION["email"])) {
  header("Location: login.php");
  exit;
    }

    require("include/head.inc");
    require("include/navlogin.inc");
    require("include/home_bg.inc");
    require_once("database/pokeconnect.php");
?>

<style>
    .w-80 {
        background-image: linear-gradient(to bottom right, rgba(255, 255, 255, .8), rgba(238, 252, 234, .8));
    }

    .item-screen {
        padding-bottom: 30px;
        display: flex;
        justify-content: center;
        flex-flow: row wrap;

    }

    .item-card {
        margin: 30px 10px 0;
        position: relative;
        text-align: center;
        width: 200px;
        background-image: linear-gradient(to bottom right, #a5d892, #32908d);
        border-radius: 5px;
        padding-top: 130px;
        padding-bottom: 5px;
        border: none;
        box-shadow: none;
    }

    .item-card:hover {
        box-shadow: 0px 0px 0px 5px #fff;
    }

    .item-img {
        position: absolute;
        top: 1%;
        left: 20%;
    }

    .item-card .card-inner {
        color: #475d5e;
        margin: 0px 5px;
        padding: 22px 5px 10px;
        border-radius: 5px;
        background-image: linear-gradient(to bottom right, #f4f8f6, #cdf3eb);
    }

    .item-card .card-price {
        width: 150px;
        margin: auto;
        padding: 5px 0px;
        font-weight: bold;
        border-radius: 5px;
        background-color: #d2e8d1;
    }

    .card-price img {
        margin-right: 5px;
    }
</style>

<?php 

    // turn items table to items array
    $result = mysqli_query($conn, "SELECT * from pokeitems");
    if (!$result) { die("Query Failed."); }
    $items = [];
    while ($row = mysqli_fetch_array($result)) {
        $items[] = $row;
    }

    // Add item to cart
    if (isset($_POST['add_to_cart'])) {
        $selected_item = $_POST['item_id'];
        $_SESSION['cart'][] = $items[$selected_item]['name'];
    }
?>

<div class="container flex-1 w-80">
    <div class="item-screen">
        <?php foreach ($items as $key => $item) { ?>
            <form method="post">
                <button class="item-card" name="add_to_cart" type="submit">
                    <img class="item-img" src="<?= $item['img'] ?>" width="125" height="125">
                    <div class="card-inner">
                        <h5><?= $item["name"] ?></h5>
                        <div class="card-price">
                            <img src="img/pkcoins.webp" width="21" height="20"><?= $item["price"] ?>
                        </div>
                        <div class="add-cart">
                            <input type="hidden" name="item_id" value="<?= $key ?>">
                         </div>
                    </div>
                </button>
            </form>
        <?php } ?>
        <div class="payment">
        <form method="post" action="checkout.php">
            <input type="hidden" name="item_id" value="<?= $key ?>">
        </form>
        </div>
    </div>
</div>

<?php 
    require("include/foot.inc");
?>