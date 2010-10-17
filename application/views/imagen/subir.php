<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php echo Form::open(NULL, array("enctype" => "multipart/form-data")) ?>
<?php echo Form::label("imagen", "Subir Imagen a la Galer&iacute;a") ?>
<br>
<?php echo Form::file("imagen") ?>
<?php echo Form::submit(NULL, "Subir") ?>
<?php echo Form::close() ?>
<?php echo $galeria ?>