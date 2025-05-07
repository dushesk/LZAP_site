<?php

// Подключаем JpGraph
require_once ('../vendor/jpgraph-4.4.2/src/jpgraph.php');
require_once ('../vendor/jpgraph-4.4.2/src/jpgraph_bar.php');

// Суммарные зарплаты по отделам
$sql = "SELECT department_title, sum(salary) total_salary
        FROM employees LEFT JOIN departments USING(department_id)
        GROUP BY department_id
        HAVING total_salary IS NOT NULL";
$result = $con->query($sql);

$departments = array();
$salaries = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if ($row['department_title'] == ""){
            $departments[] = "Остальные";
        }
        else{
            $departments[] = $row['department_title'];
        }
        $salaries[] = $row['total_salary'];
    }
}

// новый график
$graph = new Graph(800, 600);
$graph->SetScale('textlin');

$graph->title->Set('График суммарных зарплат по отделам');

//ось X
$graph->xaxis->title->Set('Отделы');

// ось Y
$graph->yaxis->title->Set('Суммарная зарплата');

// создаем столбчатый график
$barplot = new BarPlot($salaries);
$graph->xaxis->SetLabelAngle(45);
// Установка меток оси X
$graph->xaxis->SetTickLabels($departments);

// Добавляем столбчатый график на график
$graph->Add($barplot);

// Генерация уникального имени файла
$filename = 'graph_' . uniqid() . '.png';
$filepath = '../public/images/graphs/'.$filename;

// Сохраняем график в формате PNG
$graph->Stroke($filepath);

// Освобождаем ресурсы
unset($graph);


// Вывод графика
echo "<img src='../images/graphs/$filename' style='max-width: 100%; max-height: 80%;' alt='График суммарных зарплат по отделам'>";

?>