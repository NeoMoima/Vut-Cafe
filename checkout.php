<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="cart.css" />

    <style>
        .btn-checkout,
.btn-continue-shopping,
.btn-checkout{
    background-color: transparent;
    border: solid black 1px;
    padding-inline: 15px;
    border-radius: 20px;
}
    </style>
</head>
<body>

    <!-- HEADER -->
    <header>
        <ul class="header-item-container"><a href="index.php"><img id="logo" src="media/logo.png" alt="VUT Logo"></a></ul>
        <ul class="header-item-container2">
            <a class="link" href="index.php">Home</a>
            <a class="link" href="about.html">About</a>
            <a class="link" href="menu.php">Menu</a>
            <a class="link" href="contact.html">Contact</a>
            <a id="here" class="link" href="cart.php">Cart</a>
        </ul>
    </header>

    <main>
        <!-- PAGE TITLE / BANNER -->
        <section class="top-banner">
            <h1>CHECKOUT</h1>
            <p>------------------------------------------------------------------</p>
        </section>

        <!-- CHECKOUT CONTENT -->
        <section class="checkout-section">

            <?php
            if (empty($_SESSION['cart'])) {
                echo "<p>Your cart is empty.</p>";
                echo "<a class='cta-btn' href='menu.php'>Back to Menu</a>";
            } else {
                $total = 0;

                echo "<div class='checkout-container'>";

                // Left column: Cart items
                echo "<div class='checkout-left'>";
                echo "<h2>Your Cart</h2>";
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

                // Total row
                echo "
                    <tr>
                        <td colspan='3' style='text-align:right; font-weight:bold;'>Total</td>
                        <td colspan='2' style='font-weight:bold;'>R{$total}.00</td>
                    </tr>
                </table>
                ";

                // Checkout and Clear Cart Buttons
                echo "
                <div class='checkout-buttons'>
                    
                    <form action='clear_cart.php' method='POST' style='display:inline-block;'>
                        <button type='submit' class='btn-clear'>Clear Cart</button>
                    </form>
                    <a class='btn-checkout' href='menu.php'>Continue Shopping</a>
                    <form action='checkout_email.php' method='POST' style='display:inline-block; margin-right:10px;'>
                        <button type='submit' class='btn-clear'>Checkout</button>
                    </form>
                    
                </div>
                ";

                echo "</div>";

               

                echo "</div>"; // end checkout-container
            }
            ?>
        </section>
    </main>

    <!-- FOOTER -->
    <footer>
        <section class="section-1">
            <p class="footer-item">VAAL UNIVERSITY OF TECHNOLOGY CAFETERIA</p>
        </section>
        <section class="section-2">
            <p class="footer-item">Address<br>
            Andries Potgieter Boulevard<br>
            Vanderbijlpark<br>
            1911<br>
            South Africa</p>
        </section>
        <section class="section-2">
            <p class="footer-item">CONTACT<br>
            vutcafe@vut.ac.za<br>
            +27 67 993 3441</p>
        </section>
        <section class="section-2">
            <p class="footer-item">Follow us on social media:</p>
            <div class="icons">
                <a href="#"><i class="fab fa-facebook-f"></i> VUT Cafeteria</a><br>
                <a href="#"><i class="fab fa-instagram"></i> vut_cafeteria</a><br>
                <a href="#"><i class="fab fa-twitter"></i> vut_cafeteria</a>
            </div>
        </section>
        <hr>
        <section class="section-4">
            <p id="copywrite" class="footer-item">© 2025 VUT CAFE</p>
        </section>
    </footer>

</body>
</html>
