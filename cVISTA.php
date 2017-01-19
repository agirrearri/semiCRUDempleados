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
       
        
    </form>    
     <?php 
   }
   
    public function mostrarTabla($lista){
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
      
    }
    
    
}
