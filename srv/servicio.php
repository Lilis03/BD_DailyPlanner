<?php

require_once __DIR__ . "/../lib/php/NOT_FOUND.php";
require_once __DIR__ . "/../lib/php/ejecutaServicio.php";
require_once __DIR__ . "/../lib/php/recuperaIdEntero.php";
require_once __DIR__ . "/../lib/php/selectFirst.php";
require_once __DIR__ . "/../lib/php/ProblemDetails.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/Bd.php";
require_once __DIR__ . "/TABLA_servicios.php";

ejecutaServicio(function () {

 $id = recuperaIdEntero("id");

 $modelo =
  selectFirst(pdo: Bd::pdo(),  from: servicios,  where: [id_servicio => $id]);

 if ($modelo === false) {
  $idHtml = htmlentities($id);
  throw new ProblemDetails(
   status: NOT_FOUND,
   title: "Servicio no encontrado.",
   type: "/error/tareanoencontrada.html",
   detail: "No se encontró ningun servicio con el id $idHtml.",
  );
 }

 devuelveJson([
    "id" => ["value" => $id],
    "nombre_servicio" => ["value" => $modelo[nombre_servicio]],
    "descripcion" => ["value" => $modelo[descripcion]],
    "anticipo" => ["value" => $modelo[anticipo]],
    "precio" => ["value" => $modelo[precio]],
    "created_at" => ["value" => $modelo[created_at]],
 ]);
});
