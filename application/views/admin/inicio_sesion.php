<?php
defined('SYSPATH') or die('No direct script access.');
echo Form::open();
?>
<table>
    <tr>
	<td colspan="2">
	    <h1>Inicio de Sesi&oacute;n</h1>
	</td>
    </tr>
    <tr>
	<td colspan="2">
	    <div class="mensaje"><?php echo $mensaje ?></div>
	</td>
    </tr>
    <tr>
	<td>
	    <b>Usuario:</b>
	</td>
	<td>
	    <?php echo Form::input("login") ?>
	</td>
    </tr>
    <tr>
	<td>
	    <b>Clave:</b>
	</td>
	<td>
	    <?php echo Form::password("clave") ?>
	</td>
    </tr>
    <tr>
	<td colspan="2">
	    <?php echo Form::button(NULL, HTML::image("media/img/iconos/ok.png")."Entrar") ?>
	</td>
    </tr>
</table>
<?php
	    echo Form::close();
?>