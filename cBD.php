<?php

class cBD {

    private $conexion;

    //constructor que llama al método conectar
    function __construct() {
        $this->conectar();
    }

    //método conectar la bd
    public function conectar() {

        $this->conexion = new mysqli('localhost', 'root', '', '2ebal_examen');
        if ($this->conexion->connect_errno) { //intento conectar a la BD
            die('Error en la conexion: ' . $this->conexion->connect_error);
        }
    }

    //método para desconectar la bd
    public function desconectar() {
        $this->conexion->close();
    }

    //MÉTODO QUE DEVUELVE TODOS LOS EMPLEADOS
    public function listadoEmpleados() {

        $consulta_empleados = "SELECT * FROM empleados";

        $resultado = $this->conexion->query($consulta_empleados);

        if ($resultado->num_rows > 0) {
            $empleados = array();
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

    //MÉTODO PARA INSERTAR EN LA TABLA EMPLEADODEPARTAMENTO, EL CODIGO DE EMPLEADO Y EL CODIGO DEL DEPARTAMENTO
    public function anadirEmpDep($id_empleados, $id_dep) {

        for ($i = 0; $i < count($id_empleados); $i++) {
            $insertar = "INSERT INTO empleadodepartamento (empleado,departamento) VALUES('$id_empleados[$i]','$id_dep')";
            $this->conexion->query($insertar);
        }
    }

    //MÉTODO PARA OBTENER EL LISTADO DE EMPLEADODEPARTAMENTO
    public function listadoDepEmp() {
        //AQUI HAGO LA CONSULTA DE LOS EMPLEADOS Y LOS DEPARTAMENTOS EN LOS QUE ESTAN, OBTENIENDO SU NOMBRE
        $consulta_todo = "SELECT e.NombreCompleto,d.descripcion FROM empleados e,departamentos d,empleadodepartamento ed WHERE e.codigo=ed.empleado AND d.codigo=ed.departamento";

        $resultado = $this->conexion->query($consulta_todo);

        if ($resultado->num_rows > 0) {
            $listaDepEmp = array();
            for ($i = 0; $i < $resultado->num_rows; $i++) {
                $listaDepEmp[] = $resultado->fetch_object();
            }

            return($listaDepEmp);
        }
    }

}
