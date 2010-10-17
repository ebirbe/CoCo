<table class="decorado">
    <tr>
	<td>
	    <a name="cmt<?php echo $comentario->id ?>">Publicado por <strong><?php echo $comentario->nombre ?></strong> el <strong><?php echo $comentario->fecha ?></strong></a>
	    <?php
	    //echo kohana::debug($_SESSION);
	    if (isset($_SESSION["login"]))
	    {
		echo HTML::anchor("comentario/borrar/" . $comentario->id, HTML::image("media/img/iconos/delete_16.png")."Borrar");
		echo "\n";
		echo HTML::anchor("noticia/ver/" . $comentario->envio->id . "#cmt" . $comentario->id, HTML::image("media/img/iconos/search_16.png")."Ver");
	    }
	    ?>
	</td>
    </tr>
    <tr>
	<td>
	    <?php echo $comentario->contenido ?>
	</td>
    </tr>
</table>
