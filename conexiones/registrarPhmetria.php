<?php

include("conexion.php");

if($_POST){

   $datos = json_decode($_POST["datos"]);

   $datos_aux="";

   echo $_POST["datos"];

   for($i=0;$i<=45;$i++){

        //echo var_dump($datos[$i]);
       
       if($i<45){
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

    /*mysqli_query($con, "INSERT INTO phmetria_form 
    (fecha, cedula, apellidos, nombres, empresa_salud, telefono, celular, ciudad, hospital, medico_remitente, 
    especialidad_medico, genero, peso, talla, historia_clinica, fecha_nacimiento, edad, antecedentes_personales, 
    sintomas_manifestados, estudio_solicitado, diagnostico_previo, resultados_endoscopia, resultados_manometria,
     resultados_phmetria, resultados_phmetria_previa, otro_resultado, diagnostico_clinico, tipo_examen, distancia_nariz, 
     con_inhibidor, cual_inhibidor, dosis_medicacion, dosis_al_dia, respuesta_tratamiento, otros_medicamentos, 
     profesional, exposicion_acida, demeester, reflujo, reflujo_proximal, impedancia_nocturna, impedancia_diurna, 
     fenotipo, eructo_sp, eructo_gt, medico) 
    VALUES ('$datos_aux')");*/

    $sql = "INSERT INTO phmetria_form 
    (fecha, cedula, apellidos, nombres, empresa_salud, telefono, celular, ciudad, hospital, medico_remitente, 
    especialidad_medico, genero, peso, talla, historia_clinica, fecha_nacimiento, edad, antecedentes_personales, 
    sintomas_manifestados, estudio_solicitado, diagnostico_previo, resultados_endoscopia, resultados_manometria,
     resultados_phmetria, resultados_phmetria_previa, otro_resultado, diagnostico_clinico, tipo_examen, distancia_nariz, 
     con_inhibidor, cual_inhibidor, dosis_medicacion, dosis_al_dia, respuesta_tratamiento, otros_medicamentos, 
     profesional, exposicion_acida, demeester, reflujo, reflujo_proximal, impedancia_nocturna, impedancia_diurna, 
     fenotipo, eructo_sp, eructo_gt, medico) 
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