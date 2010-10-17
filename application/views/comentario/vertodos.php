<?php
foreach ($comentarios as $fila)
{
?>
    <table>
        <tr>
    	<td>
    	    <strong>
                		Publicaci&oacute;n:
    	    </strong>
	    <?php echo html::anchor("noticia/ver/" . $fila->envio->id, $fila->envio->titulo) ?>
	</td>
    </tr>
    <tr>
	<td>
	    <?php
	    echo View::factory("comentario/comentario")
		    ->set("comentario", $fila);
	    ?>
	<td>
    </tr>
</table>
<?php
	}
?>