<?php
defined('SYSPATH') or die('No direct script access.');
?>
<!-- ENVIO -->
<table class="envio">
    <tr>
	<td class="nota">
	    Publicado el <strong><?php echo $envio->fecha; ?></strong> por <strong><?php echo $envio->usuario->login ?></strong>
	</td>
    </tr>
    <tr>
	<td>
	    <h2>
		<?php echo HTML::anchor("noticia/ver/" . $envio->id, $envio->titulo); ?>
	    </h2>
	</td>
    </tr>
    <tr>
	<td class="cont">
	    <?php echo $envio->contenido ?>
    	</td>
        </tr>
        <tr>
    	<td class="pie">
	    <?php
		echo View::factory("envio/pie")
			->set("envio", $envio);
	    ?>
    	</td>
        </tr>
    </table>
    <!-- FIN ENVIO -->
<?php
		if (isset($mostrar_comentarios) && $mostrar_comentarios == TRUE)
		{
		    echo View::factory("comentario/lista")
			    ->set("envio", $envio);
		}
?>