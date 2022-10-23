<?php
session_start();
//include_once "../prueba.php"
  include_once $_SERVER["DOCUMENT_ROOT"]."/CRUD-ESTUDIANTES/models/Usuario.php";
  include_once $_SERVER["DOCUMENT_ROOT"]."/CRUD-ESTUDIANTES/models/DAOusuario.php";

class controlusuario {


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
// metod para recuperar la accion que viene desde los formulario
    public function recuperar_accion(){
        $accion = @$_REQUEST["accion"];  
        switch(@$accion){
           case "Guardar":
               $this->guardar_usuario();
               break;
           case "Buscar":
               $this->Buscar_usuario();
               break;
            case "Editar":
                $this->editar_usuario();
                break;
           case "Eliminar":
               $this->eliminar_usuario();
               break;
            case "Listar_todo":
                $this->listar_todo_usuario();
                break;
            default :
                break;
            
            //
            //case "Buscar":
              //  $this->Buscar_usuario();
               // break;
            //case "Editar":
              //  $this->editar_usuario();
               // break;
            //case "Eliminar":
               // $this->eliminar_usuario();
              //  break;
            //case "Listar":
              //  $this->listar_usuario();
                //break;
         
        }
    }
    //$control=new controlusuario();
    
//recuperamos los paremetros del campo enviado por el formulario
    public function guardar_usuario(){
    $cedula=$_REQUEST["cedula"];
    $clave=$_REQUEST["clave"];
    $nombre=$_REQUEST["nombre"];
    $telefono=$_REQUEST["telefono"];
    $email=$_REQUEST["email"];
   //instanciamos la clase usuario
    $usuario = new Usuario();
    $usuario->cedula =$cedula;
    $usuario->clave =$clave;
    $usuario->nombre =$nombre;
    $usuario->telefono=$telefono;
    $usuario->email=$email;
    
    try {
         $resul= DAOusuario::agregar_usuario($usuario);
          header("location: ..//vistas/usuarios/agregar.php?mensaje=ok, usuario guardado");
          exit;
        
    } catch (Exception $error) {
        header("location: ..//vistas/usuarios/agregar.php?mensaje=ERROR:".$error->getMessage());
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
    public function buscar_usuario(){
        $cedula=$_REQUEST["cedula"];
        $pagina=$_REQUEST["pagina"];
        try {
            $usuario= DAOusuario::buacar_usuario($cedula);
           // echo $usuario->nombre;
            $usuario= serialize($usuario);
            $_SESSION["usuario.encontrado"]=$usuario;
            header("location: ../vistas/usuarios/$pagina.php?mensaje=Usuario encontrado con exito");
            exit; 
        } catch (Exception $error) {
            unset($_SESSION["usuario.encontrado"]);
            header("location: ../vistas/usuarios/$pagina.php?mensaje=".$error->getMessage());
            exit;
        }
    }
    
    public function eliminar_usuario(){
        $cedula = $_REQUEST["cedula"];
        $resul= DAOusuario::eliminar_usuario($cedula);
           if($resul != 0){
               unset($_SESSION["usuario.encontrado"]);
               header("location: ../vistas/usuarios/eliminar.php?mensaje= USUARIO ELIMNADO EXITOSAMENTE");
               exit;
               
           }else{
               unset($_SESSION["usuario.encontrado"]);
               header("location: ../vistas/usuarios/eliminar.php?mensaje= USUARIO ELIMNADO EXITOSAMENTE");
               exit;
           }
    }


    public function editar_usuario(){
        $cedula=$_REQUEST["cedula"];
        $clave=$_REQUEST["clave"];
        $nombre=$_REQUEST["nombre"];
        $telefono=$_REQUEST["telefono"];
        $email=$_REQUEST["email"];

        $usuario= @$_SESSION["usuario.encontrado"];
        $usuario= @unserialize($usuario);
        $usuario->clave =$clave;
       // $usuario->nombre =$nombre;
        $usuario->telefono=$telefono;
        $usuario->email=$email;
        $resul=DAOusuario::modificar_usuario($usuario);
        if($resul !=false){
            unset($_SESSION["usuario.encontrado"]);
            header("location: ../vistas/usuarios/editar.php?mensaje=Usuario editado exitosamente");
            exit;

        }
        else{
            unset($_SESSION["usuario.encontrado"]);
            header("location: ../vistas/usuarios/editar.php?mensaje=NO se pudo editar el usuario");
            exit;
        }

    }
    
    public function listar_todo_usuario(){
        $lista_usuarios=DAOusuario::listar_usuario();

        if($lista_usuarios== NULL || count($lista_usuarios) == 0){
            unset ($_SESSION["lista_usuarios"]);
            header("location: ../vistas/usuarios/listar_todo.php?mensaje=ERROR, EL SISTEMA NO TIENE USUARIOS REGISTRADOS");
            exit;

        }
        else{
            $total=count($lista_usuarios);
            $lista_usuarios=serialize($lista_usuarios);
            $_SESSION["lista_usuarios"]=$lista_usuarios;
            header("location: ../vistas/usuarios/listar_todo.php?mensaje=TOTAL DE USUARIOS EN EL SISTEMA:".$total);
            exit;

        }
    }
}



$controlusuario=new ControlUsuario();
$controlusuario->recuperar_accion();
