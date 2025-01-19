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
?>
