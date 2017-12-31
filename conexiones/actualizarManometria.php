<?php

include("conexion.php");

if($_POST){

   $datos = json_decode($_POST["datos"]);
   array_unshift($datos, "nada");

   $datos_aux="";

    $con=mysqli_connect($host,$user,$pw)or die("Problemas al conectar");
    mysqli_select_db($con, $db)or die("Problemas al conectar la bd");

    $sql = "UPDATE manometria_form SET
    fecha='".$datos[1]."',
    cedula='".$datos[2]."',
    apellidos='".$datos[3]."',
    nombres='".$datos[4]."',
    empresa_salud='".$datos[5]."',
    telefono='".$datos[6]."',
    celular='".$datos[7]."',
    ciudad='".$datos[8]."',
    hospital='".$datos[9]."',
    medico_remitente='".$datos[10]."',
    especialidad_medico='".$datos[11]."',
    genero='".$datos[12]."',
    peso='".$datos[13]."',
    talla='".$datos[14]."',
    historia_clinica='".$datos[15]."',
    fecha_nacimiento='".$datos[16]."',
    edad='".$datos[17]."',
    antecedentes_personales='".$datos[18]."',
    sintomas_manifestados='".$datos[19]."',
    estudio_solicitado='".$datos[20]."',
    diagnostico_previo='".$datos[21]."',
    resultados_endoscopia='".$datos[22]."',
    resultados_manometria='".$datos[23]."',
    resultados_phmetria='".$datos[24]."',
    resultados_phmetria_previa='".$datos[25]."',
    otro_resultado='".$datos[26]."',
    diagnostico_clinico='".$datos[27]."',
    medio_para_estudio='".$datos[28]."',
    protocolo='".$datos[29]."',
    medicamentos_usados='".$datos[30]."',
    cual_inhibidor='".$datos[31]."',
    dosis_medicacion='".$datos[32]."',
    dosis_al_dia='".$datos[33]."',
    otros_medicamentos='".$datos[34]."',
    profesional='".$datos[35]."',
    procedimiento='".$datos[36]."',
    tono_e='".$datos[37]."',
    tono_u='".$datos[38]."',
    test='".$datos[39]."',
    barra='".$datos[40]."',
    transito_bv='".$datos[41]."',
    transito_bl='".$datos[42]."',
    medico='".$datos[43]."'
    WHERE cedula='".$datos[2]."'";

   /* if ($con->query($sql) === TRUE) {
        echo "New record created successfully";
        $respuesta['res'] = 1;
        echo json_encode($respuesta);
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
        $respuesta['res'] = 0;
        echo json_encode($respuesta);
    }*/

    if (mysqli_query($con, $sql)) {
        echo "Actualizada";
    } else {
        echo "Error: ".mysqli_error($con);
    }
    
    mysqli_close($con); 
   

}else{
   echo "No recibí datos por POST";
}

 
?>