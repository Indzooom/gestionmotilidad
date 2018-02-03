function login() {
    var email = $("#email").val();
    var clave = $("#clave").val();
    datos = {
        email: email,
        clave: clave
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/login.php",
        data: datos,
        beforeSend: function() {},
        success: function(response) {
            if (response.res == 1) {
                window.location.href = "pacientes_programados.php";
            } else {
                alert("Datos invalidos");
                //notificacion("Error: Datos invalidos", 4)

            }
        }
    });
}

var id_paciente = 0;

function buscarPaciente() {
    var cedula = $("#cedula").val();
    datos = {
        cedula: cedula,
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/buscarPaciente.php",
        data: datos,
        success: function(response) {
            if (response.res == 1) {
                $("#nombres").val(response.name);
                $("#apellidos").val(response.lastname);
                $("#email").val(response.email);
                $("#celular").val(response.celular);
                id_paciente = response.id_paciente;
            }
            if (response.res == 0) {
                alert("Paciente no encontrado, por favor registrar.")
            }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Error");
        }
    });

}

function buscarPacienteForm() {
    var cedula = $("#dato1").val();
    datos = {
        cedula: cedula,
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/buscarPaciente.php",
        data: datos,
        success: function(response) {
            if (response.res == 1) {
                $("#dato3").val(response.nameful);
                $("#dato2").val(response.lastnameful);
                $("#dato6").val(response.celular);
                $("#dato5").val(response.telefono);
                $("#dato15").val(response.nacimiento);
                $("#dato16").val(response.edad);
                $("#dato11").val(response.sexo);
                $("#dato7").val(response.ciudad);

            }
            if (response.res == 0) {
                alert("Paciente no encontrado, por favor registrar.")
            }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Error");
        }
    });

}

function buscarPacienteForm2() {
    var cedula = $("#dato1").val();
    datos = {
        cedula: cedula,
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/buscarPacienteEnForm.php",
        data: datos,
        success: function(response) {
            if (response.res == 1) {
                for (j = 0; j <= 45; j++) {
                    var idd = "dato" + j;
                    var textt = response["dato" + j];
                    mostrarMultiple(idd, textt);
                }

            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Error");
        }
    });

}

function buscarPacienteForm3() {
    var cedula = $("#dato1").val();
    datos = {
        cedula: cedula,
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/buscarPacienteEnForm2.php",
        data: datos,
        success: function(response) {
            if (response.res == 1) {
                for (j = 0; j <= 42; j++) {
                    var idd = "dato" + j;
                    var textt = response["dato" + j];
                    mostrarMultiple(idd, textt);
                }

            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Error");
        }
    });

}

function validarPacienteForm() {

    var cedula = $("#dato1").val();
    datos = {
        cedula: cedula,
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/buscarPacienteForm.php",
        data: datos,
        success: function(response) {
            if (response.res == 1) {
                buscarPacienteForm2();
            } else {
                buscarPacienteForm();
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Error");
        }
    });

}

function validarPacienteForm2() {

    var cedula = $("#dato1").val();
    datos = {
        cedula: cedula,
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/buscarPacienteForm2.php",
        data: datos,
        success: function(response) {
            if (response.res == 1) {
                buscarPacienteForm3();
            } else {
                buscarPacienteForm();
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Error");
        }
    });

}

function validarRegistroPacienteForm() {

    var cedula = $("#dato1").val();
    datos = {
        cedula: cedula,
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/buscarPacienteForm.php",
        data: datos,
        success: function(response) {
            if (response.res == 1) {
                registrarPhmetria(2);
            } else {
                registrarPhmetria(1);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Error");
        }
    });

}

function validarRegistroPacienteForm2() {

    var cedula = $("#dato1").val();
    datos = {
        cedula: cedula,
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/buscarPacienteForm2.php",
        data: datos,
        success: function(response) {
            if (response.res == 1) {
                registrarManometria(2);
            } else {
                registrarManometria(1);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Error");
        }
    });

}


function registrarActividad(tipo) {

    datos = {
        tipo: tipo
    };

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/registrar_actividades.php",
        data: datos,
        success: function(response) {}
    });

}


function enviarCorreo() {

    var nombres = $("#nombres").val();
    var apellidos = $("#apellidos").val();
    var cedula = $("#cedula").val();
    var email = $("#email").val();
    var celular = $("#celular").val();

    alert("Enviando correo, por favor espere.")

    registrarActividad("Envio");
    //alert(c);
    datos = {
        nombres: nombres + " " + apellidos,
        cedula: cedula,
        email: email,
        cantidad: c
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/enviar_correo.php",
        data: datos,
        beforeSend: function() {},
        complete: function(response) {
            alert("Examen enviado con exito.")

            datoz = {
                sms: 1
            };
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "conexiones/consultarSms.php",
                data: datoz,
                success: function(response) {
                    var textAux = response.valor;
                    var resTextAux = textAux.split("|");
                    var text = "";
                    for (p = 0; p < resTextAux.length; p++) {
                        if (resTextAux[p] == "nombre") {
                            text += " " + nombres;
                        } else if (resTextAux[p] == "apellido") {
                            text += " " + apellidos;
                        } else if (resTextAux[p] == "cedula") {
                            text += " " + cedula;
                        } else if (resTextAux[p] == "email") {
                            text += " " + email;
                        } else {
                            text += " " + resTextAux[p];
                        }
                    }

                    datoss = {
                        id: 1
                    };
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "http://138.128.162.82:8081//mensaje/envia.php?user=infra&password=Br0.7890&text=" + text + "&to=" + celular,
                        data: datoss,
                        beforeSend: function() {},
                        complete: function(response) {
                            location.reload();
                        }
                    });

                }
            });


        }
    });



}


var c = 0;

function agregarExamen() {

    $.ajax({
        url: 'conexiones/lista_tipo_examen.php',
        type: 'GET',
        contentType: "application/json",
        dataType: 'json',
        complete: function(response) {
            //var datos = jQuery.parseJSON(JSON.stringify(response));
            var tipos = response.responseText;
            var res = tipos.split("|");
            $('tbody').append("<tr> <td> <select id='tipo_examen" + (c + 1) + "' class='form-control input-sm'> <option value='0'> Tipo de Examen </option> </select> </td> <td> <input class='form-control input-sm' id='fecha_examen" + (c + 1) + "' placeholder='Fecha del Examen' type='date'> </td> <td> <input type='file' class='form-control input-sm' id='archivos" + (c + 1) + "' name='archivos' multiple='multiple' onchange='validarCarga(" + (c + 1) + "); return false;'> </td> <td id='estadoCarga" + (c + 1) + "'> <span class='label label-danger'> Sin carga</span> </td> <td id='btnSubir" + (c + 1) + "'> <input type='submit' class='btn btn-primary btn-sm' onclick='subirEnvios(" + (c + 1) + "); return false;' value='Subir' disabled='true'/> </td></tr>");
            for (i = 0; i < res.length; i++) {
                $('#tipo_examen' + (c + 1)).append(res[i]);
            }
        }
    });

    c = c + 1;
}

function validarCarga(id) {
    var doc = $("#archivos" + id).val();
    if (doc != '') {
        $('#estadoCarga' + id).html("<span class='label label-warning'> Cargado </span>");
        $('#btnSubir' + id).html("<input type='submit' class='btn btn-primary btn-sm' onclick='subirEnvios(" + id + "); return false;' value='Subir'/>");
    } else {
        $('#estadoCarga' + id).html("<span class='label label-danger'> Sin carga </span>");
    }

    /*setTimeout(function () {
        $('estadoCarga').html("<span class='label label-warning'> Cargado </span>");
    }, 1000);*/

}

function subirEnvios(id_file) {
    registrarActividad("Subida");
    alert("Subiendo Archivo, por favor espere.. ")

    var nombres = $("#nombres").val();
    var apellidos = $("#apellidos").val();
    var cedula = $("#cedula").val();
    var email = $("#email").val();

    var tipo_examen = $("#tipo_examen" + id_file).val();
    var fecha_examen = $("#fecha_examen" + id_file).val();

    var archivos = document.getElementById("archivos" + id_file);
    var archivo = archivos.files;
    var archivos = new FormData();

    for (i = 0; i < archivo.length; i++) {
        archivos.append('archivo' + i, archivo[i]);
    }

    $.ajax({
        url: 'conexiones/subir.php',
        type: 'POST',
        contentType: false, //Debe estar en false para que pase el objeto sin procesar
        data: archivos,
        processData: false, //Debe estar en false para que JQuery no procese los datos a enviar
        cache: false
    }).done(function(msg) {
        //registrarEnvios(nombres, apellidos, cedula, email, tipo_examen, fecha_examen, msg);
        datos = {
            id_paciente: id_paciente,
            email: email,
            tipo_examen: tipo_examen,
            fecha_examen: fecha_examen,
            destino: msg
        };

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "conexiones/registrar_envios.php",
            data: datos,
            complete: function(response) {
                $('#estadoCarga' + id_file).html("<span class='label label-success'> Guardado </span>");
                $('#btnSubir' + id_file).html("<input type='submit' class='btn btn-primary btn-sm' onclick='subirEnvios(); return false;' value='Subir' disabled='disabled'/>");
            }
        });
    });



}


function consultar(tipo) {
    registrarActividad("Consulta");
    if (tipo == 1) {
        var cedula = $("#cedula").val();
        $("#tabla_consultas").load(
            "conexiones/listaPacienteCedula.php?cedula=" + cedula
        );

    }
    if (tipo == 2) {
        var fecha1 = $("#fecha1").val();
        var fecha2 = $("#fecha2").val();
        $("#tabla_consultas").load(
            "conexiones/listaPacienteFecha.php?fecha1=" + fecha1 + "&fecha2=" + fecha2
        );

    }
    if (tipo == 3) {
        var tipo = $("#tipo_examen").val();
        $("#tabla_consultas").load(
            "conexiones/listaPacienteTipo.php?tipo=" + tipo
        );

    }
    if (tipo == 4) {
        var fechaa1 = $("#fechaa1").val();
        var fechaa2 = $("#fechaa2").val();
        var items = $("#items").val();
        var itemss = items.toString();
        $("#tabla_envios").load(
            "conexiones/listaEnviosItems.php?fecha1=" + fechaa1 + "&fecha2=" + fechaa2 + "&items=" + itemss
        );

    }

}

function registrarPaciente() {
    var tipo_documento = $("#tipo_documento").val();
    var cedula = $("#cedula").val();
    var nombre1 = $("#nombre1").val();
    var nombre2 = $("#nombre2").val();
    var apellido1 = $("#apellido1").val();
    var apellido2 = $("#apellido2").val();
    var edad = $("#edad").val();
    var nacimiento = $("#nacimiento").val();
    var direccion = $("#direccion").val();
    var ciudad = $("#ciudad").val();
    var email = $("#email").val();
    var telefono = $("#telefono").val();
    var celular = $("#celular").val();
    var sexo = $("#sexo").val();
    if (sexo == "Otro") {
        sexo = "Otro:" + $("#otroGenero").val();
    }
    datos = {
        tipo_documento: tipo_documento,
        cedula: cedula,
        nombre1: nombre1,
        nombre2: nombre2,
        apellido1: apellido1,
        apellido2: apellido2,
        edad: edad,
        nacimiento: nacimiento,
        direccion: direccion,
        ciudad: ciudad,
        email: email,
        telefono: telefono,
        celular: celular,
        sexo: sexo
    };

    datoss = {
        cedula: cedula
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/buscarPaciente2.php",
        data: datoss,
        success: function(response) {
            if (response.res == 1) {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "conexiones/actualizarPaciente.php?id=" + response.id_paciente,
                    data: datos,
                    beforeSend: function() {},
                    complete: function(response) {
                        alert("Paciente actualizado");
                        location.reload();
                    }
                });
            }
            if (response.res == 0) {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "conexiones/registrar_paciente.php",
                    data: datos,
                    beforeSend: function() {},
                    complete: function(response) {
                        alert("Registro exitoso.");
                        location.reload();
                    }
                });
            }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });


    registrarActividad("Registrar Paciente");


}

function registrarTipoExamen() {
    var tipo_examen = $("#tipo_examen").val();

    datos = {
        tipo_examen: tipo_examen
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/registrar_tipo_examen.php",
        data: datos,
        complete: function(response) {
            location.reload();
        }
    });
    registrarActividad("Registrar Tipo Examen");
}

function registrarEspecialidades() {
    var especialidad = $("#especialidad").val();

    datos = {
        especialidad: especialidad
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/registrar_especialidad.php",
        data: datos,
        complete: function(response) {
            location.reload();
        }
    });
    registrarActividad("Registrar Especialidades");
}

function registrarGenero() {
    var genero = $("#genero").val();

    datos = {
        genero: genero
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/registrar_genero.php",
        data: datos,
        complete: function(response) {
            location.reload();
        }
    });
    registrarActividad("Registrar Genero");
}

function registrarTipoMedico() {
    var nombre = $("#nombre").val();

    datos = {
        nombre: nombre
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/registrar_tipo_medico.php",
        data: datos,
        complete: function(response) {
            location.reload();
        }
    });
    registrarActividad("Regitrar Tipo Medico");
}

function registrarMedico() {
    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var especialidad = $("#especialidad").val();
    var tipo = $("#tipo").val();
    var email = $("#email").val();
    var celular = $("#celular").val();
    var direccion = $("#direccion").val();
    var observaciones = $("#observaciones").val();

    datos = {
        nombre: nombre,
        apellido: apellido,
        especialidad: especialidad,
        tipo: tipo,
        email: email,
        celular: celular,
        direccion: direccion,
        observaciones: observaciones
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/registrar_medico.php",
        data: datos,
        complete: function(response) {
            alert("Medico Registrado.")
            location.reload();
        }
    });
    registrarActividad("Registrar Medico");
}

function registrarUsuario() {
    var rol = $("#role").val();
    var role = rol.toString();
    var nombre = $("#nombre").val();
    var email = $("#email").val();
    var clave = $("#clave").val();

    datos = {
        role: role,
        nombre: nombre,
        email: email,
        clave: clave
    };

    datoss = {
        email: email,
    };

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/buscarUsuario2.php",
        data: datoss,
        success: function(response) {
            if (response.res == 1) {
                datos_ac = {
                    role: role,
                    nombre: nombre,
                    email: email,
                    clave: clave
                };

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "conexiones/actualizarUsuario.php?id=" + response.id,
                    data: datos_ac,
                    complete: function(response) {
                        alert("Usuario actualizado");
                        location.reload();
                    }
                });
            } else {
                datos_re = {
                    role: role,
                    nombre: nombre,
                    email: email,
                    clave: clave
                };

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "conexiones/registrar_usuario.php",
                    data: datos_re,
                    complete: function(response) {
                        alert("Registro exitoso.");
                        location.reload();
                    }
                });
            }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Error");
        }
    });
    registrarActividad("Registrar Usuario");
}

function calcularEdad() {
    var fecha = $("#nacimiento").val();
    if (fecha == null) {
        fecha = $("#dato15").val();
    }

    var values = fecha.split("-");
    var dia = values[2];
    var mes = values[1];
    var ano = values[0];

    // cogemos los valores actuales
    var fecha_hoy = new Date();
    var ahora_ano = fecha_hoy.getYear();
    var ahora_mes = fecha_hoy.getMonth() + 1;
    var ahora_dia = fecha_hoy.getDate();

    var edad = ahora_ano + 1900 - ano;
    if (ahora_mes < mes) {
        edad--;
    }
    if (mes == ahora_mes && ahora_dia < dia) {
        edad--;
    }
    if (edad > 1900) {
        edad -= 1900;
    }

    $("#edad").val(edad);
    $("#dato16").val(edad);
}

function tablaPacientes() {
    var cedula = $("#cedula2").val();

    datos = {
        cedula: cedula
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/buscarPaciente2.php",
        data: datos,
        success: function(response) {
            if (response.res == 1) {
                $("#tabla_pacientes").load(
                    "conexiones/mostrarPacientes.php?cedula=" + cedula
                );
                $("#cedula2").val("");
            }
            if (response.res == 0) {
                alert("Cliente no registrado")
                $("#cedula2").val("");
            }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert(errorThrown);
        }
    });
}

function mostrarDatosPacientes(cedula) {
    datos = {
        cedula: cedula,
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/buscarPaciente.php",
        data: datos,
        success: function(response) {
            $("#tipo_documento").val(response.tipo_cedula);
            $("#nombre1").val(response.name);
            $("#nombre2").val(response.name2);
            $("#apellido1").val(response.lastname);
            $("#apellido2").val(response.lastname2);
            $("#email").val(response.email);
            $("#telefono").val(response.telefono);
            $("#celular").val(response.celular);
            $("#edad").val(response.edad);
            $("#nacimiento").val(response.nacimiento);
            $("#direccion").val(response.direccion);
            $("#ciudad").val(response.ciudad);
            $("#cedula").val(response.cedula);
            var sexString = response.sexo;
            if (sexString == "M" || sexString == "F") {
                $("#sexo").val(response.sexo);
            } else {
                $("#sexo").val("Otro");
                $("#sexoOtro").append("<input class='form-control input-sm' id='otroGenero' placeholder='Otro Genero' type='text'>");
                var resSex = sexString.split(":");
                $("#otroGenero").val(resSex[1]);
            }


        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Error");
        }
    });
    registrarActividad("Mostrar Datos pacientes");
}

function eliminarTipoExamen(id) {

    datos = {
        id: id,
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/eliminarTipoExamen.php",
        data: datos,
        complete: function(response) {
            //alert("Tipo de examen eliminado");
            location.reload();
        }
    });
    registrarActividad("Eliminar Tipo Examen");
}

function eliminarTipoMedico(id) {

    datos = {
        id: id,
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/eliminarTipoMedico.php",
        data: datos,
        complete: function(response) {
            //alert("Tipo de examen eliminado");
            location.reload();
        }
    });
    registrarActividad("Eliminar Tipo Medico");
}

function eliminarEspecialidad(id) {

    datos = {
        id: id,
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/eliminarEspecialidad.php",
        data: datos,
        complete: function(response) {
            //alert("Tipo de examen eliminado");
            location.reload();
        }
    });
    registrarActividad("Eliminar Especialidad");
}

function eliminarGenero(id) {

    datos = {
        id: id,
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/eliminarGenero.php",
        data: datos,
        complete: function(response) {
            //alert("Tipo de examen eliminado");
            location.reload();
        }
    });
    registrarActividad("Eliminar Genero");
}

function mostrarUsuarioTabla(id) {

    datos = {
        id: id,
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/buscarUsuario.php",
        data: datos,
        success: function(response) {
            var text = response.role;
            var res = text.split(",");
            for (i = 0; i < res.length; i++) {
                $("#role option[value=" + res[i] + "]").attr("selected", true);
            }
            $("#nombre").val(response.name);
            $("#email").val(response.email);
            $("#id").val(response.id);

        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert("Error");
        }
    });

}



function mostrarTablaActividad() {

    var fecha1 = $("#fecha1").val();
    var fecha2 = $("#fecha2").val();

    $("#tabla_actividad").load(
        "conexiones/listaActividades.php?fecha1=" + fecha1 + "&fecha2=" + fecha2
    );

}

function mostrarTablaActividad0() {

    $("#tabla_actividad").load(
        "conexiones/listaActividades.php"
    );

}

function registrarDoctor() {

    var nombre = $("#nombre").val();
    var cga = $("#cga").val();
    var cgp = $("#cgp").val();
    var cn = $("#cn").val();
    var cc = $("#cc").val();
    var pe = $("#pe").val();
    var pc = $("#pc").val();
    var m = $("#m").val();
    var tbf = $("#tbf").val();

    datos = {
        nombre: nombre,
        cga: cga,
        cgp: cgp,
        cn: cn,
        cc: cc,
        pe: pe,
        pc: pc,
        m: m,
        tbf: tbf
    };

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/registrar_doctor.php",
        data: datos,
        complete: function(response) {
            alert("Doctor Registrado");
            location.reload();
        }
    });
    registrarActividad("Registrar Doctor");
}

function registrarRecepcionista() {

    var nombre = $("#nombre").val();

    datos = {
        nombre: nombre,
    };

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/registrar_recepcionista.php",
        data: datos,
        complete: function(response) {
            alert("Recepcionista Registrado");
            location.reload();
        }
    });
    registrarActividad("Registrar Recepcionista");
}

function eliminarDoctor(id) {

    datos = {
        id: id,
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/eliminarDoctor.php",
        data: datos,
        complete: function(response) {
            //alert("Tipo de examen eliminado");
            location.reload();
        }
    });
    registrarActividad("Eliminar Doctor");
}

function eliminarRecepcionista(id) {

    datos = {
        id: id,
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/eliminarRecepcionista.php",
        data: datos,
        complete: function(response) {
            //alert("Tipo de examen eliminado");
            location.reload();
        }
    });
    registrarActividad("Eliminar Recepcionista");
}

function eliminarMedico(id) {

    datos = {
        id: id,
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/eliminarMedico.php",
        data: datos,
        complete: function(response) {
            //alert("Tipo de examen eliminado");
            location.reload();
        }
    });
    registrarActividad("Eliminar Medico");
}

function registrarPhmetria(op) {

    var datos = [];
    for (i = 0; i <= 45; i++) {

        var j = i;

        if (j == 17) {
            var auxx = guardarMultiple("dato" + j);
            if (auxx != "" || auxx == null) {
                datos.push(auxx);
            } else {
                datos.push("n/a");
            }
        } else if (j == 18) {
            var auxx = guardarMultiple("dato" + j);
            if (auxx != "" || auxx == null) {
                datos.push(auxx);
            } else {
                datos.push("n/a");
            }
        } else if (j == 20) {
            var auxx = guardarMultiple("dato" + j);
            if (auxx != "" || auxx == null) {
                datos.push(auxx);
            } else {
                datos.push("n/a");
            }
        } else if (j == 21) {
            var auxx = guardarMultiple("dato" + j);
            if (auxx != "" || auxx == null) {
                datos.push(auxx);
            } else {
                datos.push("n/a");
            }
        } else if (j == 30) {
            var auxx = guardarMultiple("dato" + j);
            if (auxx != "" || auxx == null) {
                datos.push(auxx);
            } else {
                datos.push("n/a");
            }
        } else if (j == 42) {
            var auxx = guardarMultiple("dato" + j);
            if (auxx != "" || auxx == null) {
                datos.push(auxx);
            } else {
                datos.push("n/a");
            }
        } else {
            var auxx = $("#dato" + i).val();
            if (auxx != "" || auxx == null) {
                datos.push(auxx);
            } else {
                datos.push("n/a");
            }
        }

    }

    var jackson = JSON.stringify(datos);

    if (op == 1) {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "conexiones/registrarPhmetria.php",
            data: "datos=" + jackson,
            complete: function(response) {
                alert("Formulario guardado.");
                location.reload();
            }
        });
    } else {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "conexiones/actualizarPhmetria.php",
            data: "datos=" + jackson,
            complete: function(response) {
                alert("Formulario Actualizado.");
                location.reload();
            }
        });
    }

    registrarActividad("Registrar Phmetria");

}

function registrarManometria(op) {

    var datos = [];
    for (i = 0; i <= 42; i++) {

        var j = i;

        if (j == 17) {
            var auxx = guardarMultiple("dato" + j);
            if (auxx != "" || auxx == null) {
                datos.push(auxx);
            } else {
                datos.push("n/a");
            }
        } else if (j == 18) {
            var auxx = guardarMultiple("dato" + j);
            if (auxx != "" || auxx == null) {
                datos.push(auxx);
            } else {
                datos.push("n/a");
            }
        } else if (j == 20) {
            var auxx = guardarMultiple("dato" + j);
            if (auxx != "" || auxx == null) {
                datos.push(auxx);
            } else {
                datos.push("n/a");
            }
        } else if (j == 21) {
            var auxx = guardarMultiple("dato" + j);
            if (auxx != "" || auxx == null) {
                datos.push(auxx);
            } else {
                datos.push("n/a");
            }
        } else if (j == 30) {
            var auxx = guardarMultiple("dato" + j);
            if (auxx != "" || auxx == null) {
                datos.push(auxx);
            } else {
                datos.push("n/a");
            }
        } else {
            var auxx = $("#dato" + i).val();
            if (auxx != "" || auxx == null) {
                datos.push(auxx);
            } else {
                datos.push("n/a");
            }
        }
        registrarActividad("Registrar Manometria");
    }

    var jackson = JSON.stringify(datos);

    if (op == 1) {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "conexiones/registrarManometria.php",
            data: "datos=" + jackson,
            complete: function(response) {
                alert("Formulario guardado.");
                location.reload();
            }
        });
    } else {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "conexiones/actualizarManometria.php",
            data: "datos=" + jackson,
            complete: function(response) {
                alert("Formulario Actualizado.");
                location.reload();
            }
        });
    }

}

/*En prueba pero NEI
var d = 1;
function clonar(id) {
 
    var clon = $("#" + id).clone(true);
    clon.attr("id", id + d);
 
    $("#" + id + "0").append(clon);
    d++;
}*/


function generarOtro(id, name) {
    //var clon = $("#" + id).clone(true);
    var aux = $("#" + id).val();
    if (aux == 'Otro') {
        //clon.attr("disabled", "true");
        //$("#" + id).html(clon);
        $("#" + id + "Otro").append("<input class='form-control input-sm' id=" + id + "Otr" + " placeholder='Otro " + name + "' type='text'>");
    } else {
        /*clon.removeAttr("disabled", "true");
        $("#" + id + "Otro").remove();
        $("#" + id).html(clon);*/
    }

}

function generarOtroGenero() {
    var aux = $("#sexo").val();
    if (aux == 'Otro') {

        $("#sexoOtro").append("<input class='form-control input-sm' id='otroGenero' placeholder='Otro Genero' type='text'>");
    } else {

    }

}

function prueba(id) {

    for (i = 1; i < 20; i++) {
        var aux = $("#" + id + i).val();
        if (aux != undefined) {
            alert(proa);
        }
    }

}

function guardarMultiple(id) {
    var aux = $("#" + id).val();
    if (aux != null) {
        var auxS = aux.toString();
        var op = false;
        var res = auxS.split(",");
        for (k = 0; k < res.length; k++) {
            if (res[k].localeCompare("Otro") == 0) {
                op = true;
            } else {
                op = false;
            }
        }
        if (op == true) {
            var aux2 = $("#" + id + "Otr").val();
            //var aux2S = aux2.toString();
            var auxFinal = auxS + ":" + aux2;
        } else {
            var auxFinal = auxS;
        }
    } else {
        var auxFinal = "";
    }

    return auxFinal;
}

function mostrarMultiple(id, text) {
    var n = text.search(",");
    if (n != -1) {
        var res = text.split(",");
        for (i = 0; i < res.length; i++) {
            if (res[i].search("Otro") != -1) {
                var res2 = res[i].split(":");
                $("#" + id + " option[value=Otro]").attr("selected", true);
                $("#" + id + "Otro").append("<input class='form-control input-sm' id=" + id + "Otr" + " placeholder='Otro Mas' type='text'>");
                $("#" + id + "Otr").val(res2[1]);
            } else {
                $("#" + id + " option[value=" + res[i] + "]").attr("selected", true);
            }

        }
    } else {
        var text2 = "dato" + id;
        if (text == "n/a") {
            text = "";
        }

        if (text2 == "dato17") {

        } else if (text2 == "dato18") {

        } else if (text2 == "dato20") {

        } else if (text2 == "dato21") {

        } else if (text2 == "dato30") {

        } else {
            $("#" + id).val(text);
        }

    }

}

function mostrarAlEntrar(cedula) {

    if (cedula != "") {
        datos = {
            cedula: cedula,
        };
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "conexiones/buscarPacienteEnForm.php",
            data: datos,
            success: function(response) {
                if (response.res == 1) {
                    for (j = 0; j <= 45; j++) {
                        var idd = "dato" + j;
                        var textt = response["dato" + j];
                        mostrarMultiple(idd, textt);
                    }

                }
            }
        });
    }


}

function mostrarAlEntrar2(cedula) {

    if (cedula != "") {
        datos = {
            cedula: cedula,
        };
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "conexiones/buscarPacienteEnForm2.php",
            data: datos,
            success: function(response) {
                if (response.res == 1) {
                    for (j = 0; j <= 42; j++) {
                        var idd = "dato" + j;
                        var textt = response["dato" + j];
                        mostrarMultiple(idd, textt);
                    }

                }
            }
        });
    }


}

function registrarEmpresa() {

    var nombre = $("#nombre").val();
    var nit = $("#nit").val();
    var email = $("#email").val();
    datos = {
        nombre: nombre,
        nit: nit,
        email: email
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/registrar_empresa.php",
        data: datos,
        complete: function(response) {
            alert("Registro exitoso");
            location.reload();
        }
    });
    registrarActividad("Registrar Empresa");
}

function eliminarEmpresa(id) {

    datos = {
        id: id,
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/eliminarEmpresa.php",
        data: datos,
        complete: function(response) {
            alert("Empresa Eliminada");
            location.reload();
        }
    });
    registrarActividad("Eliminar Empresa");
}

function registrarProfesional() {

    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var cedula = $("#cedula").val();
    var especialidad = $("#especialidad").val();
    var email = $("#email").val();
    datos = {
        nombre: nombre,
        apellido: apellido,
        cedula: cedula,
        especialidad: especialidad,
        email: email
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/registrar_profesional.php",
        data: datos,
        complete: function(response) {
            alert("Registro exitoso");
            location.reload();
        }
    });

    registrarActividad("Registrar Profesional");
}

function eliminarProfesional(id) {

    datos = {
        id: id,
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/eliminarProfesional.php",
        data: datos,
        complete: function(response) {
            alert("Empresa Eliminada");
            location.reload();
        }
    });

    registrarActividad("Eliminar Profesional");
}

function verificarRol(destino, subdestino, path) {



    datos = {
        id: 1,
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/buscarRole.php",
        data: datos,
        success: function(response) {
            var rol = response.rol;
            var role = rol.split(",");
            var op = false;
            for (i = 0; i < role.length; i++) {
                var auxdest = destino.toString();
                if (role[i] == destino) {
                    op = true;
                }

            }

            if (op == true) {
                window.location.href = path;
            } else {
                alert("Permiso denegado.")
            }
        }
    });



}

function insertarVar(tipo) {

    if (tipo == 1) {
        sms.value += " |nombre| ";
    }
    if (tipo == 2) {
        sms.value += " |apellido| ";
    }
    if (tipo == 3) {
        sms.value += " |cedula| ";
    }
    if (tipo == 4) {
        sms.value += " |email| ";
    }
}

function actualizarSms() {
    var sms = $("#sms").val();

    datos = {
        sms: sms
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/actualizarSms.php",
        data: datos,
        complete: function(response) {
            alert("Mensaje personalizado guardado con exito.")
            location.reload();
        }
    });

    registrarActividad("Actualizar SMS");
}

function actualizarMedico() {
    var nombre = $("#nombre").val();
    var apellido = $("#apellido").val();
    var especialidad = $("#especialidad").val();
    var tipo = $("#tipo").val();
    var email = $("#email").val();
    var calular = $("#calular").val();
    var direccion = $("#direccion").val();
    var observacion = $("#observacion").val();

    datos = {
        nombre: nombre,
        apellido: apellido,
        especialidad: especialidad,
        tipo: tipo,
        email: email,
        calular: calular,
        direccion: direccion,
        observacion: observacion
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/actualizarMedico.php",
        data: datos,
        complete: function(response) {
            alert("Medico Actualizado")
            location.reload();
        }
    });

    registrarActividad("Actualizar Medico");

}

function mostrarSmsAlEntrar() {

    datos = {
        sms: 1
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/consultarSms.php",
        data: datos,
        success: function(response) {
            $('#sms').append(response.valor);
        }
    });
    registrarActividad("Mostrar SMS");
}

function editarNotaPaciente(name, id) {

    datos = {
        id: id
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/consultarNotas.php",
        data: datos,
        success: function(response) {
            if (response.res == 1) {
                $("#notasp").html(
                    "<textarea name='notas' id='notas' rows='1' placeholder='Agregar nota a " + name + "'></textarea>"
                );
                var text = response.nota;
                notas.value += text.toString();
            } else {
                $("#notasp").html(
                    "<textarea name='notas' id='notas' rows='1' placeholder='Agregar nota a " + name + "'></textarea>"
                );
            }
        }
    });

    var clonbtn = $("#btnMedNot").clone(true);
    clonbtn.attr("onclick", "guardarAsigYNotas(" + id + "); return false;");
    $("#btnmd").html(
        clonbtn
    );


    registrarActividad("Editar nota");

}

function editarAsigMedico(name, id) {

    var clon = $("#medico").clone(true);

    clon.removeAttr("disabled", "true");

    $("#asigmedico").html(
        clon
    );

    var clonbtn = $("#btnMedNot").clone(true);
    clonbtn.attr("onclick", "guardarAsigYNotas(" + id + "); return false;");
    $("#btnmd").html(
        clonbtn
    );

    registrarActividad("Editar medico");

}

function guardarAsigYNotas(id) {

    var nota = $("#notas").val();
    var medico = $("#medico").val();

    datos = {
        id: id,
        nota: nota,
        medico: medico
    };

    if (nota != "") {
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "conexiones/consultarNotas.php",
            data: datos,
            success: function(response) {
                if (response.res == 1) {

                    datos_acn = {
                        id: id,
                        nota: nota,
                    };

                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "conexiones/actualizarNota.php",
                        data: datos_acn,
                        complete: function(response) {
                            $("#notas").val("");
                            $("#notas").attr("placeholder", "");
                            $("#notas").attr("disabled", "true");
                            alert("Nota actualizada.")
                        }
                    });


                } else {

                    datos_ren = {
                        id: id,
                        nota: nota,
                    };

                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "conexiones/registrar_nota.php",
                        data: datos_ren,
                        complete: function(response) {
                            $("#notas").val("");
                            $("#notas").attr("placeholder", "");
                            $("#notas").attr("disabled", "true");
                            alert("Nota registrada.")
                        }
                    });

                }
            }
        });
    }

    if (medico != "0") {

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "conexiones/consultarAsignacionMedico.php",
            data: datos,
            success: function(response) {
                if (response.res == 1) {

                    datos_ac = {
                        id: id,
                        medico: medico
                    };

                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "conexiones/actualizarAsignacionMedico.php",
                        data: datos_ac,
                        complete: function(response) {
                            //$("#medico").val("0");
                            $("#medico").attr("disabled", "true");
                            alert("Medico actualizado.")
                        }
                    });


                } else {

                    datos_re = {
                        id: id,
                        medico: medico
                    };

                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "conexiones/registrar_asignacion_medico.php",
                        data: datos_re,
                        complete: function(response) {
                            //$("#medico").val("0");
                            $("#medico").attr("disabled", "true");
                            alert("Medico Asignado.")
                        }
                    });

                }
            }
        });

    }

    registrarActividad("Guardar nota y medico");
}



function cargarListPP() {
    var fecha1 = $("#fecha1").val();
    var fecha2 = $("#fecha2").val();

    $("#listPP").load(
        "conexiones/mostrarPacientesProgramados2.php?fecha1=" + fecha1 + "&fecha2=" + fecha2
    );
    registrarActividad("Cargar Lista");
}

function cargarListAP() {
    var medico = $("#medico").val();

    $("#listAsigMed").load(
        "conexiones/mostrarAsignacionMedico.php?medico=" + medico
    );
    registrarActividad("Cargar Lista");
}

function enviarAsigMed() {

    var medico = $("#medico").val();

    datos = {
        dato: 1
    };
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "conexiones/mostrarAsignacionMedico2.php?medico=" + medico,
        data: datos,
        success: function(response) {
            console.log("vamos bien");
            datoss = {
                nombre: response.nombre,
                apellido: response.apellido,
                email: response.email,
                id_medico: medico
            };
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "conexiones/enviar_correo_medico.php",
                data: datoss,
                complete: function(response) {
                    alert("Correo Enviado.")
                }
            });
        }
    });
    registrarActividad("Asignar Medico");
}

function importarPacientes(tabla) {

    if (tabla == "pacientes") {

        var ruta = document.getElementById("ruta");
        var archivo = ruta.files;
        var archivos = new FormData();
        for (i = 0; i < archivo.length; i++) {
            archivos.append('archivo', archivo[i]);
        }

        $.ajax({
            url: 'conexiones/subircsv.php',
            type: 'POST',
            contentType: false, //Debe estar en false para que pase el objeto sin procesar
            data: archivos,
            processData: false, //Debe estar en false para que JQuery no procese los datos a enviar
            cache: false
        }).done(function(msg) {
            //alert(msg)
            datos = {
                id: 1
            };
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "conexiones/importarcsv_pacientes.php?ruta=" + msg,
                data: datos,
                complete: function(response) {
                    alert("Csv importado.");
                    location.reload();
                }
            });

        });

    }

    if (tabla == "pacientesp") {
        var ruta2 = document.getElementById("ruta2");
        var archivo2 = ruta2.files;
        var archivos2 = new FormData();
        for (i = 0; i < archivo2.length; i++) {
            archivos2.append('archivo', archivo2[i]);
        }

        $.ajax({
            url: 'conexiones/subircsv.php',
            type: 'POST',
            contentType: false, //Debe estar en false para que pase el objeto sin procesar
            data: archivos2,
            processData: false, //Debe estar en false para que JQuery no procese los datos a enviar
            cache: false
        }).done(function(msg) {
            //alert(msg)
            datos = {
                id: 1
            };
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "conexiones/importarcsv_pacientesp.php?ruta=" + msg,
                data: datos,
                complete: function(response) {
                    alert("Csv importado.");
                    //location.reload();
                }
            });

        });

    }

    registrarActividad("Importar pacientes");

}

function buscarEncuestaFecha() {
    var fecha1 = $("#fecha1").val();
    var fecha2 = $("#fecha2").val();

    $("#encuestaFecha").load(
        "conexiones/mostrarEncuestaFecha.php?fecha1=" + fecha1 + "&fecha2=" + fecha2
    );
    registrarActividad("Buscar Encuesta");
}

function irA(ruta) {

    window.location.href = ruta;

}

function exportarEncuesta() {
    var op = $("#op").val();

    if (op == 0) {
        alert("Por favor seleccione el tipo de busqueda")
    }
    if (op == 1) {

        var fecha1 = $("#fecha1").val();
        var fecha2 = $("#fecha2").val();

        if (fecha1 != "" && fecha2 != "") {
            window.location.href = "conexiones/exportarEncuestaFecha.php?fecha1=" + fecha1 + "&fecha2=" + fecha2;
        } else {
            alert("Por favor ingrese una fecha")
        }

    }
    if (op == 2) {
        window.location.href = "conexiones/exportarEncuestaTodo.php";
    }
    registrarActividad("Exportar Encuesta");
}

function cambiarOpEncuesta() {
    var op = $("#op").val();
    if (op == 1) {
        $("#fecha1").removeAttr("disabled", "true");
        $("#fecha2").removeAttr("disabled", "true");
    }
    if (op == 2) {
        $("#fecha1").attr("disabled", "true");
        $("#fecha2").attr("disabled", "true");
    }
    registrarActividad("Cambio de Encuesta");
}