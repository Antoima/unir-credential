<?php
// getClientId.php

// Aquí defines el client_id o lo obtienes de alguna base de datos
$client_id = "472435009550-bek0e4bq0lb394f4bu5idjqe9k04b2mm.apps.googleusercontent.com";

// Devuelves el client_id en formato JSON
echo json_encode(['client_id' => $client_id]);
?>
