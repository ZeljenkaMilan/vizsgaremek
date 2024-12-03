<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Signup</title>
</head>
<body>

<header>
        <h1>Webshop</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="#clothes">Clothes</a>
            <a href="signup.php">Sign Up</a>
        </nav>
    </header>

<h3>Signup</h3>

<form action="includes/formhandler_inc.php" method="post">
    <input type="text" name="name" placeholder="Name">
    <input type="tel" name="tel" placeholder="Phone number">
    <input type="text" name="email" placeholder="E-mail">
    <input type="text" name="adress" placeholder="Adress">
    <button>Signup</button>

</form>
</body>
</html>