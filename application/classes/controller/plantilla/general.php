<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of general
 *
 * @author erick
 */
class Controller_Plantilla_General extends Controller_Template {

    /**
     * Nombre del archivo la vista
     * @var <type>
     */
    public $template = "plantilla/general";
    /**
     *
     * @var <String> Nombre del consejo comunal al que se le instala el software
     */
    private $nombre_consejo;
    /**
     *
     * @var <String> Titulo del navegador
     */
    private $titulo;
    /**
     *
     * @var <String> Codigo HTML que se insertara como contenido de la pagina
     */
    public $contenido;

    public function before()
    {

	$this->nombre_consejo = Model_Globales::$nombre_consejo;

	// Hacemos disponible las variables generales
	View::bind_global('nombre_consejo', $this->nombre_consejo);
	View::bind_global('titulo', $this->titulo);
	View::bind_global('contenido', $this->contenido);

	if (Model_Usuario::esta_iniciado())
	{
	    View::set_global("admin_lateral", View::factory("admin/menu_lateral"));
	}
	else
	{
	    View::set_global("admin_lateral", NULL);
	}

	parent::before();
    }

    public function set_titulo($nuevo_titulo)
    {
	View::set_global('titulo', $nuevo_titulo . " - " . $this->nombre_consejo);
    }
}

?>
