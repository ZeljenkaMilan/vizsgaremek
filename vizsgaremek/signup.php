<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Signup</title>
</head>
<body>

<?php
require("php/connect.php");
?>

<header>
    <h1>Webshop</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="#products">Clothes</a>
        <a href="signup.php">Sign Up</a>
    </nav>
    <div class="cart-icon">
        <a href="billing.php">
            <i class="fas fa-shopping-cart"></i>
        </a>
    </div>
</header>
<h3>Signup</h3>

<form action="includes/formhandler_inc.php" method="post">
    <input type="text" name="name" placeholder="Name">
    <input type="tel" name="tel" placeholder="Phone number">
    <input type="text" name="email" placeholder="E-mail">
    <input type="text" name="adress" placeholder="Adress">
    <button>Signup</button>

</form>

<footer>
        <p>&copy; 2025 Webshop</p>
</footer>
</body>
</html>
