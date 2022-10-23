
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
                
        <h2>Agregar usuario</h2>
        <form action="../../controladores/controlusuario.php" method="POST">
                
                <fieldset style="width: 30%;text-align: left;">
                    <legend>ingrese los datos</legend>
                    <table>
                        <tr>
                            <th style="text-align: right">Cedula:(*)</th>
                            <td><input type="number" name="cedula" id="cedula" placeholder="ingrese el codigo" required></td>
                        </tr>
                        <tr>
                            <th style="text-align: right">Clave:(*)</th>
                            <td><input type="password" name="clave" id="clave" placeholder="ingrese la clave" required></td>
                        </tr>
                        <tr>
                            <th style="text-align: right">Nombre(*)</th>
                            <td><input type="text" name="nombre" id="nombre" placeholder="ingrese el E-MAIL"required></td>
                        </tr>
                        <tr>
                            <th style="text-align: right">Telefono:(*)</th>
                            <td><input type="tel" name="telefono" id="telefono" placeholder="ingrese el telefono"required></td>
                        </tr>
                         <tr>
                            <th style="text-align: right">email(*)</th>
                            <td><input type="email" name="email" id="correo" placeholder="ingrese el E-MAIL"required></td>
                        </tr>
       
                        <tr>
                             <td colspan="2">
                                 <input type="submit" name="accion" value="Guardar"></th>&nbsp;&nbsp;
                                 <input type="reset" value="LIMPIAR"></td>
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
