<?php
include '../../src/personal_account_handler.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>

    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
      data-tag="font"
    />
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/personal_account.css">

    <script src="../js/lk_ajax.js"></script>
</head>
<body>
    <header data-role="Header" class="home-header max-width-container">
        <div class="home-navbar1">
            <a class="home-logo-center navbar-logo-title" href="../index.php">
                <span class="home-text">Лысьвенский завод<br><br>эмалированной посуды</span>
            </a>
            <div class="home-middle">
                <div class="home-right">
                    <p>Личный кабинет <br> <?php echo 'логин: '.$user_name ?></p>
                    <form action="personal_account.php" method="post">
                        <button type="submit" name="log_out" class="button">Выйти</button>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <div class="conteiner">
        <div class="wrap_account" id="account_container">
            <?php 
                switch ($role) {
                    case 'admin':
                        include '../components/lk_admin.php';
                        break;
                    case 'supplier':
                        include '../components/lk_supplier.php';
                        break;
                    default:
                        include '../components/lk_employee.php';
                        break;
                }
            ?>
        </div>
    </div>
</body>
</html>
