<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuario
 *
 * @author erick
 */
class Model_Usuario extends ORM {

    // Relaciones entre tablas
    protected $_has_many = array(
	'envios' => array(),
    );

    /**
     * Verifica que el usuario y clave sean validos en
     * la base de datos.
     *
     * @param <type> $login
     * @param <type> $clave
     * @return boolean
     */
    private function es_valido()
    {

	$valido = FALSE;

	if ($this->login != "" && $this->clave != "")
	{
	    $usuario = ORM::factory('usuario')
			    ->where("login", "=", $this->login)
			    ->where("clave", "=", $this->clave)
			    ->find();

	    if ($usuario->id > 0)
	    {
		$this->values($usuario->as_array());
		$valido = TRUE;
	    }
	}

	return $valido;
    }

    /**
     * Configura los valores de la variable de sesion
     *
     * @param <type> $login
     * @param <type> $clave
     */
    public function crear_sesion()
    {
	$creada = FALSE;

	if ($this->es_valido())
	{
	    // Instanciamos la nueva sesion
	    $sesion = Session::instance();

	    // Otorga los valores de la sesion
	    $sesion->set('ident', $this->id);
	    $sesion->set('login', $this->login);

	    $creada = TRUE;
	}
	return $creada;
    }

    /**
     * Limpia todas las variables de sesiones previas
     * 
     */
    public static function terminar_sesion()
    {
	// Es necesario hacer una instancia aqui de sesion
	$sesion = Session::instance();

	$sesion->destroy();
    }

    /**
     * Verifica si algun administrador ha iniciado sesion
     *
     * @return <boolean>
     */
    public static function esta_iniciado()
    {
	// Es necesario hacer una instancia aqui de sesion
	$sesion = Session::instance();

	$login = $sesion->get("login");

	if ($login == NULL)
	{
	    return FALSE; // Si ningun login se ha seteado
	}
	else
	{
	    return TRUE;  // Si hay un login seteado
	}
    }

    /**
     * Verifica si la sesion ya esta iniciada
     */
    public static function otorgar_acceso(Request $request)
    {

	if (!Model_Usuario::esta_iniciado())
	{
	    $request->redirect("admin/inicio_sesion");
	}
    }

}

?>
