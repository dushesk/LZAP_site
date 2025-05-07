// Вывод полей для регистрации
function show_reg(chosen_role) {
    if (chosen_role == "") {
        document.getElementById("register_wrap").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("register_wrap").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../components/reg_role.php?q="+chosen_role,true);
        xmlhttp.send();
    }
}