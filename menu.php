<?php
include 'connection.php';
$sql = "SELECT item_id, title, price, img
        FROM item";

$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MENU</title>
    <link rel="stylesheet" href="index.css">

</head>
<header>
    <ul class="header-item-container"><a href="index.html"><img id="logo" src="media/logo.png"></a></ul>

    <ul class="header-item-container2">
        <a  class="link" href="index.html">Home</a>
        <a class="link" href="about.html">About</a>
        <a id="here" class="link" href="menu.php">Menu</a>
        <a class="link" href="contact.html">Contact</a>
        <a class="link" href="cart.php">Cart</a>
    </ul>
</header>

<body> <?php
        // Loop through each row and display as a card 
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                echo " <div class='card'> 
                            <img class='item-img' src='{$row['img']}'> 
                            <h class = 'title'>{$row['title']}</h> 
                            <p class = 'price'>R{$row['price']}.00</p> 

                            <form action='add_to_cart.php' method='POST'>
                                <input type = 'hidden' type='hidden' name='id' value='{$row['item_id']}'>
                                <input type = 'hidden' class= 'title' name='title' value='{$row['title']}'>
                                <input type = 'hidden' class = 'price' name='price' value='{$row['price']}'>
                                <button type='submit' class='btn-add'>Add to Cart</button>
                            </form>
                        </div> ";
            }
        } else {
            echo "<p>No items found.</p>";
        }
        $conn->close(); ?>
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