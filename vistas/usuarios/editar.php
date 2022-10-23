<?php
session_start();
include_once $_SERVER["DOCUMENT_ROOT"]."/CRUD-ESTUDIANTES/models/Usuario.php";
$usuario= @$_SESSION["usuario.encontrado"];
$usuario= @unserialize($usuario);
if(@$_SESSION["usuario.encontrado"]== NULL){
    $usuario= NULL;
}


?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<link rel="stylesheet" href="../css/ESTILO.css">
    <head>
        <meta charset="UTF-8">
         
        <title></title>
    </head>
    
    <body style="background-image:url(../imagenes/1656613992273.webp) ;">
    <header class="site-header inicio">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="../index.php">inicio</a></a>

                <nav id="navegacion" class="navegacion">
                    <a href="agregar.php">REGISTRAR</a>
                    <a href="buscar.php">BUSCAR</a>
                    <a href="eliminar.php">ELIMINAR</a>
                    <a href="listar_todo.php">LISTAR</a>


                </nav>
            
             

    </header>
    <style type="text/css">
a{
font:bold 50px Verdana;
text-decoration:none;
color:#a29693;
border:4px solid #a29693;
padding:10px 20px 10px 20px;
border-radius:5px;
transition:background .5s, color .5s;
}
</style>
         <section>
             <center>
                 
        <h2>Editar usuario</h2>
        <form action="../../controladores/controlusuario.php" method="POST">
                
                <fieldset style="width: 30%;text-align: left;">
                    
                    <table>
                        <tr>
                            <th style="text-align: right">Cedula:(*)</th>
                            <td><input type="number" name="cedula"   value="<?= @$usuario->cedula ?>" id="cedula" <?= ($usuario !=NULL)? "readonly" :  "required" ?>/></td>
                        </tr>
                        <tr>
                            <th style="text-align: right">Clave:</th>
                            <td><input type="password" name="clave"   id="clave" value="<?= @$usuario->clave ?>" 
                            <?= ($usuario != NULL)?"": "readonly" ?> /></td>
                        </tr>
                        <tr>
                            <th style="text-align: right">Nombre</th>
                            <td><input type="text" name="nombre"  id="nombre" value="<?= @$usuario->nombre ?>" 
                            <?= ($usuario !=NULL)?"": "readonly" ?>readonly/></td>
                        </tr>
                        <tr>
                            <th style="text-align: right">Telefono:</th>
                            <td><input type="tel" name="telefono"  id="telefono" value="<?= @$usuario->telefono ?>" 
                            <?= ($usuario !=NULL)?"": "readonly" ?>/></td>
                        </tr>
                         <tr>
                            <th style="text-align: right">email</th>
                            <td><input type="email" name="email"  id="correo" value="<?= @$usuario->email ?>" 
                            <?= ($usuario !=NULL)?"": "readonly" ?>/></td>
                        </tr>
       
                        <tr>
                             <td colspan="2">
                                  <input type="hidden" name="pagina" value="editar"/>
                                
                                 <input type="submit" name="accion" value="Buscar" id="accion"/>
                                 &nbsp;&nbsp;&nbsp;&nbsp;
                                 <input type="submit" name="accion" value="Editar" id="accion"/>
                                 &nbsp;&nbsp;&nbsp;&nbsp;
                                 <input type="reset" value="LIMPIAR"/>
                             </td>
                            </td>
                           
                        </tr>
                    </table>


                </fieldset>

                
            </form>
        <span style="color:red"><?= @$_REQUEST["mensaje"]?></span>
    </center>
        </section>
    </body>
</html>
