<?php
$tabla="    <tr>
                <td>
                    <select id='tipo_examen' class='form-control input-sm'>
                        <option value='0'>Tipo de Examen</option>
                        <option value='PHmetria'>PHmetria</option>
                        <option value='Manometria'>Manometria</option>
                    </select>
                </td>
                <td>
                    <input class='form-control input-sm' id='fecha_examen' placeholder='Fecha del Examen' type='date'>
                </td>
                <td>
                    <input type='file' class='form-control input-sm' id='archivos' name='archivos' multiple='multiple'>
                </td>
                <td>
                    <span class='label label-danger'>Nada</span>
                </td>
                <td>
                    <input type='submit' class='btn btn-primary btn-sm' onclick='registrarEnvios(); return false;' value='Subir' />
                </td>
            </tr>";
?>