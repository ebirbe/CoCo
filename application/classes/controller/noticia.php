<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of noticia
 *
 * @author erick
 */
class Controller_Noticia extends Controller_Plantilla_General {

    public function action_ver($id)
    {
	$envio = ORM::factory("envio", $id);

	$this->set_titulo($envio->titulo);

	$vista = View::factory("envio/envio")
			->set("envio", $envio)
			->set("mostrar_comentarios", TRUE);

	$this->contenido = $vista;
    }

}

?>
