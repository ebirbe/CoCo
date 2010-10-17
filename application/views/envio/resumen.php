<?php

defined('SYSPATH') or die('No direct script access.');

// $joins es para recorrer la lista de objetos
// traidos con la clausula JOIN de SQL atraves del ORM
//foreach ($envios as $joins)
//{
foreach ($envios as $fila)
{
    echo View::factory("envio/envio")
	    ->set("envio", $fila);
}
?>