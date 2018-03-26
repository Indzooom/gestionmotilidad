function login() {
    var cedula = $("#text").val();
    datos = {
        cedula: cedula
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/consultarCedula.php",
        data: datos,
        success: function (response) {
            if (response.res == 1) {
                window.location.href = "panel.php?id_paciente=" + response.id_paciente + "&nombre_completo=" + response.nombre_completo;
            } else {
                alert("Cedula no encontrada");
                //notificacion("Error: Datos invalidos", 4)

            }
        }
    });
}

function consultar(id) {
    $("#datos").load(
        "conexiones/listaExamenes.php?id_paciente=" + id
    );
}









