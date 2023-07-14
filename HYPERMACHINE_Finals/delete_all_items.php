<?php
session_start();

// Clear the cart by assigning an empty array to $_SESSION['cart']
$_SESSION['cart'] = array();

// Send a response to indicate successful removal
echo "All items removed from the cart";
?>