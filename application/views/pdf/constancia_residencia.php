<html>
    <head>
	<title>Constancia de residencia</title>
	<?php echo HTML::style("media/css/constancia.css") ?>
	<script language="javascript">
	    function imprimir(){
		print();
	    }
	</script>
    </head>
    <body>
	<table>
	    <tr>
		<td colspan="2" class="encabezado">
		    Rep&uacute;blica Bolivariana de Venezuela
		    <br>
		    <?php echo $nombre_consejo ?>
		    <br>
		    <?php echo $ciudad ?> - Estado <?php echo $estado ?>
		</td>
	    </tr>
	    <tr>
		<td colspan="2">
		    <p class="fecha">
			<?php echo $ciudad ?>, <?php echo $dia ?> de <?php echo $mes ?> de <?php echo $anio ?>
		    </p>
		    <h2 class="centro">CONSTANCIA DE RESIDENCIA</h2>
		    <p class="texto">
			<?php echo $destinatario ?>:
		    </p>
		    <p class="texto">
    			Por medio de la presente hacemos constar que <strong><?php echo $solicitante->nombre ?>
			    <?php echo $solicitante->apellido ?></strong> portador de la c&eacute;dula de indetidad n&uacute;mero
			<strong><?php echo $solicitante->cedula ?></strong>, vive desde hace
			<strong><?php echo $solicitante->total_anios() ?> a&ntilde;os</strong> en esta
			comunidad bajo la direcci&oacute;n <strong><?php echo $solicitante->direccion ?></strong>. Teniendo como testigos a
    			<strong><?php echo $testigo_a->nombre ?> <?php echo $testigo_a->apellido ?></strong>, portador de la
                			c&eacute;dula de identidad n&uacute;mero <?php echo $testigo_a->cedula ?> y a
    			<strong><?php echo $testigo_b->nombre ?> <?php echo $testigo_b->apellido ?></strong>, portador de la
                			c&eacute;dula de identidad n&uacute;mero <?php echo $testigo_b->cedula ?> de quienes se anexa copia
                			de sus respectivos documentos de identificaci&oacute;n.
    		    </p>
    		    <p class="texto">
                			Se extiende esta constancia de residencia a petici&oacute;n del interesado, para los fines
                			legales que desee destinarla.
    		    </p>
    		    <p class="centro">Atentamente,</p>
    		</td>
    	    </tr>
    	    <tr>
    		<td colspan="2">
    		    <p class="centro">
			<?php echo $encargado_constancia ?>
    			<br>
			<?php echo $nombre_consejo ?>
    		    </p>
    		</td>
    	    </tr>
    	    <tr>
		<td class="centro">
			<?php echo $testigo_a->nombre ?> <?php echo $testigo_a->apellido ?>
    			<br>
			<?php echo $testigo_a->cedula ?>
    		</td>
		<td class="centro">
    		    
			<?php echo $testigo_b->nombre ?> <?php echo $testigo_b->apellido ?>
    			<br>
			<?php echo $testigo_b->cedula ?>
		</td>
	    </tr>
	    <tr>
		<td colspan="2">
		    <p class="postdata">
			PD: Este documento no es valido sin la firma y el sello autorizado.
		    </p>
		</td>
	    </tr>
	</table>
    </body>
</html>
<script language="javascript">
    imprimir();
</script>
