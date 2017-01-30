<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include 'cVISTA.php';
include 'cBD.php';

$v1 = new cVISTA();
$bd = new cBD();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $v1->mostrarFormularioCrearEmpleado($bd->listadoDepartamentos());
        ?>
    </body>
</html>