function ValidarCampos() {
    // Esta função varre todos os inputs obrigatórios
    var campos = document.querySelectorAll('input[required], select[required]');
    for (var i = 0; i < campos.length; i++) {
        if (campos[i].value.trim() == '') {
            alert("O campo " + campos[i].previousElementSibling.innerText + " é obrigatório!");
            campos[i].focus();
            return false;
        }
    }
    return true;
}