<?php
defined('SYSPATH') or die('No direct script access.');
?>
<table class="cpanel">
    <tr>
	<td colspan="5">
	    <h1>M&oacute;dulo de Administraci&oacute;n</h1>
	</td>
    </tr>
    <tr>
	<td>
	    <?php echo HTML::anchor("envio/subir_info/?cat=Noticias", HTML::image("media/img/iconos/clipboard_48.png") . "<br>Agregar Noticia") ?>
	</td>
	<td>
	    <?php echo HTML::anchor("envio/subir_info/?cat=Actividades", HTML::image("media/img/iconos/calendar_48.png") . "<br>Agregar Actividad") ?>
	</td>
	<td>
	    <?php echo HTML::anchor("envio/subir_info/?cat=Actas", HTML::image("media/img/iconos/documents.png") . "<br>Agregar Acta") ?>
	</td>
	<td>
	    <?php echo HTML::anchor("envio/subir_info/?cat=Historia", HTML::image("media/img/iconos/flag_48.png") . "<br>Agregar Historia") ?>
	</td>
	<td>
	    <?php echo HTML::anchor("envio/subir_info/?cat=Proyectos", HTML::image("media/img/iconos/briefcase_48.png") . "<br>Agregar Proyecto") ?>
	</td>
    </tr>
    <tr>
	<td>
	    <?php echo HTML::anchor("envio/subir_info/?cat=Educacion", HTML::image("media/img/iconos/pencil_48.png") . "<br>Agregar Educaci&oacute;n") ?>
	</td>
	<td>
	    <?php echo HTML::anchor("admin/registrar_persona", HTML::image("media/img/iconos/user.png") . "<br>Registrar Persona") ?>
	</td>
	<td>
	    <?php echo HTML::anchor("admin/todos_personas", HTML::image("media/img/iconos/search_48.png") . "<br>Ver Personas") ?>
	</td>
	<td>
	    <?php echo HTML::anchor("admin/todos_comentarios", HTML::image("media/img/iconos/char.png") . "<br>Ver Comentarios") ?>
	</td>
	<td>
	    <?php echo HTML::anchor("admin/salir", HTML::image("media/img/iconos/stop.png") . "<br>Salir") ?>
	</td>
    </tr>
</table>