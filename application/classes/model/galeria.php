<?php

class Model_Galeria extends Model {

    private $directorio = "media/uploaded";
    public $archivos = array();

    public function __construct()
    {
	$this->llenar();

	parent::__construct();
    }

    private function llenar()
    {
	if (!$dir1 = opendir($this->directorio))
	{//abre el direcotiorio actual y si no abre
	    return FALSE;
	}//fin if
	$i = 0;
	while ($item = readdir($dir1))
	{
	    // no usa los archivos ocultos de linux
	    if (!strncmp(".", $item, 1))
		continue;
	    // Si no es un directorio, se almacena
	    if (!is_dir($item))
	    {
		$this->archivos[] = $this->directorio."/".$item;
	    }
	}//fin while
	closedir($dir1);
	return TRUE;
    }

}
?>
