<?php

include("conexion.php");

if($_POST){

   $datos = json_decode($_POST["datos"]);

   $datos_aux="";

   for($i=0;$i<=42;$i++){
       
       if($i<42){
           if($i==0){
                $datos_aux .= $datos[$i] . "',";
            }else{
                $datos_aux .= "'".$datos[$i] . "',";
            }
       }else{
        $datos_aux .= "'".$datos[$i];
       }
        
   }

    date_default_timezone_set($zonaHoraria);
    $fecha = new DateTime();
    $fechaa = $fecha->format('Y-m-d');

    $con=mysqli_connect($host,$user,$pw)or die("Problemas al conectar");
    mysqli_select_db($con, $db)or die("Problemas al conectar la bd");

    $sql = "INSERT INTO manometria_form 
    (fecha, cedula, apellidos, nombres, empresa_salud, telefono, celular, ciudad, hospital, medico_remitente, 
    especialidad_medico, genero, peso, talla, historia_clinica, fecha_nacimiento, edad, antecedentes_personales, 
    sintomas_manifestados, estudio_solicitado, diagnostico_previo, resultados_endoscopia, resultados_manometria, 
    resultados_phmetria, resultados_phmetria_previa, otro_resultado, diagnostico_clinico, medio_para_estudio, 
    protocolo, medicamentos_usados, cual_inhibidor, dosis_medicacion, dosis_al_dia, otros_medicamentos,
    profesional, procedimiento, tono_e, tono_u, test, barra, transito_bv, transito_bl, medico) 
    VALUES ('$datos_aux')";

    if ($con->query($sql) === TRUE) {
        echo "New record created successfully";
        $respuesta['res'] = 1;
        echo json_encode($respuesta);
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
        $respuesta['res'] = 0;
        echo json_encode($respuesta);
    }
    
    mysqli_close($con); 
   

}else{
   echo "No recibí datos por POST";
}

 
?>