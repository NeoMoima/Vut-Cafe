<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$id = $_POST['id'];
$title = $_POST['title'];
$price = $_POST['price'];
$img = $_POST['img'];

// If item already exists in cart, just increase quantity
if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['quantity']++;
} else {
    $_SESSION['cart'][$id] = [
        'title' => $title,
        'price' => $price,
        'img' => $img,
        'quantity' => 1
    ];
}

header("Location: cart.php");
exit();
?>
