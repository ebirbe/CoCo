<h1>Personas Registradas en el Sistema</h1>
<?php
foreach ($personas as $fila)
{
?>
    <table class="no-color" onmouseover="colorear(this)" onmouseout="nocolorear(this)">
        <tr class="resaltar-tope">
	    <th>CEDULA:</th>
    	<td colspan="4"><?php echo $fila->cedula ?></td>
    	<td>
	    <?php echo HTML::anchor("persona/editar/" . $fila->id, HTML::image("media/img/iconos/pencil_16.png")."Editar")."<br>" ?>
	    <?php echo HTML::anchor("persona/borrar/" . $fila->id, HTML::image("media/img/iconos/delete_16.png")."Borrar") ?>
	</td>
    </tr>
    <tr>
	<th width="">NOMBRE:</th>
        <td width="150px"><?php echo $fila->nombre ?></td>
	<th width="">APELLIDO:</th>
        <td width="150px"><?php echo $fila->apellido ?></td>
	<th width="">F. NAC.:</th>
	<td><?php echo $fila->fecha_nac ?></td>
    </tr>
    <tr>
	<th>LLEGADA:</th>
	<td><?php echo $fila->fecha_llegada ?></td>
	<th>DIRECCION:</th>
	<td colspan="3"><?php echo $fila->direccion ?></td>
    </tr>
</table>
<?php
	}
?>