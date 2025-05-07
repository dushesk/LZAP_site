<?php
require_once 'config.php';

$user_name = $_SESSION['user_name'];
$old_pass = $_GET['old'];
$new_pass = $_GET['new'];

$sql = "SELECT user_password FROM users WHERE user_name='$user_name'";
$res_pass = $con->query($sql);

$cur_pass = $res_pass->fetch_row()[0];

if ($cur_pass == $old_pass){
    // Подготовленный запрос для обновления пароля
    $stmt = mysqli_prepare($con, 'UPDATE users SET user_password = ? WHERE user_name = ?');

    // Привязываем параметры
    mysqli_stmt_bind_param($stmt, 'ss', $new_pass, $user_name);

    // Выполняем запрос
    if (mysqli_stmt_execute($stmt)) {
        echo 'Пароль успешно изменен.';
    } else {
        echo 'Ошибка при изменении пароля: ' . mysqli_error($con);
    }

    // Закрываем подготовленный запрос
    mysqli_stmt_close($stmt);
}
else{
    echo "Неверный старый пароль";
}


// Закрытие соединения
$con->close();
?>
