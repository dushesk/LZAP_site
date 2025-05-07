<?php
require_once 'config.php';

$table_name = $_GET['q'];

// Создание SQL-запроса
$sql = "SELECT * FROM $table_name";
$result = $con->query($sql);

$columns_name = []; // Запоминаем названия столбцов

// Вывод данных таблицы
if ($result->num_rows > 0) {
    
    echo "<h1>$table_name</h1>";
    echo "<div class='table_conteiner'>";
    echo "<table id='table' border='1'>";
    echo "<tr>";
    
    // Получение названий столбцов
    while ($field = $result->fetch_field()) {
        array_push($columns_name, $field->name); // Сохраняем названия колонок
        echo "<th>" . $field->name . "</th>";
    }
    echo "</tr>";

    // Получение строк таблицы
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>" . htmlspecialchars($cell) . "</td>";
        }
        // Кнопка для удаления строки
        echo "<td class='delCell'><button type='button' class='button deleteRow' onclick='delete_row(this.id)' id='".$row[$columns_name[0]]."' >&#10006;</button></td></tr>";
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";

} else {
    echo "<h1>$table_name</h1>";
    echo "<table id='table' border='1'>";
    echo "<tr>";
    
    // Получение названий столбцов
    while ($field = $result->fetch_field()) {
        array_push($columns_name, $field->name); // Сохраняем названия колонок
        echo "<th>" . $field->name . "</th>";
    }
    echo "</tr>";
    echo "</table>";
    echo "В таблице нет данных.";
}

//Кнопка для добавления строки
echo "<div class='buttons'><button type='button' class='button addButton' onclick='addRow()'>Добавить строку</button>";
//Кнопка для сохранения изменений
echo "<button type='button' class='button saveChanges' onclick='save_changes(\"$table_name\")'>Сохранить</button></div>";

$_SESSION['table_name_editmode'] = $table_name;
$_SESSION['columns'] = $columns_name;

// Закрытие соединения
$con->close();
?>
