<?php
// Database configuration
$dsn = "mysql:host=localhost;dbname=webshop;charset=utf8mb4"; // Data Source Name
$username = "root"; // MySQL username
$password = ""; // MySQL password

try {
    // Create a PDO instance
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle connection errors
    echo "Connection failed: " . $e->getMessage();
    exit();
}

// Fetch product names from the database (optional: you can modify this to fetch all products)
try {
    // SQL query to fetch product names (assuming the products table is named "termekek")
    $sql = "SELECT nev FROM termekek LIMIT 2"; // You can change the LIMIT based on your needs
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Fetch results as an associative array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Assign product names to variables (adjust the index as per the result)
    $name1 = isset($products[0]['nev']) ? $products[0]['nev'] : 'Product 1'; // Default if not found
    $name2 = isset($products[1]['nev']) ? $products[1]['nev'] : 'Product 2'; // Default if not found
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    // Provide default names if the query fails
    $name1 = 'Product 1';
    $name2 = 'Product 2';
}

// Handle form submission (if the form is submitted via POST for user sign-up)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Sanitize and retrieve form data
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');

        // Validate required fields
        if (empty($name) || empty($email)) {
            echo "Please fill in both name and email.";
            exit();
        }

        // Prepare SQL query to insert the data into the "vasarlok" table
        $sql = "INSERT INTO vasarlok (nev, email) VALUES (:name, :email)";
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);

        // Execute the query
        if ($stmt->execute()) {
            // Redirect with success message after successful sign-up
            header("Location: index.php?message=signup_success");
            exit();
        } else {
            echo "Error: Unable to save data.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); // Handle database errors
    }
}
?>
