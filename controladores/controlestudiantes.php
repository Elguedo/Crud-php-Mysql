<?php
session_start();
//include_once "../prueba.php"
  include_once $_SERVER["DOCUMENT_ROOT"]."/CRUD-ESTUDIANTES/models/Estudiante.php";
  include_once $_SERVER["DOCUMENT_ROOT"]."/CRUD-ESTUDIANTES/models/DAOestudiante.php";

class controlestudiantes {


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CONTROL_USUARIO
 *
 * @author EQUIPO
 */

    public function recuperar_accion(){
        $accion = @$_REQUEST["accion"];  
        switch(@$accion){
           case "Guardar":
               $this->guardar_estudiante();
               break;
           case "Buscar":
               $this->buscar_estudiante();
               break;
            case "Editar":
                $this->editar_estudiante();
                break;
           case "Eliminar":
               $this->eliminar_estudiante();
               break;
            case "Listar_todo":
                $this->listar_todo_estudiante();
                break;
            default :
                break;
            
            
         
        }
    }
   
    //operacion guardar estudiante

    public function guardar_estudiante(){
    $id=$_REQUEST["id"];
    $usuario_id=$_REQUEST["usuario_id"];
    $nombre=$_REQUEST["nombre"];
    $apellido=$_REQUEST["apellido"];
    $semestre=$_REQUEST["semestre"];
    $email=$_REQUEST["email"];
    $genero=$_REQUEST["genero"];
    $telefono=$_REQUEST["telefono"];
    $programa=$_REQUEST["programa"];
    $universidad=$_REQUEST["universidad"];
  
    $estudiante= new Estudiante();
    $estudiante->id =$id;
    $estudiante->usuario_id =$usuario_id;
    $estudiante->nombre =$nombre;
    $estudiante->apellido=$apellido;
    $estudiante->semestre=$semestre;
    $estudiante->email=$email;
    $estudiante->genero=$genero;
    $estudiante->telefono=$telefono;
    $estudiante->programa=$programa;
    $estudiante->universidad=$universidad;
    try {
         $resul= DAOEstudiante::agregar_estudiante($estudiante);
          header("location: ..//vistas/estudiantes/agregar.php?mensaje=ok, estudiante guardado");
          exit;
        
    } catch (Exception $error) {
        header("location: ..//vistas/estudiantes/agregar.php?mensaje=".$error->getMessage());
        exit;
    }

    /*
     * $resul= $usuario->save();
    if($resul== TRUE){
        header("location: ..//vistas/usuarios/agregar.php?mensaje=ok, usuario guardado");
        exit;
    }else
         header("location: ..//vistas/usuarios/agregar.php?mensaje=ERROR: $usuario->errors ");
        exit;
    {
       
     *  
     
    }
     

    */ 
    
    }
     

    public function buscar_estudiante(){
        $id=$_REQUEST["id"];
        $pagina=$_REQUEST["pagina"];
        try {
            $estudiante= DAOestudiante::buacar_estudiante($id);
          
            $estudiante= serialize($estudiante);
            $_SESSION["estudiante.encontrado"]=$estudiante;
            header("location: ../vistas/estudiantes/$pagina.php?mensaje=Estudiante encontrado con exito");
            exit; 
        } catch (Exception $error) {
            unset($_SESSION["estudiante.encontrado"]);
            header("location: ../vistas/estudiantes/$pagina.php?mensaje=".$error->getMessage());
            exit;
        }
    }

    public function editar_estudiante(){
        $id=$_REQUEST["id"];
    $usuario_id=$_REQUEST["usuario_id"];
    $nombre=$_REQUEST["nombre"];
    $apellido=$_REQUEST["apellido"];
    $semestre=$_REQUEST["semestre"];
    $email=$_REQUEST["email"];
    $genero=$_REQUEST["genero"];
    $telefono=$_REQUEST["telefono"];
    $programa=$_REQUEST["programa"];
    $universidad=$_REQUEST["universidad"];

        $estudiante= @$_SESSION["estudiante.encontrado"];
        $estudiante= @unserialize($estudiante);
        $estudiante->semestre=$semestre;
        $estudiante->email=$email;
        $estudiante->telefono=$telefono;
        $estudiante->programa=$programa;
        $estudiante->universidad=$universidad;
        
        $resul=DAOestudiante::modificar_estudiante($estudiante);
        if($resul !=false){
            unset($_SESSION["estudiante.encontrado"]);
            header("location: ../vistas/estudiantes/editar.php?mensaje=Estudiante editado exitosamente");
            exit;

        }
        else{
            unset($_SESSION["estudiante.encontrado"]);
            header("location: ../vistas/estudiantes/editar.php?mensaje=NO se pudo editar el usuario");
            exit;
        }

    }

      
    
    public function eliminar_estudiante(){
        $id= $_REQUEST["id"];
        $resul= DAOestudiante::eliminar_estudiante($id);
           if($resul != 0){
               unset($_SESSION["estudiante.encontrado"]);
               header("location: ../vistas/estudiantes/eliminar.php?mensaje= ESTUDIANTE ELIMNADO EXITOSAMENTE");
               exit;
               
           }else{
               unset($_SESSION["estudiante.encontrado"]);
               header("location: ../vistas/estudiantes/eliminar.php?mensaje= ESTUDIANTE ELIMINADO EXITOSAMENTE");
               exit;
           }
    }


    

    public function listar_todo_estudiante(){
        $lista_estudiantes=DAOestudiante::listar_estudiante();

        if($lista_estudiantes==NULL || count($lista_estudiantes)==0){
            unset($_SESSION["lista_estudiantes"]);
            header("location: ../vistas/estudiantes/listar_todo.php?mensaje=ERROR, EL SISTEMA NO TIENE ESTUDIANTES REGISTRADOS");
            exit;

        }
        else{
            $total=count($lista_estudiantes);
            $lista_estudiantes=serialize($lista_estudiantes);
            $_SESSION["lista_estudiantes"]=$lista_estudiantes;
            header("location: ../vistas/estudiantes/listar_todo.php?mensaje=TOTAL DE ESTUDIANTES EN EL SISTEMA:".$total);
            exit;

        }
    }
    
}


$controlestudiantes=new ControlEstudiantes();
$controlestudiantes->recuperar_accion();
