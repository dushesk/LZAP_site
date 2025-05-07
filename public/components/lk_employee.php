
<div class="sidebar">
    <button class='button' onclick='show_info(this.value)' value='emp_info'>Личные данные</button>
    <button class='button' onclick='show_info(this.value)' value='emp_shift'>Смены</button>
    <button class='button' onclick='show_info(this.value)' value='sett'>Настройки</button>
</div>
<div class="main_content" id="main">
    <div id="message"></div>
    <div id="main_content">
    <script> 
        show_info('emp_info');    
    </script>
    </div>
</div>