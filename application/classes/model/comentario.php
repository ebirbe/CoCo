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
class Model_Comentario extends ORM {

    protected $_belongs_to = array(
	"envio" => array(),
    );
    // Ordenamiento descendente
    protected $_sorting = array(
	"id" => "DESC"
    );
    // Validaciones
    // Filtros
    protected $_filters = array(
	"nombre" => array(
	    "trim" => array(),
	    "utf8_decode" => array(),
	    "htmlentities" => array(),
	),
	"contenido" => array(
	    "utf8_decode" => array(),
	    "htmlentities" => array(),
	),
    );
    // Reglas
    protected $_rules = array(
	"nombre" => array("not_empty" => array()),
	"contenido" => array("not_empty" => array()),
    );
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

    /**
     * Sube el comentario
     *
     * @param array $datos Los datos recibitos por POST
     * @return int  Retorna el ID del envio si hubo exito, sino retorna 0 o FALSE
     */
    public function subir(array $datos)
    {
	$exito = FALSE;

	// Hace la validacion
	if ($this->values($datos)->check())
	{
	    // Los datos han sido validados y los guardamos
	    $this->save();
	    $exito = $this->id;
	}
	// Llenamos los vectores con los valores que seran mostrados en los campos
	$this->errores = Arr::overwrite($this->errores, $this->validate()->errors(""));
	$this->formulario = Arr::overwrite($this->formulario, $datos);

	return $exito;
    }

    public function num_comentarios()
    {
	return $this->count_all();
    }

}

?>
