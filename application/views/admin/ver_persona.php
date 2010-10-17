<?php
defined('SYSPATH') or die('No direct script access.');
?>
<table>
    <tr>
	<td colspan="2">
	    <h1>Datos de <?php echo $persona->nombre ?> <?php echo $persona->apellido ?></h1>
	</td>
    </tr>
    <tr>
	<td>
	    <strong>C&eacute;dula</strong>
	</td>
	<td>
	    <?php echo $persona->cedula ?>
	</td>
    </tr>
    <tr>
	<td>
	    <strong>Nombre</strong>
	</td>
	<td>
	    <?php echo $persona->nombre ?>
	</td>
    </tr>
    <tr>
	<td>
	    <strong>Apellido</strong>
	</td>
	<td>
	    <?php echo $persona->apellido ?>
	</td>
    </tr>
    <tr>
	<td>
	    <strong>Fecha de Nac.</strong>
	</td>
	<td>
	    <?php echo $persona->fecha_nac ?>
	</td>
    </tr>
    <tr>
	<td>
	    <strong>Direcci&oacute;n</strong>
	</td>
	<td>
	    <?php echo $persona->direccion ?>
	</td>
    </tr>
    <tr>
	<td>
	    <strong>Fecha Llegada</strong>
	</td>
	<td>
	    <?php echo $persona->fecha_llegada ?>
	</td>
    </tr>
</table>
