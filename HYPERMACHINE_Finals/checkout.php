<?php 
    session_start();
    
    require("include/head.inc");
    require("include/navlogin.inc");
    require("include/home_bg.inc");
    require_once("database/pokeconnect.php");

    $result = mysqli_query($conn, "SELECT * from pokeitems");
    if (!$result) { die("Query Failed."); }
    $items = [];
    while ($row = mysqli_fetch_array($result)) {
        $items[] = $row;
    }
?>

<style>
    .checkout_wrapper {
        margin-top: 30px;
    }
    .checkout_header{
        text-align: center;
        padding: 30px 0;
        color: white;
        background-image: linear-gradient(to bottom right, #a9e092, #35918e);
        border-top-right-radius: 15px;
        border-top-left-radius: 15px;
    }
    .checkout_header h1 {
        font-size: 42px;
        margin: 0;
    }

    h2 {
        margin: auto;
        font-size: 24px;
        font-weight: bold;
        background-image: linear-gradient(to bottom right, rgba(255, 255, 255, .8), rgba(238, 252, 234, .8));
        padding: 10px;
        border-radius: 30px;
    }

    .items {
        display: flex;
        flex-wrap: wrap;
        justify-content: center; 
        background-image: linear-gradient(to bottom right, rgba(255, 255, 255, .8), rgba(238, 252, 234, .8));
        padding: 20px;
    }
    
    .items ul {
        margin: 20px;
        padding: 0;
        list-style-type: none;
        columns: 2;
        column-gap: 20px;
        text-align: right; 
        font-size: 16px;
    }

    @media(max-width: 840px) {
        .items ul {
            -webkit-column-count: 1;
            -moz-column-count: 1;
            column-count: 1;
        }
    }

    .items li {
        margin-bottom: 20px;
    }
    
    .checkout {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 10px 20px; 
        background-image: linear-gradient(to bottom right, rgba(255, 255, 255, .8), rgba(238, 252, 234, .8));
        margin-bottom: 30px;
        border-bottom-right-radius: 15px;
        border-bottom-left-radius: 15px;
    }
    
    .checkout form {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }
    
    .checkout label {
        font-weight: bold;
        font-size: 20px;
        margin-bottom: 10px;
    }
    
    .checkout input[type="tel"] {
        padding: 10px;
        border-radius: 30px;
        border: 1px solid #ccc;
        width: 300px !important;
        margin-bottom: 10px;
    }
    
    .checkout button[type="submit"] {
        padding: 10px 20px;
        background-color: #32908d;
        color: #f4f8f6;
        border: 4px white outset;
        border-radius: 30px;
        cursor: pointer;
        font-weight: bold;
        text-decoration: none;
        font-size: 24px;
    }
    
    .checkout button[type="submit"]:hover {
        color: #35918e;
        border: 4px white inset;
    }
    
    
    .checkout button {
        margin:auto;
    }
    
    button{
        margin-left: 10px;
        background-image: linear-gradient(to bottom right, #a9e092, #35918e);
        border-radius: 30px;
        border: none;
        color: #f4f8f6;
        
    }
    
    button:hover{
        color: #35918e;
    }
    
    
</style>

<?php
// Check if the cart array exists in the session
if (!isset($_SESSION['cart'])) {
    header("Location: index.php");
    exit();
}

// Process the checkout and clear the cart after successful checkout
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $gcashNumber = $_POST['gcash_number'];

    // Clear the cart after successful checkout
    $_SESSION['cart'] = array();

    exit();
}
?>

<!-- Display the items in the cart for review -->
<div class="container flex-1 w-80">
    <div class ="checkout_wrapper">
        <div class ="checkout_header">
            <h1>CART ITEMS</h1>
        </div>
    <div class="items">
        <ul>
            <?php
            $total = 0; 
            foreach ($_SESSION['cart'] as $item): ?>
                <?php $itemDetails = getItemDetails($item, $items);
                $total += $itemDetails['price']; ?>
                <li><?= $itemDetails['name'] ?> - <?= $itemDetails['price']?> <img src="img/pkcoins.webp" width="21" height="20">
                    <button onclick="removeItem('<?= $item ?>')">Remove</button>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

         <!-- Proceed to complete the checkout -->
        <div class="checkout">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <h2>Total: <?php echo $total; ?></h2>
                <label for="gcash_number">GCash Number:</label>
                <input type="tel" name="gcash_number_form" id="gcash_number_form" onkeyup="formatContactNumber(this)" maxlength="11" minlength="11" placeholder="09XXXXXXXXX" required>
                <button type="submit" onclick="deleteAll()"><a class="nav-link" href="complete.php">Complete Checkout</a></button>
            </form>
        </div>
    </div>
</div>
<div class="foot">  
    <?php 
        require("include/foot.inc");
    ?>
</div>  

<script>
    function removeItem(item) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "remove_item.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                window.location.reload();
            }
        };
        xhr.send("item=" + item);
    }

    function deleteAll() {

        <?php
            foreach ($_SESSION['cart'] as $item) {
                 $itemDetails = getItemDetails($item, $items);
                 $order[] = $itemDetails["name"];
             }
             $items = implode("<br>", $order);
             $_SESSION['order'] = $items; 
         ?>

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "delete_all_items.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            window.location.href = "complete.php";
        }
    };
    xhr.send();
}
</script>


<!-- Function to get item details from the items array -->
<?php
function getItemDetails($itemName, $itemArray) {
    foreach ($itemArray as $item) {
        if ($item['name'] === $itemName) {
            return $item;
        }
    }

    return null;
}
?>
<?php
$_SESSION['total'] = $total;
?>

