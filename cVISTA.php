<?php

class cVISTA {

    public function mostrarFormulario($empleados, $departamentos) {
        ?>
        <form method="POST">
            <label>SELECCIONA UN DEPARTAMENTO</label><br>
            <select name="dep_selec">
                <?php
                foreach ($departamentos as $dep) {
                    ?>
                    <option  value="<?php echo $dep->id; ?>"> <?php echo "$dep->nombre"; ?></option>  

                <?php }
                ?>
            </select>
            <br><br>
            <label>SELECCIONA UNO O VARIOS EMPLEADOS</label><br>
            <select name="empleados_selec[]" multiple="multiple">
                <?php
                foreach ($empleados as $emp) {
                    ?>
                    <option  value="<?php echo $emp->id; ?>"> <?php echo "$emp->nombre"; ?></option>  

                <?php }
                ?>
            </select>
            </br></br>
            <input type="submit" name="asociar" value="ASOCIAR"/>
            <input type="submit" name="listar" value="LISTAR"/>
            <input type="submit" name="editar" value="TABLA EDITORA"/>
            <input type="submit" name="crear" value="CREAR EMPLEADO"/>


        </form>    
        <?php
    }

    public function mostrarTabla($lista) {
        if ($lista != false) {
            ?>

            <br>
            <table border>
                <th>EMPLEADO</th>
                <th>DEPARTAMENTO</th>
                <?php foreach ($lista as $value) { ?>
                    <tr>
                        <td><?php echo "$value->empleado"; ?></td>
                        <td><?php echo "$value->departamento"; ?></td>
                    </tr>
                <?php } ?>
            </table>
              <br>
            <?php
        } else {
            echo("no hay empleados en departamentos");
        }
    }

    public function mostrarTablaEditora($lista) {
        if ($lista != false) {
            ?>

            <br>
            <table border>
                <th>EMPLEADO</th>
                <?php foreach ($lista as $value) { ?>
                    <tr>
                        <td><a href="editarEmpleado.php?id=<?= $value->id ?>">Editar <?= $value->nombre ?></a></td>
                    </tr>
                <?php } ?>
            </table>
              <br>
            <?php
        } else {
            echo("no hay empleados en departamentos");
        }
    }

    public function mostrarFormularioCrearEmpleado($departamentos) {
        ?>
        <h1>Crear EMPLEADO</h1>
        <form action="index.php" method="POST">
            Nombre: <input type="text" name="nombre" value=""/><br>
            Departamento:
            <select name="dep_selec">
                <?php
                foreach ($departamentos as $dep) {
                    ?>

                    <option  value="<?php echo $dep->id; ?>"><?= $dep->nombre ?></option> 
                    <?php
                }
                ?>
            </select>
            <input type="submit" value="GUARDAR" name="guardar"/>
        </form>


        <?php
    }

    public function mostrarFormularioEditarEmpleado($departamentos, $empleado) {
        ?>
        <h1>Editar EMPLEADO</h1>
        <form action="index.php" method="POST">
            <input type="hidden" name="id" value="<?= $empleado->id ?>"/>
            Nombre: <input type="text" name="nombre" value="<?= $empleado->nombre ?>"/><br>
            Departamento:
            <select name="dep_selec">
        <?php
        foreach ($departamentos as $dep) {
            ?>
                    <option  value="<?php echo $dep->id; ?>" <?php echo ($empleado->id_departamento == $dep->id) ? "selected" : "" ?>><?= $dep->nombre ?></option> 
                    <?php
                }
                ?>
            </select>
            <input type="submit" value="GUARDAR" name="guardar"/>
        </form>


        <?php
    }

}
