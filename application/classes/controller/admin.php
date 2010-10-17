<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin
 *
 * @author erick
 */
class Controller_Admin extends Controller_Plantilla_General {

    private $usuario;
    /**
     * Campos contenidos en el formulario de la vista
     * de registro de personas
     *
     * @var array
     */
    private $formulario_persona;
    private $errores_persona;

    /**
     * Inicializa algunas variables
     *
     * @param Kohana_Request $request
     */
    public function __construct(Kohana_Request $request)
    {
	$this->formulario_persona = $this->limpiar_formulario_persona();
	$this->errores_persona = $this->formulario_persona;

	parent::__construct($request);
    }

    private function limpiar_formulario_persona()
    {
	return array(
	    "cedula" => "",
	    "nombre" => "",
	    "apellido" => "",
	    "fecha_nac" => "",
	    "direccion" => "",
	    "fecha_llegada" => "",
	);
    }

    /**
     * Pagina de inicio
     * 
     */
    public function action_index()
    {
	// Verifica que solo un usuario logueado este entrando
	Model_Usuario::otorgar_acceso($this->request);

	$this->set_titulo("Administraci&oacute;n");


	$vista = View::factory("admin/index")
			->set("categorias", ORM::factory("categoria")->find_all());
	$this->contenido = $vista;
    }

    /**
     * Inicio de Sesion para el administrador
     */
    public function action_inicio_sesion()
    {
	$this->set_titulo("Inicio de Sesi&oacute;n");
	$mensaje = "";

	// Cuando los datos son recibidos
	if ($_POST)
	{
	    if ($this->iniciar_sesion())
	    {
		$this->request->redirect("admin/index");
	    }
	    else
	    {
		$mensaje = Kohana::message("usuario", "invalido");
	    }
	}

	// Recorrido por defecto
	$vista = View::factory("admin/inicio_sesion");
	$vista->set("mensaje", $mensaje);
	// Insertamos la vista en la plantilla
	$this->contenido = $vista;
    }

    /**
     * Verifica y configura los datos de inicio de sesion
     *
     * @return boolean
     */
    public function iniciar_sesion()
    {
	$exito = FALSE;
	$datos = $_POST;

	$this->usuario = new Model_Usuario();
	$this->usuario->login = $datos["login"];
	$this->usuario->clave = $datos["clave"];

	if ($this->usuario->crear_sesion())
	{
	    $exito = TRUE;
	}

	return $exito;
    }

    /**
     * Al accesar a esta pagina se cierra la sesion del administrador
     * 
     */
    public function action_salir()
    {
	// Verifica que solo un usuario logueado este entrando
	Model_Usuario::otorgar_acceso($this->request);

	Model_Usuario::terminar_sesion();

	$this->request->redirect("admin/inicio_sesion");
    }

    public function action_registrar_persona()
    {
	// Verifica que solo un usuario logueado este entrando
	Model_Usuario::otorgar_acceso($this->request);

	$this->set_titulo("Registro de Personas");

	$errores = NULL;
	$exito = TRUE;

	if ($_POST)
	{
	    $exito = $this->hacer_registro_persona();
	    if ($exito)
		$this->request->redirect("admin/ver_persona/" . $exito);
	}

	$vista = View::factory("admin/registrar_persona")
			->set("exito", $exito)
			->set("formulario", $this->formulario_persona)
			->set("errores", $this->errores_persona);

	$this->contenido = $vista;
    }

    public function action_editar_persona($id)
    {
	// Verifica que solo un usuario logueado este entrando
	Model_Usuario::otorgar_acceso($this->request);

	$this->set_titulo("Editar Personas");

	$errores = NULL;
	$exito = TRUE;
	$persona = ORM::factory("persona", $id);

	if ($_POST)
	{
	    $exito = $this->hacer_registro_persona($id);
	    if ($exito)
		$this->request->redirect("admin/ver_persona/" . $exito);
	}
	else
	{
	    $this->formulario_persona = Arr::overwrite($this->formulario_persona, $persona->as_array());
	}

	$vista = View::factory("admin/registrar_persona")
			->set("exito", $exito)
			->set("formulario", $this->formulario_persona)
			->set("errores", $this->errores_persona);

	$this->contenido = $vista;
    }

    public function hacer_registro_persona($id = NULL)
    {
	$exito = FALSE;
	$persona = ($id == NULL) ? Model::factory("persona") : Model::factory("persona", $id);

	// Hace la validacion
	if ($persona->values($_POST)->check())
	{
	    // Los datos han sido validados
	    $persona->save();
	    $exito = $persona->id;
	}

	// Llenamos los vectores con los valores que seran mostrados en los campos
	$this->errores_persona = $persona->validate()->errors("usuario");
	$this->formulario_persona = Arr::overwrite($this->formulario_persona, $_POST);

	return $exito;
    }

    public function action_ver_persona($id)
    {
	// Verifica que solo un usuario logueado este entrando
	Model_Usuario::otorgar_acceso($this->request);

	$this->set_titulo("Datos Personales");

	$vista = View::factory("admin/ver_persona")
			->set("persona", ORM::factory("persona", $id));

	$this->contenido = $vista;
    }

    public function action_todos_comentarios()
    {
	// Verifica que solo un usuario logueado este entrando
	Model_Usuario::otorgar_acceso($this->request);

	$this->set_titulo("Todos los Comentarios");

	$comentarios = ORM::factory("comentario")->find_all();

	$vista = View::factory("comentario/vertodos")
			->set("comentarios", $comentarios);
	$this->contenido = $vista;
    }

    public function action_todos_personas()
    {
	// Verifica que solo un usuario logueado este entrando
	Model_Usuario::otorgar_acceso($this->request);

	$this->set_titulo("Todos las personas registradas");

	$personas = ORM::factory("persona")->find_all();

	$vista = View::factory("persona/vertodos")
			->set("personas", $personas);
	$this->contenido = $vista;
    }

}

?>
