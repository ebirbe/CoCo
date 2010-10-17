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
class Controller_Imagen extends Controller {

    public function action_subir()
    {
	if ($_FILES)
	{
	    $this->subir($_FILES["imagen"]);
	}

	$this->request->response = View::factory("imagen/subir")
		->set("galeria", $this->galeria());
    }

    public function subir(array $multipart)
    {
	$imagen = new Model_Imagen($multipart);

	$imagen->subir_imagen();
    }

    public function galeria(){
	$galeria = new Model_Galeria();
	return View::factory("imagen/galeria")
		->set("imagenes", $galeria->archivos);
    }

}

?>
