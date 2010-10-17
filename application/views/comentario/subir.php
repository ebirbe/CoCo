<script language="javascript">
    function validar(){
	// Limpia los valores en caso de haber errores anteriores
	document.getElementById("msj_nombre").innerHTML = "";
	document.getElementById("msj_contenido").innerHTML = "";
	
	error = 0;
	//valido el nombre
	if (document.fcoment.nombre.value.length==0){
	    document.fcoment.nombre.focus();
	    document.getElementById("msj_nombre").innerHTML = "Tienes que escribir tu nombre";
	    error++;
	}

	if (document.fcoment.contenido.value.length==0){
	    document.fcoment.contenido.focus();
	    document.getElementById("msj_contenido").innerHTML = "Tienes que escribir algo";
	    error++;
	}

	if(error){
	    return 0;
	}else{
	    document.fcoment.submit();
	}
    }
</script>
<!-- INICIO COMENTARIOS -->
<?php echo Form::open("comentario/subir", array("name" => "fcoment")) ?>
<?php echo Form::hidden("ir_a", $_SERVER['PHP_SELF']) ?>
<?php echo Form::hidden("envio_id", $envio->id) ?>
<table width="100%">
    <tr>
	<td>
	    <?php echo Form::label("nombre", "Tu Nombre") ?>
	    <div class="mensaje" id="msj_nombre"></div>
	</td>
    </tr>
    <tr>
	<td>
	    <?php echo Form::input("nombre", NULL) ?>
	</td>
    </tr>
    <tr>
	<td>
	    <?php echo Form::label("contenido", "Escribe tu comentario") ?>
	    <div class="mensaje" id="msj_contenido"></div>
	</td>
    </tr>
    <tr>
	<td>
	    <?php echo Form::textarea("contenido", NULL, NULL) ?>
	</td>
    </tr>
    <tr>
	<td>
	    <input type="button" value="Comentar" onclick="validar()">
	</td>
    </tr>
</table>
<?php echo Form::close() ?>
<!-- INICIO FIN -->
