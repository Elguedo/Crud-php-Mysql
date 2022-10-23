<?php

include_once $_SERVER["DOCUMENT_ROOT"]."/CRUD-ESTUDIANTES/libs/configuracion.php";

class Usuario extends ActiveRecord\Model{
  static $table_name="usuarios";
  public static $primary_key ="cedula";
static $belongs_to =array(array("estudiante"));
}
