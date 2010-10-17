<table>
    <tr>
	<?php
	if (isset($_SESSION['login']))
	{
	?>
    	<td>
	    <?php echo HTML::anchor("envio/editar/" . $envio->id, HTML::image("media/img/iconos/pencil_32.png", array("title"=>"Editar"))."Editar"); ?>
	</td>
	<td>
	    <?php echo HTML::anchor("envio/borrar/" . $envio->id, HTML::image("media/img/iconos/delete_32.png", array("title"=>"Borrar"))."Borrar"); ?>
	</td>
	<?php
	}
	?>
	<td>
	    <?php echo HTML::anchor("noticia/ver/" . $envio->id . "#cmt", HTML::image("media/img/iconos/discussion.png", array("title"=>"Comentarios")) . "(" . $envio->comentarios->num_comentarios() . ")"); ?>
	</td>
	<td>
	    <strong><?php echo $envio->categorias->find()->nombre; ?></strong>
	</td>
    </tr>
</table>
