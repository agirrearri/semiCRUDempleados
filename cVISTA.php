<?php


class cVISTA {
    
   public function mostrarFormulario($empleados,$departamentos){
      ?>
    <form method="POST">
        <label>SELECCIONA UN DEPARTAMENTO</label><br>
        <select name="dep_selec">
            <?php    
                foreach ($departamentos as  $dep) 
                {?>
                  <option  value="<?php echo $dep->codigo;?>"> <?php echo "$dep->descripcion";?></option>  
               
               <?php 
               
               }?>
        </select>
        <br><br>
        <label>SELECCIONA UNO O VARIOS EMPLEADOS</label><br>
        <select name="empleados_selec[]" multiple="multiple">
            <?php    
                foreach ($empleados as  $emp) 
                {?>
                  <option  value="<?php echo $emp->codigo;?>"> <?php echo "$emp->NombreCompleto";?></option>  
               
               <?php 
               
               }?>
            </select>
        </br></br>
        <input type="submit" name="asociar" value="ASOCIAR"/>
        <input type="submit" name="listar" value="LISTAR"/>
        <input type="submit" name="editar" value="TABLA EDITORA"/>
       
        
    </form>    
     <?php 
   }
   
    public function mostrarTabla($lista){
       if($lista!= false){
            ?>

       <br><br><br><br>
        <table border>
            <th>EMPLEADO</th>
            <th>DEPARTAMENTO</th>
           <?php foreach ($lista as  $value) {?>
            <tr>
                <td><?php echo "$value->NombreCompleto";?></td>
                <td><?php echo "$value->descripcion";?></td>
            </tr>
           <?php }?>
        </table>
       <?php
       
           }else{
               echo("no hay empleados en departamentos");
           }
    } 
    
    public function mostrarTablaEditora($lista){
       if($lista!= false){
            ?>

       <br><br><br><br>
        <table border>
            <th>EMPLEADO</th>
           <?php foreach ($lista as  $value) {?>
            <tr>
                <td><a href="editarEmpleado.php?id=<?=$value->codigo?>">Editar <?=$value->NombreCompleto ?></a></td>
            </tr>
           <?php }?>
        </table>
       <?php
       
           }else{
               echo("no hay empleados en departamentos");
           }
    }
    
    public function mostrarFormularioEditor($departamentos, $empleado = NULL){
        ?>
       <h1>Editar EMPLEADO</h1>
        <form action="index.php" method="POST">
            <input type="hidden" name="id" value="<?=($empleado!= NULL)? $empleado->codigo: "" ?>"/>
            Nombre: <input type="text" name="nombre" value="<?=$empleado->NombreCompleto?>"/><br>
            Departamento:
            <select name="dep_selec">
            <?php    
            if($empleado){//para update
                foreach ($departamentos as  $dep) 
                {
                    ?>
                  <option  value="<?php echo $dep->codigo;?>" <?php echo ($empleado->departamento==$dep->codigo)?  "selected":"" ?>><?=$dep->descripcion?></option> 
               <?php 
               }
            }else{//form vacio para insert
                foreach ($departamentos as  $dep) 
                {
                    ?>
                  <option  value="<?php echo $dep->codigo;?>" > <?=$dep->descripcion?></option> 
               <?php 
               }
            }
               ?>
        </select>
            <input type="submit" value="GUARDAR" name="guardar"/>
        </form>
                
            
            <?php
    }
    
    
    
}
