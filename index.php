<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include 'cVISTA.php';
        include 'cBD.php';
        
        $v1=new cVISTA(); 
        $bd=new cBD();
 
         $v1->mostrarFormulario($bd->listadoEmpleados(),$bd->listadoDepartamentos());
         
         
         if(isset($_POST["asociar"]))
        {
            if(!empty($_POST["empleados_selec"]) && !empty($_POST["dep_selec"]))
            {
                $bd->anadirEmpDep($_POST["empleados_selec"],$_POST["dep_selec"]);
                
            }else{
                echo "tienes que seleccionar algun empleado y su departamento";
            }
        }else if(isset($_POST["listar"]))
        {
            
            $v1->mostrarTabla($bd->listadoDepEmp());
        }else if(isset($_POST["editar"])){
            $v1->mostrarTablaEditora($bd->listadoEmpleados());
        }else if(isset ($_POST['guardar'])){
            
            $bd->editarEmpleado($_POST['id'], $_POST['nombre'], $_POST['dep_selec']);
            echo($_POST['nombre'] .  " cambiado");
        }
         
        ?>
    </body>
</html>
