<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of imagen
 *
 * @author erick
 */
class Model_Imagen {

    public $name;
    public $type;
    public $tmp_name;
    private $carpeta_destino = "media/uploaded/";

    public function __construct(array $archivo)
    {
	$this->name = $archivo["name"];
	$this->type = $archivo["type"];
	$this->tmp_name = $archivo["tmp_name"];
    }

    public function subir_imagen()
    {
	//echo Kohana::debug($this);
	//datos del arhivo
	$nombre_archivo = date("YmdHis");
	$tipo_archivo = $this->type;
	$ext = $this->extension($tipo_archivo);
	$nombre_destino = $this->carpeta_destino . $nombre_archivo . $ext;

	//compruebo si las características del archivo son las que deseo
	if (!(strpos($tipo_archivo, "gif") || strpos($tipo_archivo, "jpeg") || strpos($tipo_archivo, "png")))
	{
	    echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif, .jpg o .png<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>";
	}
	else
	{
	    if (move_uploaded_file($this->tmp_name, $nombre_destino))
	    {
		echo "El archivo ha sido cargado correctamente.";
	    }
	    else
	    {
		echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
	    }
	}
    }

    private function extension($tipo)
    {
	switch ($tipo)
	{
	    case "image/gif": return ".gif";
	    case "image/jpeg": return ".jpg";
	    case "image/png": return ".png";
	}
    }

}

?>
