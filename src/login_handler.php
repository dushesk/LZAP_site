<?php
session_start();
require_once 'config.php'; // Подключение файла конфигурации

$time_cookie = 20000;
$error_message = '';

// Все названия ролей
$sql = "SELECT role_name FROM roles WHERE role_name <> 'admin'";
$roles = $con->query($sql);



if (isset($_COOKIE['user_name'])){
    header("Location: personal_account.php");
    exit();
}

if (isset($_POST['user_name'])) {
    // Получаем данные из формы
    $user_name = $_POST['user_name'];
    $user_password = $_POST['password'];

    // Защита от SQL-инъекций
    $user_name = mysqli_real_escape_string($con, $user_name);
    $user_password = mysqli_real_escape_string($con, $user_password);

    // Подготовленный запрос
    $stmt = $con->prepare("SELECT user_password FROM users WHERE user_name=?");

    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($con->error));
    }

    $stmt->bind_param("s", $user_name);

    if ($stmt->execute() === false) {
        die('Execute failed: ' . htmlspecialchars($stmt->error));
    }

    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Проверка пароля
        if ($user_password == $hashed_password) {
            $_SESSION['user_name'] = $user_name;
            
            // сохраняем в куки имя вошедшего пользователя
            setcookie('user_name', $user_name, time()+ $time_cookie); 
            header("Location: personal_account.php");
            exit();
        } else {
            $error_message = "Неправильный логин или пароль.";
        }
    } else {
        $error_message = "Неправильный логин или пароль.";
    }

    $stmt->close();
    $con->close();
}
?>