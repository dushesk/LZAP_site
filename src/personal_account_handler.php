<?php
session_start();
require_once 'config.php'; // Подключение файла конфигурации

// Выход пользователя
if (isset($_POST['log_out'])) {
    setcookie('user_name', "", -1000);
    header("Location: login_page.php");
    exit();
}

// Проверка авторизации пользователя
if (!isset($_COOKIE['user_name'])) {
    header("Location: login_page.php");
    exit();
}

// Получаем информацию о пользователе из базы данных
$user_name = $_COOKIE['user_name'];

$query = $con->prepare("SELECT role_name FROM users NATURAL JOIN roles WHERE user_name=?");
if ($query === false) {
    die('Prepare failed: ' . htmlspecialchars($con->error));
}
$query->bind_param("s", $user_name);
if ($query->execute() === false) {
    die('Execute failed: ' . htmlspecialchars($query->error));
}

$query->bind_result($role);
$query->fetch();
$query->close();


if ($role == 'employee'){
    // Использование параметризованного запроса для предотвращения SQL-инъекций
    $stmt = $con->prepare("SELECT * FROM employee_personal_info WHERE user_name = ?");
    $stmt->bind_param("s", $user_name);

    // Выполнение запроса
    $stmt->execute();
    $result = $stmt->get_result();

    // Закрытие соединения
    $stmt->close();
}


$con->close();

?>