<?php

$chosen_role = $_GET['q'];
$_SESSION["select-role"] = $chosen_role;

if ($chosen_role == 'employee'):
    $_SESSION['table_name_editmode'] = 'employees';?>
    <div class="input-group">
        <label for="new-firstname">Имя</label>
        <input type="text" id="new-firstname" name="new-firstname" required>
    </div>
    <div class="input-group">
        <label for="new-lastname">Фамилия</label>
        <input type="text" id="new-lastname" name="new-lastname" required>
    </div>
    <div class="input-group">
        <label for="new-middlename">Отчество</label>
        <input type="text" id="new-middlename" name="new-middlename">
    </div>
<?php
endif;
if ($chosen_role == 'supplier'):
    $_SESSION['table_name_editmode'] = 'suppliers';?>
    <div class="input-group">
        <label for="new-name">Название</label>
        <input type="text" id="new-name" name="new-name" required>
    </div>
    <div class="input-group">
        <label for="new-contact">Тел.</label>
        <input type="text" id="new-contact" name="new-contact">
    </div>
    <div class="input-group">
        <label for="new-address">Адрес</label>
        <input type="text" id="new-address" name="new-address">
    </div>

<?php
endif; ?>

