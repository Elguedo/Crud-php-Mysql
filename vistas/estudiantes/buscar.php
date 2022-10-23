<?php
session_start();
include_once $_SERVER["DOCUMENT_ROOT"]."/CRUD-ESTUDIANTES/models/Estudiante.php";

$estudiante= @$_SESSION["estudiante.encontrado"];
$estudiante= @unserialize($estudiante);
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
                    <a href="eliminar.php">ELIMINAR</a>
                    <a href="editar.php">EDITAR</a>
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
</style >
        
        <section>
             <center>
        <h2>Buscar Estudiante</h2>
        <form action="../../controladores/controlestudiantes.php" method="POST">
                
                <fieldset style="width: 30%;text-align: center;">
                    <legend>ingrese el ID para buscar el estudiante</legend>
                    <table>
                        <tr>
                            <th style="text-align: right">Id(*)</th>
                            <td><input type="number" name="id" id="id"  value="<?= @$estudiante->id ?>"  required></td>
                        </tr>
                        <tr>
                            <th style="text-align: right">Cedula del usuario:</th>
                            <td><input type="number" name="usuario_id" readonly  id="usuario_id" value="<?= @$estudiante->usuario_id ?>"  /></td>
                        </tr>
                        <tr>
                            <th style="text-align: right">Nombre</th>
                            <td><input type="text" name="nombre" readonly  id="nombre" value="<?= @$estudiante->nombre ?>" /></td>
                        </tr>
                        <tr>
                            <th style="text-align: right">Apellido</th>
                            <td><input type="text" name="apellido" readonly  id="apellido" value="<?= @$estudiante->apellido?>" /></td>
                        </tr>
                        <tr>
                            <th style="text-align: right">Semestre</th>
                            <td><input type="number" name="semestre" readonly id="semestre" value="<?= @$estudiante->semestre?>" /></td>
                        </tr>
                         <tr>
                            <th style="text-align: right">Email</th>
                            <td><input type="email" name="email" readonly id="correo" value="<?= @$estudiante->email ?>" /></td>
                        </tr>
                        <tr>
                            <th style="text-align: right">Genero</th>
                            <td><input type="text" name="genero" readonly id="genero" value="<?= @$estudiante->genero ?>" /></td>
                        </tr>
                        <tr>
                            <th style="text-align: right">Telefono:</th>
                            <td><input type="tel" name="telefono" readonly id="telefono" value="<?= @$estudiante->telefono ?>" /></td>
                        </tr>
                        <tr>
                            <th style="text-align: right">Programa</th>
                            <td><input type="text" name="programa" readonly id="programa" value="<?= @$estudiante->programa ?>"/></td>
                        </tr>
                        <tr>
                            <th style="text-align: right">UNIVERSIDAD</th>
                            <td><input type="text" name="universidad" readonly id="universidad"  value="<?= @$estudiante->universidad?>"/></td>
                        </tr>
       
                        <tr>
                             <td colspan="2">
                                 <input type="hidden" name="pagina" value="buscar"/>
                                 <input type="submit" name="accion" value="Buscar" id="accion"/>
                                 &nbsp;&nbsp;
                                 <input type="reset" value="LIMPIAR"/>
                                </td>
                            </td>
                           
                        </tr>
                    </table>


                </fieldset>

                
            </form>
        <span style="color:red"><?= @($_REQUEST["mensaje"])?></span>
    </center>
        </section>
        
        
        
    </body>
</html>
