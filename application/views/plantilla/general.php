<html>
    <head>
	<title><?php echo $titulo ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<?php echo HTML::style("media/css/general.css") ?>
	<script type="text/javascript">
	    function colorear(obj){
		obj.setAttribute("class", "color");
	    }
	    function nocolorear(obj){
		obj.setAttribute("class", "no-color");
	    }
	</script>
    </head>
    <body>
	<!-- CABECERA -->
	<table style="background-color: white; width: 100%;" border="0">
	    <tr>
		<td style="text-align: left">
		    <?php echo HTML::image("media/img/gobierno.gif"); ?>
		</td>
		<td style="text-align: right">
		    <?php echo HTML::image("media/img/bicentenario.gif"); ?>
		</td>
	    </tr>
	    <tr style="background-color: red; line-height: 1px;">
		<td colspan="3">&nbsp;</td>
	    </tr>
	</table>
	<table class="cabecera" border="0">
	    <tr>
		<td colspan="2">
		    <h1>
			<?php echo HTML::anchor(NULL, $nombre_consejo); ?>
		    </h1>
		</td>
	    </tr>
	</table>
	<table class="menu-sup">
	    <tr>
		<td>
		    <?php echo Model_Ui::hacer_menu_superior(); ?>
    		</td>
    	    </tr>
    	</table>
    	<table class="borde"><tr><td>&nbsp;</td></tr></table>
    	<!-- FIN CABECERA -->

    	<!-- CUERPO -->
    	<table class="cuerpo">
    	    <tr>
    		<td class="menu-izq">
    		    <!-- MENU -->
    		    <table>
    			<tr>
    			    <td class="arriba" colspan="3">
    				<b>Men&uacute;</b>
    			    </td>
    			</tr>
    			<tr>
    			    <td class="izq">&nbsp;</td>
    			    <td>
				<?php echo Model_Ui::hacer_menu_lateral(); ?>
			    </td>
			    <td class="der">&nbsp;</td>
			</tr>
			<tr>
			    <td class="abajo" colspan="3">&nbsp;</td>
			</tr>
		    </table>
		    <!-- FIN MENU -->
		    <?php echo $admin_lateral ?>
	    		    <!-- MENU -->
	    		    <table>
	    			<tr>
	    			    <td class="arriba" colspan="3">
	    				<b>Lo m&aacute;s reciente</b>
	    			    </td>
	    			</tr>
	    			<tr>
	    			    <td class="izq">&nbsp;</td>
	    			    <td>
				<?php echo Model_Ui::hacer_lo_mas_reciente() ?>
			    </td>
			    <td class="der">&nbsp;</td>
			</tr>
			<tr>
			    <td class="abajo" colspan="3">&nbsp;</td>
			</tr>
		    </table>
		    <!-- FIN MENU -->
		    <div class="portales">
			<?php echo HTML::anchor("http://www.infocentro.gob.ve/", HTML::image("media/img/infocentro.jpg")); ?>
				<br>
			<?php echo HTML::anchor("http://www.mintur.gob.ve/", HTML::image("media/img/venezuela.jpg")); ?>
				<br>
			<?php echo HTML::anchor("media/pdf/locc.pdf", HTML::image("media/img/ley-consejo-comunal.png")); ?>
			    </div>
			</td>
			<!-- CONTENIDO -->
			<td class="contenido">
		    <?php echo $contenido ?>
	    		</td>
	    		<!-- FIN CONTENIDO -->
	    	    </tr>
	    	</table>
	    	<!-- FIN CUERPO -->
	    	<!-- PIE DE PAGINA -->
	    	<table class="pie-pagina">
	    	    <tr>
	    		<td>
	    	        		    Rep&uacute;blica Bolivariana de Venezuela
	    		    <br>
		    <?php echo $nombre_consejo ?>
	    		    <br>
		    <?php echo HTML::anchor("admin", "Administraci&oacute;n"); ?>
		</td>
	    </tr>
	</table>
	<!-- FIN PIE DE PAGINA -->
    </body>
</html>