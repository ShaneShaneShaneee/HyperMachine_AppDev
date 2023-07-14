<?php
session_start();

if (!isset($_SESSION['new_row'])) {
    $_SESSION['new_row'] = true;
    unset($_SESSION['order_inserted']);
}

echo "Session variables updated successfully.";
?>
