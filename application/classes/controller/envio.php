<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of envio
 *
 * @author erick
 */
class Controller_Envio extends Controller_Plantilla_General {

    private $formulario_subir_info;
    private $errores_subir_info;

    /**
     * Inicializa algunas variables
     *
     * @param Kohana_Request $request
     */
    public function __construct(Kohana_Request $request)
    {
	$this->formulario_subir_info = $this->limpiar_formulario_info();
	$this->errores_subir_info = $this->formulario_subir_info;

	parent::__construct($request);
    }

    private function limpiar_formulario_info()
    {
	return array(
	    "titulo" => "",
	    "contenido" => "",
	);
    }

    /**
     * Vista de registro de nuevas informaciones
     */
    public function action_subir_info()
    {

	Model_Usuario::otorgar_acceso($this->request);

	$this->set_titulo("Agregar un env&iacute;o nuevo");
	if ($_POST)
	{
	    $id_envio = $this->subir_info();
	    if ($id_envio)
	    {
		$this->request->redirect("noticia/ver/" . $id_envio);
	    }
	}

	// Obtiene la actegoria a la cual pertenecera el envio
	if (isset($_GET['cat']))
	{
	    $categoria = $_GET['cat'];
	}
	else if (isset($_POST['cat']))
	{
	    $categoria = $_POST['cat'];
	}
	else
	{
	    // Noticias es la categoria por defecto
	    $categoria = "Noticias";
	}

	$sesion = Session::instance();
	$vista = View::factory("envio/subir")
			->set("usuario_id", $sesion->get("ident"))
			->set("cat", $categoria)
			->set("errores", $this->errores_subir_info)
			->set("formulario", $this->formulario_subir_info);

	$this->contenido = $vista;
    }

    public function subir_info()
    {
	$envio = new Model_Envio();
	$exito = $envio->subir($_POST, $_POST['cat']);

	// Llenamos los vectores con los valores que seran mostrados en los campos
	$this->errores_subir_info = $envio->errores;
	$this->formulario_subir_info = $envio->formulario;

	return $exito;
    }

    /**
     * Vista de registro de nuevas informaciones
     */
    public function action_editar($id)
    {

	Model_Usuario::otorgar_acceso($this->request);

	$this->set_titulo("Editar ev&iacute;o");

	$envio = ORM::factory("envio", $id);

	if ($_POST)
	{
	    if ($this->editar_info($id))
	    {
		$this->request->redirect("noticia/ver/" . $id);
	    }
	}
	else
	{
	    $this->formulario_subir_info = Arr::overwrite($this->formulario_subir_info, $envio->as_array());
	}
	$vista = View::factory("envio/subir")
			->set("usuario_id", $envio->usuario->id)
			->set("cat", NULL)
			->set("errores", $this->errores_subir_info)
			->set("formulario", $this->formulario_subir_info);

	$this->contenido = $vista;
    }

    public function editar_info($id)
    {
	$envio = new Model_Envio($id);
	$exito = $envio->editar($_POST);

	// Llenamos los vectores con los valores que seran mostrados en los campos
	$this->errores_subir_info = $envio->errores;
	$this->formulario_subir_info = $envio->formulario;

	return $exito;
    }

    public function action_borrar($id)
    {
	ORM::factory("envio", $id)->delete();
	$this->contenido = "<h2 align='center'>La publicaci&oacute;n " . $id . " ha sido borrada!</h2>";
    }

}

?>
