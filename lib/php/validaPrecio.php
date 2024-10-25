<?php

require_once __DIR__ . "/BAD_REQUEST.php";
require_once __DIR__ . "/ProblemDetails.php";

function validaPrecio(false|String $precio)
{

 if ($precio === false)
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Falta el Precio.",
   type: "/error/faltaprecio.html",
   detail: "La solicitud no contiene el precio."
  );

 $trimPrecio = trim($precio);

 if ($trimPrecio === "")
  throw new ProblemDetails(
   status: BAD_REQUEST,
   title: "Precio en blanco.",
   type: "/error/precioenblanco.html",
   detail: "Agrega un valor en el campo precio.",
  );

 return $trimPrecio;
}