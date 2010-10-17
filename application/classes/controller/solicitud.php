<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of solicitud
 *
 * @author erick
 */
class Controller_Solicitud extends Controller_Plantilla_General {

    private $form_const_resid;
    private $err_const_resid;

    public function __construct(Kohana_Request $request)
    {
	$this->limpiar_solic_const_resid();
	$this->err_const_resid = $this->form_const_resid;

	parent::__construct($request);
    }

    private function limpiar_solic_const_resid()
    {
	$this->form_const_resid = array(
	    "cedula_solic" => "",
	    "testigo_a" => "",
	    "testigo_b" => "",
	    "destinatario" => "",
	);
    }

    /**
     * Pagina principal del modulo de solicitudes
     */
    public function action_index()
    {
	$this->request->redirect("solicitud/constancia_de_residencia");
    }

    /**
     * Pagina de solicitud de Constancia de residencia
     */
    public function action_constancia_de_residencia()
    {
	// Indicamos el titulo de la pagina
	$this->set_titulo("Solicitud de Constancia de Residencia");

	if ($_POST)
	{
	    $this->validar_const_resid();
	}

	$vista = View::factory("solicitud/formulario_residencia")
			->bind("formulario", $this->form_const_resid)
			->bind("errores", $this->err_const_resid);

	$this->contenido = $vista;
    }

    /**
     * Valida los datos ingresados para la solicitud de Constancia de Residencia
     */
    private function validar_const_resid()
    {
	$persona = ORM::factory("persona");

	$datos = Validate::factory($_POST)
			//Cedula
			->filter("cedula_solic", "trim")
			->rule("cedula_solic", "digit")
			->rule("cedula_solic", "not_empty")
			->callback("cedula_solic", array($persona, "existe"))
			// Testigo A
			->filter("testigo_a", "trim")
			->rule("testigo_a", "digit")
			->rule("testigo_a", "not_empty")
			->callback("testigo_a", array($persona, "existe"))
			// Testigo B
			->filter("testigo_b", "trim")
			->rule("testigo_b", "digit")
			->rule("testigo_b", "not_empty")
			->callback("testigo_b", array($persona, "existe"))
			// Destinatario
			->rule("destinatario", "not_empty");

	if ($datos->check())
	{
	    $solic = ORM::factory("persona")->where("cedula", "=", $_POST['cedula_solic'])->find();
	    $testigo_a = ORM::factory("persona")->where("cedula", "=", $_POST['testigo_a'])->find();
	    $testigo_b = ORM::factory("persona")->where("cedula", "=", $_POST['testigo_b'])->find();

	    // Los datos son validos y se puede otorgar la constancia
	    $this->request->redirect("pdf/constancia_residencia/"
		    ."?s=" . $solic->id
		    . "&a="
		    . $testigo_a->id
		    . "&b=" . $testigo_b->id
		    . "&dest=" . $datos['destinatario']);
	}

	// Si llega aqui es porque hubo un error
	// Llenamos los vectores con los valores que seran mostrados en los campos
	$this->err_const_resid = $datos->errors("persona");
	$this->form_const_resid = Arr::overwrite($this->form_const_resid, $_POST);
    }

}

?>
