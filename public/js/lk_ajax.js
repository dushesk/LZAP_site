var deleted_rows = [];

// Вывод информации
function show_info(val) {
    if (val == "") {
        document.getElementById("main_content").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("main_content").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../../src/show_info.php?q="+val,true);
        xmlhttp.send();
    }
}

// Смена пароля
function change_pass(){
    var old_pass = document.getElementById("old_pass").value;
    var new_pass = document.getElementById("new_pass").value;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("message").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","../../src/change_password.php?old="+old_pass+"&new="+new_pass,true);
    xmlhttp.send();
}


/// Функции администратора
// Вывод таблицы при нажатии на ее название
function show_table(table_name) {
    document.getElementById("message").innerHTML = "";
    if (table_name === "") {
        document.getElementById("wrap_table").innerHTML = "";
        return;
    } else {
        deleted_rows = [];

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("wrap_table").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../../src/fetch_table.php?q="+table_name,true);
        xmlhttp.send();
    }
}

// Запись строк для удаления
function delete_row(row_id) {
    if (deleted_rows.indexOf(row_id)===-1){
        deleted_rows.push(row_id);
    }
    var table = document.getElementById("table");
    for (var i = 1; i < table.rows.length; i++) { // Начинаем с 1, чтобы пропустить строку заголовка
        var row = table.rows[i];
        var cell = row.cells[0]; // Первая ячейка в строке
        if (cell.textContent == row_id) {
            table.deleteRow(i);
            break; // Прекращаем цикл после удаления строки
        }
    }
}

// Сохранение таблицы в БД
function save_changes(table_name) {
    var table = document.getElementById("table");
    var rows = table.rows;
    var data = [];
    var headers = [];

    // Сохраняем названия столбцов из первой строки таблицы
    for (var i = 0; i < rows[0].cells.length; i++) {
        headers[i] = rows[0].cells[i].textContent;
    }
    
    // Перебираем строки таблицы, начиная со второй строки (пропускаем заголовок)
    for (var i = 1; i < rows.length; i++) {
        var row = rows[i];
        var rowID = parseInt(row.cells[0].textContent);

        if (!rowID){
            rowID = parseInt(row.cells[0].querySelector("input").value);
            var rowData = [];
            rowData.push(rowID);

            // Перебираем ячейки строки, начиная со второй ячейки (пропускаем ID)
            for (var j = 1; j < row.cells.length; j++) {
                var cell = row.cells[j];
                var input = cell.querySelector('input');
                if (input) {
                    rowData.push(input.value);
                }
            }
            data.push(rowData);
        }
    }

    console.log(data); // Проверка собранных данных

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("message").innerHTML = this.responseText;
        }
    };

    var data_json = JSON.stringify(data);
    xmlhttp.open("GET","../../src/edit_table_handler.php?s=" + deleted_rows + "&d="+data_json,true);
    xmlhttp.send();

    // Обнуление
    deleted_rows = [];

    show_table(table_name);
}

// Добавление строки в таблицу
function addRow() {
    var table = document.getElementById("table");
    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);
    
    // Добавляем класс для новой строки
    row.className = "new-row";

    // Добавляем ячейку для ID (со значением по умолчанию)
    var input = document.createElement("input");
    input.type = "text";
    input.name = "column0";
    input.value = rowCount;
    var cell1 = row.insertCell(0);
    cell1.appendChild(input);

    // Получаем количество столбцов из заголовка таблицы
    var colCount = table.rows[0].cells.length;

    // Добавляем ячейки с полями ввода для всех столбцов кроме первого
    for (var i = 1; i < colCount; i++) {
        var cell = row.insertCell(i);
        var input = document.createElement("input");
        input.type = "text";
        input.name = "column" + i; // Присваиваем имя полю ввода
        cell.appendChild(input);
    }
}
