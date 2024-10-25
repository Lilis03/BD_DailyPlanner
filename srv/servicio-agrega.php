<?php

require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/recuperaEntero.php";
require_once __DIR__ . "/../lib/php/validaNombre.php";
require_once __DIR__ . "/../lib/php/validaPrecio.php";
require_once __DIR__ . "/../lib/php/validaAnticipo.php";
require_once __DIR__ . "/../lib/php/validaDescripcion.php";
require_once __DIR__ . "/../lib/php/insert.php";
require_once __DIR__ . "/../lib/php/devuelveCreated.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_servicios.php";

ejecutaServicio(function () {

    $nombre_servicio = recuperaTexto("nombre_servicio");
    /*$nombre_servicio = validaTitulo($nombre_servicio);*/

    $descripcion = recuperaTexto("descripcion");
    /*$descripcion = validaDescripcion($descripcion);
*/
    $anticipo = recuperaEntero("anticipo");
  /*  $anticipo = validaanticipo($anticipo);  
*/
    $precio = recuperaEntero("precio");
  /*  $precio = validaprecio($precio);
*/
    $created_at = time();

 $pdo = Bd::pdo();
 if (!$pdo) {
  die("Error al conectar con la base de datos.");
}

 insert(pdo: $pdo, into: servicios, values: [
      nombre_servicio => $nombre_servicio,
      descripcion => $descripcion,
      anticipo => $anticipo,
      precio => $precio,
      created_at => $created_at,
 ]);
 $id = $pdo->lastInsertId();

 $encodeId = urlencode($id);
 devuelveCreated("/srv/servicio.php?id=$encodeId", [
  "id" => ["value" => $id],
  "nombre_servicio" => ["value" => $nombre_servicio],
  "descripcion" => ["value" => $descripcion],
  "anticipo" => ["value" => $anticipo],
  "precio" => ["value" => $precio],
  "created_at" => ["value" => $created_at]
 ]);
});
