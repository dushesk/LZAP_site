// Вывод на экран формы 
function show_sub_form() {
    console.log("sub form");
    document.getElementById("sub_form_wrap").style.display = 'flex';
}

// Закрытие формы
function close_form(){
    document.getElementById("sub_form_wrap").style.display = 'none';
}

function stopPropagation(event) {
    event.stopPropagation();
}

