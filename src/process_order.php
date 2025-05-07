<?php
session_start();
try {
    // Connect to the database using PDO
    $pdo = new PDO('mysql:host=localhost;dbname=imagll0e_db', 'imagll0e_db', 'dass455HHH');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $user_name = $_SESSION['user_name'];
    $supplier_id = 3;

    // Подготовка SQL-запроса
    $stmt = $pdo->prepare("
        SELECT s.supplier_id
        FROM suppliers s
        JOIN users u ON s.user_id = u.user_id
        WHERE u.user_name = :user_name
    ");
    
    // Выполнение запроса с привязкой параметра
    $stmt->execute(['user_name' => $user_name]);
    
    // Получение результата
    $supplier_id = $stmt->fetchColumn();

    $order_date = date('Y-m-d');
    $delivery_date = date('Y-m-d', strtotime('+7 days'));  // Example: delivery in 7 days

    // Insert new order
    $stmt = $pdo->prepare("INSERT INTO orders (supplier_id, order_date, delivery_date) VALUES (?, ?, ?)");
    $stmt->execute([$supplier_id, $order_date, $delivery_date]);
    $order_id = $pdo->lastInsertId();

    // Insert order products
    foreach ($_POST['quantity'] as $product_id => $quantity) {
        if ($quantity > 0) {
            $stmt = $pdo->prepare("INSERT INTO order_products (order_id, product_id, quantity_ordered) VALUES (?, ?, ?)");
            $stmt->execute([$order_id, $product_id, $quantity]);
        }
    }

    // Redirect to a success page (or display a success message)
    header("Location: ../public/pages/personal_account.php");
    exit();
} catch (PDOException $e) {
    // Handle database errors
    echo "Error: " . $e->getMessage();
}



?>
