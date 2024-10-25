<?php

require_once __DIR__ . "/BAD_REQUEST.php";
require_once __DIR__ . "/ProblemDetails.php";

function validaNombre(false|string $nombre_servicio)
{

 if ($nombre_servicio === false)
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Falta el nombre del servicio.",
   type: "/error/faltanombre.html",
   detail: "La solicitud no tiene el valor de nombre."
  );

 $trimNombre = trim($nombre_servicio);

 if ($trimNombre === "")
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Nombre en blanco.",
   type: "/error/nombreenblanco.html",
   detail: "Pon texto en el campo título.",
  );

 return $trimNombre;
}
