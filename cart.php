<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart</title>
    <link rel="stylesheet" href="cart.css">

</head>
<header>
    <ul class="header-item-container"><a href="index.html"><img id="logo" src="media/logo.png"></a></ul>

    <ul class="header-item-container2">
        <a class="link" href="index.html">Home</a>
        <a class="link" href="about.html">About</a>
        <a class="link" href="menu.php">Menu</a>
        <a class="link" href="contact.html">Contact</a>
        <a  id="here" class="link" href="cart.php">Cart</a>
    </ul>
</header>


<body>
<h2>Your Cart</h2>

<?php
if (empty($_SESSION['cart'])) {
    echo "<p>Your cart is empty.</p>";
    echo "<a href='menu.php'>Back to Menu</a>";
} else {
    $total = 0;

    echo "
    <table border='1' cellpadding='10' cellspacing='0'>
        <tr>
            <th>Item</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>
    ";

    foreach ($_SESSION['cart'] as $id => $item) {
        $subtotal = $item['price'] * $item['quantity'];
        $total += $subtotal;

        echo "
        <tr>
            <td>{$item['title']}</td>
            <td>R{$item['price']}.00</td>
            <td>{$item['quantity']}</td>
            <td>R{$subtotal}.00</td>
            <td>
                <form action='remove_from_cart.php' method='POST'>
                    <input type='hidden' name='id' value='{$id}'>
                    <button type='submit' class='btn-remove'>✖</button>
                </form>
            </td>
        </tr>
        ";
    }

    // Add total row at the bottom
    echo "
        <tr>
            <td colspan='4' style='text-align:right; font-weight:bold;'>Total</td>
            <td colspan='2' style='font-weight:bold;'>R{$total}.00</td>
        </tr>
    </table>

    <div>
    <form action='clear_cart.php' method='POST'>
        <button type='submit' class='btn-clear'>Clear Cart</button>
   
    
        </form>
<a class='btn-checkout' href='menu.php'>Continue Shopping</a>

        <form action='checkout.php' method='POST'>
    <button type='submit' class='btn-checkout'>Checkout</button>
</form>
    </div>  
    ";
}
?>
</body>

<footer>
    <section class="section-1">
        <p class = "footer-item">VAAL UNIVERSITY OF TECHNOLOGY CAFETERIA</p>
    </section>

    <section class="section-2">
        <p class="footer-item">Address<br>
            Andries Potgieter Boulevard<br>
            Vanderbijlpark<br>
            1911<br>
            South Africa
        </p>
    </section>

    <section class="section-2">
        <p class = "footer-item">CONTACT<br>
            vutcafe@vut.ac.za<br>
            +27 67 993 3441</p>
    </section>

    <section class="section-2">
        <p class = 'footer-item'>Follow us on social media:</p>
        <div class="icons">
            <a href="#"><i class="fab fa-facebook-f"></i> VUT Cafeteria</a><br>
            <a href="#"><i class="fab fa-instagram"></i> vut_cafeteria</a><br>
            <a href="#"><i class="fab fa-twitter"></i> vut_cafeteria</a>
        </div>
    </section>

    <hr>

    <section class="section-4">
        <p id = "copywrite" class = "footer-item">© 2025 VUT CAFE</p>
    </section>
</footer>
</html>
