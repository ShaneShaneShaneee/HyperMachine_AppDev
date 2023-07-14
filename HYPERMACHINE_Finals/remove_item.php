<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item = $_POST['item'];

    // Remove the item from the session cart
    if (($key = array_search($item, $_SESSION['cart'])) !== false) {
        unset($_SESSION['cart'][$key]);
    }

    echo "Item removed";
}
?>
