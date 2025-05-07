<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Отправка на почту
    $to = $_POST['mail'];
    $subject = "Подписка на новости";
    $message = "Теперь вы сможете следить за нашими актуальными новостями!";

    // Опциональные заголовки
    $headers = "From: imagll0e@littledoghotel.ru\r\n";
    $headers .= "Reply-To: ".$to."\r\n";
    $headers .= "X-Mailer: PHP/".phpversion();

    // Отправка письма
    if (!mail($to, $subject, $message, $headers)) {
        echo "Ошибка отправки письма на адрес ".$to;
    }
    
    //header("Location: ../public/index.php");
    //exit;
}

?>