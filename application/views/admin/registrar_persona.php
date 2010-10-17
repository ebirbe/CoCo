<?php
defined('SYSPATH') or die('No direct script access.');
?>
<?php echo HTMl::script("media/js/scw.js") ?>
<?php echo Form::open() ?>
<table class="decorado">
    <tr>
	<td colspan="3">
	    <h1>Registro de Personas</h1>
	</td>
    </tr>
    <?php if( ! $exito) : ?>
    <tr>
    	<td colspan="3" class="mensaje">
	    <?php echo Kohana::message("usuario", "error_formulario") ?>
	</td>
    </tr>
    <?php endif ?>
    <tr>
	<td>
	    <?php echo Form::label("cedula", "C&eacute;dula") ?>
	</td>
	<td>
	    <?php echo Form::input("cedula", Arr::get($formulario, "cedula")) ?>
	</td>
	<td>
	   <?php echo Arr::get($errores, "cedula") ?>
	</td>
    </tr>
    <tr>
	<td>
	    <?php echo Form::label("nombre", "Nombre") ?>
	</td>
	<td>
	    <?php echo Form::input("nombre", Arr::get($formulario, "nombre")) ?>
	</td>
	<td>
	   <?php echo Arr::get($errores, "nombre")?>
	</td>
    </tr>
    <tr>
	<td>
	    <?php echo Form::label("apellido", "Apellido") ?>
	</td>
	<td>
	    <?php echo Form::input("apellido", Arr::get($formulario, "apellido")) ?>
	</td>
	<td>
	   <?php echo Arr::get($errores, "apellido")?>
	</td>
    </tr>
    <tr>
	<td>
	    <?php echo Form::label("fecha_nac", "Fecha de Nac.") ?>
	</td>
	<td>
	    <?php echo Form::input("fecha_nac", Arr::get($formulario, "fecha_nac"), array("onClick" => "scwShow(this, event)", "readonly" => "readonly")) ?>
	</td>
	<td>
	   <?php echo Arr::get($errores, "fecha_nac")?>
	</td>
    </tr>
    <tr>
	<td>
	    <?php echo Form::label("direccion", "Direcci&oacute;n") ?>
	</td>
	<td>
	    <?php echo Form::input("direccion", Arr::get($formulario, "direccion"), array("size" => "30")) ?>
	</td>
	<td>
	   <?php echo Arr::get($errores, "direccion")?>
	</td>
    </tr>
    <tr>
	<td>
	    <?php echo Form::label("fecha_llegada", "Fecha Llegada") ?>
	</td>
	<td>
	    <?php echo Form::input("fecha_llegada", Arr::get($formulario, "fecha_llegada"), array("onClick" => "scwShow(this, event)", "readonly" => "readonly")) ?>
	</td>
	<td>
	   <?php echo Arr::get($errores, "fecha_llegada")?>
	</td>
    </tr>
    <tr>
	<td colspan="3">
	    <?php echo Form::submit(NULL, "Registrar") ?>
	</td>
    </tr>
</table>
<?php echo Form::close() ?>
