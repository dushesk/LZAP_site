<?php
require_once 'config.php';

$val = $_GET['q'];

$user_name = $_SESSION['user_name'];

if ($val == 'emp_info'){
    // Использование параметризованного запроса для предотвращения SQL-инъекций
    $stmt = $con->prepare("SELECT * FROM employee_personal_info WHERE user_name = ?");
    $stmt->bind_param("s", $user_name);

    // Выполнение запроса
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Вывод данных пользователя
        $row = $result->fetch_assoc();
        echo "<h2>Информация о пользователе</h2>";
        echo "<p><strong>ID сотрудника:</strong> " . $row['employee_id'] . "</p>";
        echo "<p><strong>Имя пользователя:</strong> " . $row['user_name'] . "</p>";
        echo "<p><strong>Фамилия:</strong> " . $row['last_name'] . "</p>";
        echo "<p><strong>Имя:</strong> " . $row['first_name'] . "</p>";
        echo "<p><strong>Отчество:</strong> " . $row['middle_name'] . "</p>";
        echo "<p><strong>Дата рождения:</strong> " . $row['date_of_birth'] . "</p>";
        echo "<p><strong>Пол:</strong> " . $row['gender'] . "</p>";
        echo "<p><strong>Должность:</strong> " . $row['position_title'] . "</p>";
        echo "<p><strong>Отдел:</strong> " . $row['department_title'] . "</p>";
        echo "<p><strong>Дата приема на работу:</strong> " . $row['hire_date'] . "</p>";
        echo "<p><strong>Зарплата:</strong> " . $row['salary'] . "</p>";
        echo "<p><strong>Контактный номер:</strong> " . $row['contact_number'] . "</p>";
        echo "<p><strong>Адрес:</strong> " . $row['address'] . "</p>";
    } else {
        echo "Пользователь с логином '$user_name' не найден.";
    }

    $stmt->close();
}
else if ($val == 'emp_shift'){
    // Общее количество рабочих часов
    $stmt = $con->prepare("SELECT total_time_employee(?);");
    $stmt->bind_param("s", $user_name);
    // Выполнение запроса
    $stmt->execute();
    $result_total = $stmt->get_result();

    // Среднее количество рабочих часов
    $stmt = $con->prepare("SELECT avg_time_employee(?);");
    $stmt->bind_param("s", $user_name);
    // Выполнение запроса
    $stmt->execute();
    $result_avg = $stmt->get_result();

    $total_time = $result_total->fetch_row()[0];
    $avg_time = $result_avg->fetch_row()[0];

    echo "<strong>Общее количество рабочих часов: </strong>$total_time<br>";
    echo "<strong>Среднее количество рабочих часов: </strong>$avg_time";


    // Получение названий всех предметов из базы
    $stmt = $con->prepare("CALL attendance_employee(?)");
    $stmt->bind_param("s", $user_name);
    // Выполнение запроса
    $stmt->execute();
    $result_attendance = $stmt->get_result();

    echo "<h1>Смены</h1>";
    // Вывод оценок
    if ($result_attendance->num_rows>0){
        while ($shift = $result_attendance->fetch_row()){
            // Предполагаем, что $shift[0] содержит строку даты в формате 'YYYY-MM-DD'
            $dateString = $shift[0];
            
            // Используем DateTime для преобразования и форматирования даты
            $date = DateTime::createFromFormat('Y-m-d', $dateString);
            
            if ($date !== false) {
                echo '<strong>' . $date->format('d.m.Y') . '</strong> ' . $shift[1] . ' - ' . $shift[2] . '<br>';
            } else {
                echo 'Некорректная дата: ' . $shift[0] . '<br>';
            }
        }
    }
    else
        echo 'Смен нет.';

    $stmt->close();
}
else if ($val == 'sett'){
    echo 
    '<h1>Изменить пароль</h1>
    <form action="personal_account.php" name="log_in" method="post"> 
        <div class="input-pass">
            <label for="old_pass">Старый пароль</label>
            <input type="text" id="old_pass" name="old_pass" required>
        </div>
        <div class="input-pass">
            <label for="new_pass">Новый пароль</label>
            <input type="new_pass" id="new_pass" name="new_pass" required>
        </div>
        <button class="button text-center" type="button" onclick="change_pass()">Применить</button>
    </form>';
}
else if ($val == 'sup_info'){
    // Использование параметризованного запроса для предотвращения SQL-инъекций
    $stmt = $con->prepare("SELECT * FROM suppliers NATURAL JOIN users WHERE user_name = ?");
    $stmt->bind_param("s", $user_name);

    // Выполнение запроса
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Вывод данных пользователя
        $row = $result->fetch_assoc();
        echo "<h2>Информация об организации</h2>";
        echo "<p><strong>ID сотрудника:</strong> " . $row['supplier_id'] . "</p>";
        echo "<p><strong>Название:</strong> " . $row['name_supplier'] . "</p>";
        echo "<p><strong>Контактный номер:</strong> " . $row['contact_number'] . "</p>";
        echo "<p><strong>Адрес:</strong> " . $row['address'] . "</p>";
    } else {
        echo "Пользователь с логином '$user_name' не найден.";
    }

    $stmt->close();
    // Создание SQL-запроса
    $sql = "SELECT * FROM order_info WHERE user_name='$user_name'";
    $result = $con->query($sql);

    echo "<div id='orders'>";
    echo "<h1>Заказы</h1>";

    // Вывод данных таблицы
    if ($result->num_rows > 0) {
        
        
        echo "<div class='table_conteiner'>";
        echo "<table id='table' border='1'>";
        echo "<tr>";
        
        // Получение названий столбцов
        while ($field = $result->fetch_field()) {
            echo "<th>" . $field->name . "</th>";
        }
        echo "</tr>";

        // Получение строк таблицы
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $cell) {
                echo "<td>" . htmlspecialchars($cell) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";

    } else {
        echo "<table id='table' border='1'>";
        echo "<tr>";
        // Получение названий столбцов
        while ($field = $result->fetch_field()) {
            echo "<th>" . $field->name . "</th>";
        }
        echo "</tr>";
        echo "</table>";
        echo "Нет заказов";
    }
    echo "</div>";
}
else if ($val == 'sup_to_order'){
    echo '
    <form id="orderForm" action="../../src/process_order.php" method="post">
        <table>
            <tr>
                <th>Название товара</th>
                <th>Описание</th>
                <th>Количество</th>
            </tr>';
    // Fetch products
    $sql = "SELECT product_id, name_product, description FROM products";
    $result = $con->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['name_product']) . "</td>";
            echo "<td>" . htmlspecialchars($row['description']) . "</td>";
            echo "<td><input type='number' name='quantity[" . $row['product_id'] . "]' min='0' value='0'></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No products available</td></tr>";
    }
    echo '
        </table>
        <br>
        <input type="submit" class="button" value="Заказать">
    </form>';
}
else if ($val == 'adm_db'){
    // SQL-запрос для получения названий всех таблиц
    $sql = "SELECT table_name 
    FROM information_schema.tables 
    WHERE table_schema = '$dbname' 
    AND table_type = 'BASE TABLE'";

    // Выполнение запроса
    $tables = $con->query($sql);

    echo '<div id="message"></div>';
    if ($tables->num_rows > 0) {
        echo "<select id='tableSelect' onchange='show_table(this.value)'>";
        // Вывод названий таблиц
        while($row = $tables->fetch_row()) {
            echo "<option value='".$row[0]."'>".$row[0]."</option>";
        }
        echo "</select>";
    } else {
        echo "В базе данных нет таблиц";
    }
    echo '<div id="wrap_table"></div>';
}
else if ($val == 'stats'){
    include 'stats.php';
}
    
// Закрытие соединения

$con->close();

?>
