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
     <header class="site-header inicio">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="../index.php">inicio</a></a>

                <nav id="navegacion" class="navegacion">
                    <a href="buscar.php">BUSCAR</a>
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
</style>
    <body style="background-image:url(../imagenes/1656613992273.webp) ;">
        <section>
             <center>
        <h2>Agregar Estudiante</h2>
        <form action="../../controladores/controlestudiantes.php" method="POST">
                
                <fieldset style="width: 30%;text-align: center;">
                    <legend>ingrese los datos</legend>
                    <table>
                        <tr>
                            <th style="text-align: right">ID(*)</th>
                            <td><input type="number" name="id" id="id" placeholder="ingrese el id" required></td>
                        </tr>
                        <tr>
                            <th style="text-align: right">CEDULA DEL USUARIO(*)</th>
                            <td><input type="number" name="usuario_id" id="usuario_id" placeholder="ingrese la cedula del usuario" required></td>
                        </tr>
                        <tr>
                            <th style="text-align: right">Nombre(*)</th>
                            <td><input type="text" name="nombre" id="nombre" placeholder="ingrese el E-MAIL"required></td>
                        </tr>
                        <tr>
                            <th style="text-align: right">APELLIDO(*)</th>
                            <td><input type="text" name="apellido" id="apellido" placeholder="ingrese el apellido"required></td>
                        </tr>
                        <tr>
                            <th style="text-align: right">SEMESTRE(*)</th>
                            <td><input type="number" name="semestre" id="semestre" placeholder="ingrese el semestre "required></td>
                        </tr>
                         <tr>
                            <th style="text-align: right">EMAIL(*)</th>
                            <td><input type="email" name="email" id="correo" placeholder="ingrese el E-MAIL"required></td>
                        </tr>
                        <tr>
                            <th style="text-align: right">GENERO(*)</th>
                            <td><input type="text" name="genero" id="genero" placeholder="ingrese el E-MAIL"required></td>
                        </tr>
                        <tr>
                            <th style="text-align: right">Telefono:(*)</th>
                            <td><input type="tel" name="telefono" id="telefono" placeholder="ingrese el telefono"required></td>
                        </tr>
                        <tr>
                            <th style="text-align: right">programa(*)</th>
                            <td><input type="text" name="programa" id="programa" placeholder="ingrese el programa"required></td>
                        </tr>
                        <tr>
                            <th style="text-align: right">UNIVERSIDAD(*)</th>
                            <td><input type="text" name="universidad" id="universidad" placeholder="ingrese la universidad"required></td>
                        </tr>

       
                        <tr>
                             <td colspan="2">
                                 <input type="submit" name="accion" value="Guardar"></th>&nbsp;&nbsp;
                                 <input type="reset" value="LIMPIAR"/></td>
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
