<?php

//Cargamos el archivo autoload para poder tener configurado el namespace de App (src)
require_once dirname(__DIR__).'/vendor/autoload.php';
use App\Kernel;

$kernel = new Kernel();