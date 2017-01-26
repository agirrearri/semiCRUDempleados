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
 
        if(isset($_GET['id'])){
            $v1->mostrarFormularioEditor($bd->empleado($_GET['id']),$bd->listadoDepartamentos());
        }
        ?>
    </body>
</html>


