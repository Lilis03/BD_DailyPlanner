<?php

class Bd
{
 private static ?PDO $pdo = null;

 static function pdo(): PDO
 {
  if (self::$pdo === null) {

   self::$pdo = new PDO(
    // cadena de conexión
    "sqlite:dailyplanner.db",
    // usuario
    null,
    // contraseña
    null,
    // Opciones: pdos no persistentes y lanza excepciones.
    [PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
   );

   self::$pdo->exec(
    "CREATE TABLE IF NOT EXISTS servicios (
      id_servicio INTEGER,
      nombre_servicio TEXT,
      descripcion TEXT,
      anticipo NUMERIC,
      precio NUMERIC,
      created_at TEXT,
      CONSTRAINT id_servicio_PK
       PRIMARY KEY(id_servicio))
   ");
  }

  return self::$pdo;
 }
}
