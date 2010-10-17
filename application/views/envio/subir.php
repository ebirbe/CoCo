<?php
defined('SYSPATH') or die('No direct script access.');
?>
<?php
// Opciones de configuracion del editor WYSIWYG
echo View::factory("envio/script_config");
if ($cat == "Actividades")
{
    $actividad = TRUE;
    echo HTMl::script("media/js/scw.js");
}
else
{
    $actividad = FALSE;
}
?>
<?php if (!$actividad)
{ ?>
    <script language="javascript" type="text/javascript">
        WYSIWYG.attach("contenido", personalizado);
    </script>
<?php
}
?>
<script language="javascript">

    function nueva_ventana(url, nombre, ancho, alto){
	window.open(url, nombre, "width="+ancho+",height="+alto+",directories=NO,location=NO,menubar=NO,status=NO,titlebar=NO,toolbar=NO");
	return 0;
    }

    function validar(){
	// Limpia los valores en caso de haber errores anteriores
	document.getElementById("msj_titulo").innerHTML = "";
	document.getElementById("msj_fecha").innerHTML = "";
	document.getElementById("msj_hora").innerHTML = "";
	document.getElementById("msj_lugar").innerHTML = "";

	error = 0;
	// Titulo
	if (document.fenvio.titulo.value.length==0){
	    document.fenvio.titulo.focus();
	    document.getElementById("msj_titulo").innerHTML = "Titulo no debe estar vacio";
	    error++;
	}
	// Fecha
	if (document.fenvio.fecha.value.length==0){
	    document.fenvio.fecha.focus();
	    document.getElementById("msj_fecha").innerHTML = "Indique una fecha";
	    error++;
	}
	// Hora
	if (document.fenvio.hora.value.length==0){
	    document.fenvio.hora.focus();
	    document.getElementById("msj_hora").innerHTML = "Indique una hora";
	    error++;
	}
	// Lugar
	if (document.fenvio.lugar.value.length==0){
	    document.fenvio.lugar.focus();
	    document.getElementById("msj_lugar").innerHTML = "Indique un lugar";
	    error++;
	}
	if(error){
	    return 0;
	}else{

	    document.fenvio.submit();
	}
    }
</script>
<?php echo FORM::open(NULL, array("name" => "fenvio")) ?>
<?php echo Form::hidden("usuario_id", $usuario_id) ?>
<?php echo Form::hidden("cat", $cat) ?>
<table class="decorado">
    <tr>
	<td>
	    <?php echo Form::label("titulo", "Titulo:") ?>
	    <div class="mensaje" id="msj_titulo"><?php echo $errores["titulo"] ?></div>
	</td>
    </tr>
    <tr>
	<td>
	    <?php echo Form::input("titulo", $formulario["titulo"], array("size" => "50")) ?>
	</td>
    </tr>
    <?php
	    if ($actividad)
	    {
    ?>
	        <tr>
	    	<td>
	    <?php echo Form::label("fecha", "Fecha de Inicio de la Actividad:") ?>
    	    <div class="mensaje" id="msj_fecha"></div>
    	</td>
        </tr>
        <tr>
    	<td>
	    <?php echo Form::input("fecha", Arr::get($formulario, "fecha"), array("onClick" => "scwShow(this, event)", "readonly" => "readonly")) ?>
    	</td>
        </tr>
        <tr>
    	<td>
	    <?php echo Form::label("hora", "Hora:") ?>
    	    <div class="mensaje" id="msj_hora"></div>
    	</td>
        </tr>
        <tr>
    	<td>
	    <?php echo Form::input("hora", NULL) ?>
    	</td>
        </tr>
        <tr>
    	<td>
	    <?php echo Form::label("lugar", "Lugar:") ?>
    	    <div class="mensaje" id="msj_lugar"></div>
    	</td>
        </tr>
        <tr>
    	<td>
	    <?php echo Form::input("lugar", NULL) ?>
    	</td>
        </tr>
        <tr>
    	<td>
	    <?php echo Form::label("contenido", "Contenido:") ?>
    	    <div class="mensaje"><?php echo $errores["contenido"] ?></div>
    	</td>
        </tr>
        <tr>
    	<td>
	    <?php echo Form::textarea("contenido", $formulario["contenido"], array("id" => "contenido")) ?>
    	</td>
        </tr>
        <tr>
    	<td>
    	    <input type="button" value="Publicar" onclick="validar()">
    	</td>
        </tr>
    <?php
	    }
	    else
	    {
    ?>
	        <tr>
	    	<td>
	    <?php echo Form::label("contenido", "Contenido:") ?>
    	    <div class="mensaje"><?php echo $errores["contenido"] ?></div>
    	</td>
        </tr>
        <tr>
    	<td>
	    <?php echo Form::textarea("contenido", $formulario["contenido"], array("id" => "contenido")) ?>
    	</td>
        </tr>
    <?php
	    }// FIN IF
    ?>
	</table>
<?php echo FORM::close() ?>
<?php
	    if (!$actividad)
	    {
?>
<button onclick="nueva_ventana('<?php echo URL::site("imagen/subir") ?>','galeria',640,480)">Abrir Galer&iacute;a de Im&aacute;genes</button>
<?php
	    }// FIN IF
?>