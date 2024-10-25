<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/select.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_servicios.php";

ejecutaServicio(function () {

 $lista = select(pdo: Bd::pdo(),  from: servicios,  orderBy: nombre_servicio);

 $render = "";
 foreach ($lista as $modelo) {
  $encodeId = urlencode($modelo[id_servicio]);
  $id = htmlentities($encodeId);
  $titulo = htmlentities($modelo[nombre_servicio]);
  $descripcion = htmlentities($modelo[descripcion]);
  $anticipo = htmlentities($modelo[anticipo]);
  $precio = htmlentities($modelo[precio]);
  $created_at = htmlentities($modelo[created_at]);
  
  $render .=
  "<dl>
    <dt><strong><a href='modifica.html?id=$id'>$titulo</a></strong></dt>
      <dd><strong>Descripción: </strong>{$descripcion}</dd>
      <dd><strong>Precio: </strong>{$precio}</dd>
      <dd><strong>Anticipo: </strong>{$anticipo}</dd>
  </dl>";
 }

 devuelveJson(["lista" => ["innerHTML" => $render]]);
});
