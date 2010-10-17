<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<?php echo HTML::style("media/css/general.css") ?>
    </head>
    <body>
	<a name="cmt"><h3>Com&eacute;ntanos lo que opinas</h3></a>
	<?php
	echo View::factory("comentario/subir")
		->set("envio", $envio);
	?>
	<h3>Comentarios de los Usuarios</h3>
	<?php
	foreach ($envio->comentarios->find_all() as $fila)
	{
	    echo View::factory("comentario/comentario")
		    ->set("comentario", $fila);
	}
	?>
    </body>
</html>
