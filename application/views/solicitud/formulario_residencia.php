<table class="envio">
    <tr>
	<td colspan="3">
	    <h2>Constancia de Residencia</h2>
	</td>
    </tr>
    <tr class="cont">
	<td colspan="3">
	    <p>
		Llena este formulario para hacer la solicitud de tu Constancia de Residencia.
	    </p>
	    <p>
		Es importante que sepas que para poder hacer las solicitudes automatizadas debes
		estar registrado en el sistema. Si aun no estas registrado en el sistema debes
		contactar con tu consejo comunal y solicitar que te inscriban, es un proceso muy
		rapido y f&aacute;cil que no toma mas de 15 minutos.
	    </p>
	    <p>
		El registro es unico, es decir, que solo se realiza una sola vez
		y no es necesario volver a realizarlo cada vez que vayas a solicitar
		tus constancias.
	    </p>
	    <p>
		Si tienes dudas, comunicate con tu consejo comunal y ellos estan
		capacitados para darte la mayor y mejor informaci&oacute;n.
	    </p>
	</td>
    </tr>
</table>
<br>
<br>
<?php echo Form::open() ?>
<table class="envio">
    <tr>
	<td>
	    <h2>Formulario de Solicitud</h2>
	</td>
    </tr>
    <tr>
	<td>
	    <?php echo Form::label("cedula_solic", "C&eacute;dula del Solicitante") ?>
	</td>
	<td>
	    <?php echo Form::input("cedula_solic", Arr::get($formulario, "cedula_solic")) ?>
	</td>
	<td>
	    <?php echo Arr::get($errores, "cedula_solic") ?>
	</td>
    </tr>
    <tr>
	<td>
	    <?php echo Form::label("testigo_a", "C&eacute;dula del Testigo 1") ?>
	</td>
	<td>
	    <?php echo Form::input("testigo_a", Arr::get($formulario, "testigo_a")) ?>
	</td>
	<td>
	    <?php echo Arr::get($errores, "testigo_a") ?>
	</td>
    </tr>
    <tr>
	<td>
	    <?php echo Form::label("testigo_b", "C&eacute;dula del Testigo 2") ?>
	</td>
	<td>
	    <?php echo Form::input("testigo_b", Arr::get($formulario, "testigo_b")) ?>
	</td>
	<td>
	    <?php echo Arr::get($errores, "testigo_b") ?>
	</td>
    </tr>
    <tr>
	<td>
	    <?php echo Form::label("destinatario", "Destinatario") ?>
	</td>
	<td>
	    <?php echo Form::input("destinatario", Arr::get($formulario, "destinatario")) ?>
	</td>
	<td>
	    <?php echo Arr::get($errores, "destinatario") ?>
	</td>
    </tr>
    <tr>
	<td>
	    <?php echo Form::submit(NULL, "Enviar") ?>
	</td>
    </tr>
</table>
<?php echo Form::close() ?>