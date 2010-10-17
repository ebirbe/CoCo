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
class Model_Envio extends ORM {

    protected $_belongs_to = array(
	"usuario" => array(),
    );
    protected $_has_many = array(
	"imagenes" => array(),
	"comentarios" => array(),
	"categorias" => array(
	    "through" => "contenidos"
	),
    );
    // Ordenamiento descendente
    protected $_sorting = array(
	"id" => "DESC"
    );
    // Validaciones
    // Filtros
    protected $_filters = array(
	"titulo" => array("trim" => array()),
    );
    // Reglas
    protected $_rules = array(
	"titulo" => array("not_empty" => array()),
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
	    "titulo" => "",
	    "contenido" => "",
	);
    }

    /**
     * Sube la información en la categoria indicada
     *
     * @param array $datos Los datos recibitos por POST
     * @param string $categoria Categoria a la cual pertenece el envio
     * @return int  Retorna el ID del envio si hubo exito, sino retorna 0 o FALSE
     */
    public function subir(array $datos, $categoria)
    {
	$exito = FALSE;

	$categoria_id = ORM::factory("categoria")
			->where("nombre", "=", $categoria)
			->find()->id;

	// Si la categoria no existe en la base de datos sale con error
	if (!$categoria_id)
	    return FALSE;

	// Hace la validacion
	if ($this->values($datos)->check())
	{

	    // Concatenamos los datos de las Actividades
	    if ($categoria == "Actividades")
	    {
		$pre = "<b>Lugar:</b> " . $datos['lugar'] . "<br>
			<b>Fecha:</b> " . $datos['fecha'] . "<br>
			<b>Hora:</b> " . $datos['hora'] . "<br><br>
		    ";
		$this->contenido = $pre . $datos['contenido'];
		echo kohana::debug($datos);
	    }
	    // Los datos han sido validados y los guardamos
	    $this->save();

	    // Guarda la relacion entre el envio y la categoria
	    $contenido = ORM::factory("contenido");
	    $contenido->envio_id = $this->id;
	    // Obtiene el id de la categoria
	    $contenido->categoria_id = $categoria_id;
	    $contenido->save();

	    $exito = $this->id;
	}
	// Llenamos los vectores con los valores que seran mostrados en los campos
	$this->errores = Arr::overwrite($this->errores, $this->validate()->errors(""));
	$this->formulario = Arr::overwrite($this->formulario, $datos);

	return $exito;
    }

    public function editar(array $datos)
    {
	$exito = FALSE;
	// Hace la validacion
	if ($this->values($datos)->check())
	{
	    // Los datos han sido validados y los guardamos
	    $this->save();
	    $exito = TRUE;
	}
	// Llenamos los vectores con los valores que seran mostrados en los campos
	$this->errores = Arr::overwrite($this->errores, $this->validate()->errors(""));
	$this->formulario = Arr::overwrite($this->formulario, $datos);

	return $exito;
    }

    public static function listar_envios($categoria = NULL, $limit = NULL, $offset = NULL)
    {
//	SELECT `envios`.titulo, categorias.nombre
//	FROM `envios`
//	JOIN contenidos ON ( envios.id = contenidos.envio_id )
//	JOIN categorias ON ( contenidos.categoria_id = categorias.id )
//	WHERE `categorias`.`id` = '1'
//	ORDER BY `envios`.`id` DESC
//	LIMIT 0 , 30

	$id_categoria = ORM::factory("categoria")
			->where("nombre", "=", $categoria)
			->find();

	$envios = ORM::factory("envio")
			->join("contenidos")
			->on("envios.id", "=", "contenidos.envio_id")
			->join("categorias")
			->on("contenidos.categoria_id", "=", "categorias.id");

	// Especifica una categoria
	if ($categoria != NULL)
	    $envios->where("categorias.id", "=", $id_categoria);

	// Limita el numero de envios a mostrar
	if ($limit != NULL)
	    $envios->limit($limit);

	// Indica desde donde comenzar a listar los envios
	if ($offset != NULL)
	    $envios->offset($offset);

	// Ordena las actividades por fecha
	if ($categoria == "Actividades")
	    $envios->order_by("fecha", "ASC");

	return $envios->find_all();
    }

}

?>
