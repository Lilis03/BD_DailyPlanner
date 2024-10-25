<?php

require_once __DIR__ . "/BAD_REQUEST.php";
require_once __DIR__ . "/ProblemDetails.php";

function validaAnticipo(false|String $anticipo)
{

 if ($anticipo === false)
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Falta confirmar si el servicio necesita un anticipo.",
   type: "/error/faltaanticipo.html",
   detail: "La solicitud no contiene el anticipo."
  );

 $trimAnticipo = trim($anticipo);

 if ($trimAnticipo === "")
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Anticipo en blanco.",
   type: "/error/anticipoenblanco.html",
   detail: "Selecciona un valor en el campo anticipo.",
  );

 return $trimAnticipo;
}