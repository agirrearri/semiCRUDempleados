<?php

class cBD {

    private $conexion;

    //constructor que llama al método conectar
    function __construct() {
        $this->conectar();
    }

    //método conectar la bd
    public function conectar() {

        $this->conexion = new mysqli('localhost', 'root', '', '2ebal_empresa');
        if ($this->conexion->connect_errno) { //intento conectar a la BD
            die('Error en la conexion: ' . $this->conexion->connect_error);
        }
    }

    public function empleado($id) {
        $consulta_empleado = "SELECT empleados.* FROM `empleados` where id = $id";

        $resultado = $this->conexion->query($consulta_empleado);
        if ($resultado->num_rows > 0) {


            return($resultado->fetch_object());
        } else {
            return false; //si no hay empleados devolveria FALSE
        }
    }
    
    public function anadirEmpleado($nombre, $departamento){
        $sql = "insert into empleados (nombre, id_departamento) values ('$nombre', $departamento)";
       // echo $sql;
        $resultado = $this->conexion->query($sql);
        return $resultado;
        
    }

    public function editarEmpleado($id, $nombre, $departamento) {
      
        $sql = "UPDATE empleados SET nombre='$nombre', id_departamento = $departamento WHERE id = $id";
        //echo $sql;
        $this->conexion->query($sql);
    }

    //MÉTODO QUE DEVUELVE TODOS LOS EMPLEADOS
    public function listadoEmpleados() {

        $consulta_empleados = "SELECT * FROM empleados";

        $resultado = $this->conexion->query($consulta_empleados);
        $empleados = array();
        if ($resultado->num_rows > 0) {

            for ($i = 0; $i < $resultado->num_rows; $i++) {
                $empleados[] = $resultado->fetch_object();
            }

            return($empleados);
        } else {
            return false; //si no hay empleados devolveria FALSE
        }
    }

    //MÉTODO QUE DEVUELVE TODOS LOS DEPARTAMENTOS
    public function listadoDepartamentos() {

        $consulta_dep = "SELECT * FROM departamentos";

        $resultado = $this->conexion->query($consulta_dep);

        if ($resultado->num_rows > 0) {
            $dep = array();
            for ($i = 0; $i < $resultado->num_rows; $i++) {
                $dep[] = $resultado->fetch_object();
            }

            return($dep);
        } else {
            return false; //si no hay departamentos devolveria FALSE
        }
    }

    //asigna un departamento a los empleados
    public function anadirEmpDep($id_empleados, $id_dep) {

//        for ($i = 0; $i < count($id_empleados); $i++) {
//            $sql = "UPDATE empleados SET id_departamento=$id_dep WHERE id = $id_empleados[$i]";
//            $this->conexion->query($sql);
//        }
        foreach($id_empleados as $id_empleado){
            $sql = "UPDATE empleados SET id_departamento=$id_dep WHERE id = $id_empleado";
             $this->conexion->query($sql);
        }
            
        
    }

    //MÉTODO PARA OBTENER EL LISTADO DE EMPLEADODEPARTAMENTO
    public function listadoDepEmp() {
        //AQUI HAGO LA CONSULTA DE LOS EMPLEADOS Y LOS DEPARTAMENTOS EN LOS QUE ESTAN, OBTENIENDO SU NOMBRE
        $consulta_todo = "SELECT empleados.nombre as empleado, departamentos.nombre as departamento FROM empleados left join departamentos on empleados.id_departamento = departamentos.id";

        $resultado = $this->conexion->query($consulta_todo);

        if ($resultado->num_rows > 0) {
            $listaDepEmp = array();
            for ($i = 0; $i < $resultado->num_rows; $i++) {
                $listaDepEmp[] = $resultado->fetch_object();
            }
            
            return($listaDepEmp);
        }
    }
    
    public function eliminarDepartamento($id_departamento){
        //delete usuarios del departamento
        $sql = "DELETE FROM empleados WHERE  id_departamento=$id_departamento";
        $this->conexion->query($sql);
        $sql="DELETE FROM `departamentos` WHERE id=$id_departamento";
        $this->conexion->query($sql);
        //delete departamento
    }

}
