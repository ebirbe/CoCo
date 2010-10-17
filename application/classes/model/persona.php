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
class Model_Persona extends ORM {

    // Validaciones
    // Filtros
    protected $_filters = array(
	TRUE => array("trim" => array()),
    );
    // Reglas
    protected $_rules = array(
	"cedula" => array(
	    "not_empty" => array(),
	    "digit" => array()
	),
	"nombre" => array("not_empty" => array()),
	"apellido" => array("not_empty" => array()),
	"fecha_nac" => array("not_empty" => array()),
	"direccion" => array("not_empty" => array()),
	"fecha_llegada" => array("not_empty" => array()),
    );
    // Callbacks
    protected $_callbacks = array(
	"cedula" => array("es_unico"),
    );

    /**
     * Verifica que la cedula no exista en la base de datos
     * para cuando se va a ingresar a una nueva persona
     *
     * @param <type> $username
     * @return <type>
     */
    public function es_unico(Validate $array, $campo)
    {
	// Si la cedula no esta seteada
	// Estonces estamos en modo de
	// Edicion y se busca si OTRO tiene la misma cedula
	if ($this->id != 0)
	{
	    $persona_existe = ORM::factory("persona")
			    ->where("cedula", "=", $array[$campo])
			    ->where("id", "!=", $this->id)
			    ->count_all() > 0;
	    return $array;
	}
	else
	{
	    $persona_existe = ORM::factory("persona")
			    ->where("cedula", "=", $array[$campo])
			    ->count_all() > 0;
	}

	// Comienza la busqueda de cedulas repetidas
	if ($persona_existe)
	{
	    $array->error($campo, "no_es_unico");
	}
	return $array;
    }

    /**
     * Verifica que la persona exista.
     *
     * Se utiliza para otorgar las constancias.
     *
     * @param Validate $array
     * @param <type> $campo
     */
    public function existe(Validate $array, $campo)
    {
	if (ORM::factory("persona")
			->where("cedula", "=", $array[$campo])
			->count_all() == 0)
	{
	    $array->error($campo, "no_existe");
	}
	return $array;
    }

    public function total_anios()
    {
	// $this->fecha_llegada - fecha actual
	$fecha = explode("-", $this->fecha_llegada);
	$anio_actual = date("Y");
	return count(Date::years($fecha[0], $anio_actual - 1));
    }

}

?>
