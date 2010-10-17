<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of comentario
 *
 * @author erick
 */
class Controller_Comentario extends Controller {

    // Datos para el formulario de envio
    public $formulario;
    public $errores;

    public function __construct($id = NULL)
    {

	$this->formulario = $this->limpiar_formulario();
	$this->errores = $this->formulario;

	parent::__construct($id);
    }

    /**
     * Inicializa las variables del formulario
     *
     * @return array Array con los campos del formulario
     */
    private function limpiar_formulario()
    {
	return array(
	    "nombre" => "",
	    "contenido" => "",
	);
    }

    public function action_lista($id)
    {
	$comentario = ORM::factory("envio", $id)->comentarios->find_all();

	$vista = View::factory("comentario/lista")
			->set("errores", $this->errores)
			->set("formulario", $this->formulario)
			->set("comentario", $comentario);

	$this->request->response = $vista;
    }

    public function action_subir()
    {
	if ($_POST)
	{
	    $envio_id = $_POST['envio_id'];

	    $cmt = new Model_Comentario();
	    $cmt->subir($_POST);
	    //echo kohana::debug($cmt);
	    $this->errores = $cmt->errores;
	    $this->formulario = $cmt->formulario;
	    $this->request->redirect("noticia/ver/" . $envio_id . "#cmt" . $cmt->id);
	}
    }

    public function action_borrar($id){
	ORM::factory("comentario")->delete($id);
	$this->request->response = "<script language='javascript' type='text/javascript'>
	    history.back();
	    </script>";
    }

}

?>
