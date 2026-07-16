<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css" />
    <title>Confirm order</title>

    <style>
        body {vertical-align: middle;}
        .btn-checkout{text-align: center;
        vertical-align: middle;}




</style>


</head>
<body>

<form action="https://formsubmit.co/Thato.Apollo.Maake@gmail.com" method="POST">
    <!-- Hidden field to customize subject -->
    <input type="hidden" name="_subject" value="New Order from VUT Cafeteria Website">



    <!-- Cart items (hidden inputs for each item) -->
    <?php
    session_start();
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $id => $item) {
            echo '<input type="hidden" name="Item_' . htmlspecialchars($item['title']) . '" value="Quantity: ' . $item['quantity'] . ', Price: R' . $item['price'] . '.00">';
        }
    }
    ?>

    <!-- Total -->
    <input type="hidden" name="Total" value="<?php echo !empty($_SESSION['cart']) ? array_sum(array_map(function($i){return $i['price']*$i['quantity'];}, $_SESSION['cart'])) : 0; ?>">

    <!-- Submit button -->
    <button type="submit" class="btn-checkout">Confirm</button>
</form>
</body>
</html>