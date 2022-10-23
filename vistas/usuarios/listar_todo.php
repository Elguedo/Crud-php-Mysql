<?php
session_start();
include_once $_SERVER["DOCUMENT_ROOT"]."/CRUD-ESTUDIANTES/models/Usuario.php";

$lista_usuarios= @$_SESSION["lista_usuarios"];
$lista_usuarios= unserialize($lista_usuarios);
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
                    <a href="editar.php">EDITAR</a>
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
                 
        <h2>REPORTE DE LOS USUARIOS REGISTRADOS</h2>
        <hr/>


        <?php
        if (@$_SESSION['lista_usuarios'] !=NULL){

            ?>

            <table border="1">
            <tr>
                <th >Item</th>
                <th >cedula</th>
                <th >Nombre</th>
                
            </tr>
            <?php
            foreach($lista_usuarios as $indice => $usuario){
                ?>
            <tr>
                <td> 
                    <?= ($indice +1) ?> 
            </td>
                <td> 
                    <?= @$usuario->cedula ?> 
            </td>
                <td> 
                    <?= @$usuario->nombre ?> 
            </td>
            </tr>

            <?php
        }
        ?>
  </table>   
<?php
        }
        ?>
          <br/>
          <hr/> 
        <span ><?= @$_REQUEST["mensaje"]?></span>
    </center>
    
    </body>
</html>
