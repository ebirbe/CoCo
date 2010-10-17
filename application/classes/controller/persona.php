<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of persona
 *
 * @author erick
 */
class Controller_Persona extends Controller {

    public function action_borrar($id)
    {
	// Verifica que solo un usuario logueado este entrando
	Model_Usuario::otorgar_acceso($this->request);

	ORM::factory("persona")->delete($id);
	$this->request->response = "<script language='javascript' type='text/javascript'>
	    history.back();
	    </script>";
    }

    public function action_editar($id)
    {
	$this->request->redirect("admin/editar_persona/" . $id);
    }

}

?>
