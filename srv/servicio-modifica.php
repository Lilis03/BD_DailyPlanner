<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/recuperaEntero.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/validaPrecio.php";
require_once __DIR__ . "/../lib/php/validaAnticipo.php";
require_once __DIR__ . "/../lib/php/validaDescripcion.php";
require_once __DIR__ . "/../lib/php/update.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_servicios.php";

ejecutaServicio(function () {

  $id = recuperaIdEntero("id");
  $nombre_servicio = recuperaTexto("nombre_servicio");
  $nombre_servicio = validaNombre($nombre_servicio);

  $descripcion = recuperaTexto("descripcion");
  $descripcion = validaDescripcion($descripcion);

  $anticipo = recuperaEntero("anticipo");
  $anticipo = validaAnticipo($anticipo);  

  $precio = recuperaEntero("precio");
  $precio = validaPrecio($precio);

 update(
  pdo: Bd::pdo(),
  table: servicios,
  set: [
  nombre_servicio => $nombre_servicio,
  descripcion => $descripcion,
  anticipo => $anticipo,
  precio => $precio
],
  where: [id_servicio => $id]
 );

 devuelveJson([
  "id" => ["value" => $id],
  "nombre_servicio" => ["value" => $nombre_servicio],
  "descripcion" => ["value" => $descripcion],
  "anticipo" => ["value" => $anticipo],
  "precio" => ["value" => $precio]
 ]);
});
