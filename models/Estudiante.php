<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/CRUD-ESTUDIANTES/libs/configuracion.php";

class Estudiante extends ActiveRecord\Model{
   public static $table_name="estudiantes";
   public static $primary_key ="id";
    
   
           
    
}
