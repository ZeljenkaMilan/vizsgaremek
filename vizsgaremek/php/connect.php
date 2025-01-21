<?php
// Database configuration
$dsn = "mysql:host=localhost;dbname=webshop;charset=utf8mb4"; // Data Source Name
$username = "root"; // MySQL username
$password = ""; //  MySQL password

try { 
    // Create a PDO instance
    $pdo = new PDO($dsn, $username, $password);
    
    // Set PDO error mode to exception for better error handling
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //echo "Connected successfully"; 
} catch (PDOException $e) {
    // Handle connection errors
    echo "Connection failed: " . $e->getMessage();
}


try {

    // Create a PDO instance
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // The IDs (azon values from database) to fetch
    $id1 = 1; 
    $id2 = 2; 

    // SQL query to fetch specific rows based on azon
    $sql = "SELECT nev FROM termekek WHERE azon IN (:id1, :id2)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id1', $id1, PDO::PARAM_INT);
    $stmt->bindParam(':id2', $id2, PDO::PARAM_INT);
    $stmt->execute();

    // Fetch results as an associative array
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Extract names or set fallback values
    $name1 = isset($results[0]['nev']) ? $results[0]['nev'] : "No data found for ID $id1";
    $name2 = isset($results[1]['nev']) ? $results[1]['nev'] : "No data found for ID $id2";
} catch (PDOException $e) {
    $name1 = $name2 = "Error: " . $e->getMessage(); // Display error 
}


// Putting the signup form data into database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Retrieve and sanitize form data
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
        $tel = htmlspecialchars($_POST['tel'], ENT_QUOTES, 'UTF-8');
        $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $adress = htmlspecialchars($_POST['adress'], ENT_QUOTES, 'UTF-8');

        // Validate required fields
        if (empty($name) || empty($email) || empty($adress)) {
            echo "Please fill in all required fields.";
            exit();
        }

        // Prepare SQL query for inserting into the vasarlok table
        $sql = "INSERT INTO vasarlok (nev, telefon, email, cim) VALUES (:name, :tel, :email, :adress)";
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':adress', $adress, PDO::PARAM_STR);

        // Execute the query
        if ($stmt->execute()) {
            // Redirect with success message
            header("index.php?message=signup_success");
            exit();
        } else {
            echo "Error: Unable to save data.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); // Handle database errors
    }
}
?>
